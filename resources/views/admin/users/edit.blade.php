@extends('admin.layouts.master')
@section('content')
    <h3 class="p-b-2 text-center">ویرایش کاربر</h3>
    <div class="row">
        <div class="col-md-3">
            <img src="{{$user->photo_id ? $user->photo->path : "/images/400.jpg" }}" class="img-fluid">
        </div>

        <div class="col-md-9">

            @include('partials.form-errors')

            {!! Form::model($user,['method'=>'PATCH','action'=>['App\Http\Controllers\Admin\AdminUserController@update',$user->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','نام و نام خانوادگی') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','ایمیل') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('roles','نقش') !!}
                {!! Form::select('roles[]',$roles,null,['multiple'=>'multiple','class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status','وضعیت') !!}
                {!! Form::select('status',[1=>'فعال',0=>'غیرفعال'],null,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('password','رمز عبور') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('avatar','تصویر پروفایل') !!}
                {!! Form::file('avatar',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('ذخیره',['class'=>'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
{!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\Admin\AdminUserController@destroy',$user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
            </div>
{!! Form::close() !!}
        </div>


    </div>

@endsection
