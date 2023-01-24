@extends('admin.layouts.master')
@section('content')
    <h3 class="p-b-2 text-center">ویرایش دسته بندی</h3>


        <div class="col-md-9">

            @include('partials.form-errors')

            {!! Form::model($category,['method'=>'PATCH','action'=>['App\Http\Controllers\Admin\AdminCategoryController@update',$category->id]]) !!}
            <div class="form-group">
                {!! Form::label('title','عنوان') !!}
                {!! Form::text('title',$category->title,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('slug','نام مستعار') !!}
                {!! Form::text('slug',$category->slug,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('meta_description','متا توضیحات') !!}
                {!! Form::text('meta_description',$category->meta_description,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('meta_keywords','متا برچسب ها') !!}
                {!! Form::text('meta_keywords',$category->meta_keywords,['class'=>'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::submit('ذخیره',['class'=>'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}
{!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\Admin\AdminCategoryController@destroy',$category->id]]) !!}
            <div class="form-group">
                {!! Form::submit('حذف',['class'=>'btn btn-danger']) !!}
            </div>
{!! Form::close() !!}
        </div>


    </div>

@endsection
