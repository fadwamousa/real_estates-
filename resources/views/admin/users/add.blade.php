@extends('admin.layouts.layout')
@section('title')

    اضافة اعضاء جدد

@stop

@section('header')
@endsection



@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Users
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}">
                        <i class="fa fa-dashboard"></i>Users</a></li>
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
                            <h3 class="box-title">Add New User Now</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="POST" action="{{ route('users.store') }}">
                             @csrf
                            @include('admin.users.form')
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>


@stop

@section('footer')
@endsection


