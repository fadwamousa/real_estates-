<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUsers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.add');
    }

    public function store(AddUsers $request , User $user){

        $user->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);
        session()->put('message','User is created Now Successfully');
        return redirect('admin/users');
    }

    public function edit($id){
        $user= User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request , $id){

        $user = User::findOrfail($id);

        $rules = [
            'name'     => 'string',
            'email'    => 'email|unique:users,email,'.$user->id,
            'password' => 'confirmed',
            'admin'    => 'in:'.'1'.','.'0'
        ];

        $this->validate($request ,$rules);

        $input = $request->all();

        //&& $request->filled('password')


        if($request->has('password') && $user->password != $request->password){

            $input['password'] = bcrypt($request->password);
        }

        $user->update($input);

        session()->put('message','User is Updated Now Successfully');
        return redirect('admin/users') ;


        /*
        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'admin'    => $request->admin
        ]);*/


        /*
         * if($request->has('name')){
            $request->name = $user->name;
        }

        if($request->has('email') && $user->email != $request->email){
            $user->email = $request->email;
        }

        if($request->has('password') !== $user->password){
            $user->password = bcrypt($request->password);
        }

        //لو جالك ريكوست الي خانة الباس وكمان حدث تغير في الباسورد
        if( $request->has('password') &&
            $request->filled('password')){
            $user->password = bcrypt($request->password);
        }

        if($request->has('admin')){
            $user->admin = $request->admin;
        }

        if(!$user->isDirty()){

            session()->put('message','You Must Change the field at least one');
            return redirect()->back();
        }

        $user->fill($request->all());


        $user->save();
        */





    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('message','The User Is Deleted Successfully');
    }
}
