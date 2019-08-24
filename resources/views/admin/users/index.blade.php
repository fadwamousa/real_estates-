@extends('admin.layouts.layout')
@section('title')
    التحكم في الاعضاء المسجلين
@stop

@section('header')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin_panel/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@stop

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if(session()->has('message'))
            <div class="alert alert-dark">
                {{session()->get('message')}}
                {{session()->forget('message')}}
            </div>

        @endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users Show
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}">
                        <i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            @if(count($users) > 0)
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered</th>
                                    <th>Updated at</th>
                                    <th>Auth</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)

                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>{{$user->updated_at->diffForHumans()}}</td>
                                    <td>{{$user->admin == 1 ? 'Admin' : 'Normal'}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{route('users.edit',[$user->id])}}">Edit</a>
                                        <form action="{{route('users.delete',$user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">

                                        </form>
                                    </td>
                                </tr>
                                </tbody>



                                @endforeach
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered</th>
                                    <th>Updated at</th>
                                    <th>Auth</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>

                            </table>
                            @else
                                There's  No Users Found
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


@stop


@section('footer')

    <!-- DataTables -->
    <script src="{{asset('admin_panel/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('admin_panel/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {

            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })
    </script>
@stop