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
                Edit Users
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
                            <h3 class="box-title">Edit New User Now</h3>
                        </div>

                        <div class="box-body">

                            <form method="POST"
                                  action="{{ route('users.update',[$user->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               required autocomplete="name"
                                               autofocus
                                               value="{{$user->name}}">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('البريد الالكتروني') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="select"
                                           class="col-md-4 col-form-label text-md-right">
                                        {{ __('Admin Or Normal') }}</label>

                                    <div class="col-md-6">
                                        <select name="admin" class="form-control">
                                            <option value="1">
                                                Admin
                                            </option>
                                            <option value="0">
                                                Normal
                                            </option>

                                        </select>

                                        @error('admin')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>

                                    <div class="col-md-6">
                                        <input id="password"
                                               type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                        value="{{$user->password}}">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تأكيد كلمة المرور') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm"
                                               type="password"
                                               class="form-control"
                                               name="password_confirmation"
                                        value="{{$user->password}}">
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary ">
                                            {{ __('تعديل') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>


@stop

@section('footer')
@endsection


