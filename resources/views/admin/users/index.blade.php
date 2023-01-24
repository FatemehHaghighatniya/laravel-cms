@extends('admin.layouts.master')
@section('content')
 @if(Session::has('add_user'))
     <div class="alert alert-success">
         <p>{{session('add_user')}}</p>
     </div>
 @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">تصویر پروفایل</th>
            <th scope="col">نام</th>
            <th scope="col">ایمیل</th>
            <th scope="col">نقش</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">وضعیت کاربر</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
@if($user->photo_id != "")
                <td><img src="{{$user->photo->path}}" width="80"></td>
            @else
    <td><img src="/images/400.jpg" class="img-fluid" width="80" ></td>
            @endif
{{--            <td><img src="{{$user->path ? $user->photos->path : "http://www.placehold.it/400" }}" class="img-fluid" width="80"></td>--}}

    <th scope="row"><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></th>
            <td>{{$user->email}}</td>
            <td>
                <ul style="list-style:none">

                @foreach($user->roles as $role)
                        <li>
                            {{$role->name}}
                        </li>
                @endforeach
                </ul>

            </td>
            <td>{{\Hekmatinasser\Verta\Verta::instance($user->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
    @if($user->status == 0)
        <td><span class="tag tag-pill tag-danger">غیرفعال</span></td>
    @else
        <td><span class="tag tag-pill tag-success">فعال</span></td>
    @endif
        </tr>

        @endforeach
        </tbody>
    </table>
 <div class="col-md-12" style="text-align: center">{{ $users->links() }}</div>

@endsection
