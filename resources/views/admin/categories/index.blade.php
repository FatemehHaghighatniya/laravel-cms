@extends('admin.layouts.master')
@section('content')
 @if(Session::has('add_category'))
     <div class="alert alert-success">
         <p>{{session('add_category')}}</p>
     </div>
 @endif
 @if(Session::has('update_category'))
     <div class="alert alert-success">
         <p>{{session('update_category')}}</p>
     </div>
 @endif
 @if(Session::has('delete_category'))
     <div class="alert alert-success">
         <p>{{session('delete_category')}}</p>
     </div>
 @endif

    <table class="table">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th>تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
    <td>{{$category->id}}</td>
    <th scope="row"><a href="{{route('categories.edit',$category->id)}}">{{$category->title}}</a></th>

            <td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>

        </tr>

        @endforeach
        </tbody>
    </table>
 <div class="col-md-12" style="text-align: center">{{ $categories->links() }}</div>

@endsection
