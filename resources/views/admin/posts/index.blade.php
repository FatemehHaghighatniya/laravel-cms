@extends('admin.layouts.master')
@section('content')
 @if(Session::has('add-post'))
     <div class="alert alert-success">
         <p>{{session('add_post')}}</p>
     </div>
 @endif

 @if(Session::has('edit-post'))
     <div class="alert alert-success">
         <p>{{session('edit_post')}}</p>
     </div>
 @endif

 @if(Session::has('delete-post'))
     <div class="alert alert-success">
         <p>{{session('delete_post')}}</p>
     </div>
 @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">تصویر</th>
            <th scope="col">عنوان</th>
            <th scope="col">کاربر</th>
            <th scope="col">توضیحات</th>
            <th scope="col">دسته بندی</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">وضعیت </th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
@if($post->photo->path != "")
                <td><img src="{{$post->photo->path}}" width="80"></td>
            @else
    <td><img src="/images/400.jpg" class="img-fluid" width="80" ></td>
            @endif
{{--            <td><img src="{{$user->path ? $user->photos->path : "http://www.placehold.it/400" }}" class="img-fluid" width="80"></td>--}}

    <th scope="row"><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></th>
            <td>{{$post->user->name}}</td>
            <td>{{Str::limit($post->description,80)}}</td>

    <td>
        {{$post->category->title}}
    </td>
            <td>{{\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
            @if($post->status ==0)
                <td><span>غیرفعال</span></td>
            @else
                <td><span>فعال</span></td>
            @endif
        </tr>

        @endforeach
        </tbody>
    </table>
 <div class="col-md-12" style="text-align: center">{{ $posts->links() }}</div>
@endsection
