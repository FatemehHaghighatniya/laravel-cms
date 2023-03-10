@extends('admin.layouts.master')
@section('content')
    @include('partials.form-errors')
    {!! Form::open (['method'=>'POST','action'=>'App\Http\Controllers\Admin\AdminUserController@store','files'=>true]) !!}
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
        {!! Form::select('status',[1=>'فعال',0=>'غیرفعال'],0,['class'=>'form-control']) !!}
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
@endsection
