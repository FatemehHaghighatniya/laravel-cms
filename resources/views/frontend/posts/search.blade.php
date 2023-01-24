@extends('frontend.layouts.master')

@section('head')
    <meta name="description" content="وبلاگ روکسو">
    <meta name="keywords" content="آموزش ساخت وبلاگ, آموزش وبلاگ">
@endsection

@section('navigation')
    @include('partials.navigation', ['categories'=> $categories])
@endsection

@section('content')
    <h2 class="mt-4">نتیجه عبارت جستجو شده برای : {{$query}}</h2>

    @foreach($posts as $post)
        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">ایجاد شده توسط <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>منتشر شده در {{\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</p>

        <hr>

        <!-- Preview Image -->
        <img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/900x300" }}" class="img-fluid rounded">
        <hr>

        <!-- Post Content -->
        <div>{{$post->description}}</div>
{{--        <div class="col-md-12 text-right">--}}
{{--            <a class="btn btn-primary" href="{{route('frontend.posts.show', $post->slug)}}">ِ</a>--}}

{{--        </div>--}}
        <hr>
    @endforeach


    <div class="col-md-12" style="text-align: center">{{$posts->links()}}</div>



@endsection

@section('sidebar')
    @include('partials.sidebar', ['categories'=> $categories])
@endsection
