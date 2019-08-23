<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUsers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function index(){
        return view('admin.users.index');
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
}
