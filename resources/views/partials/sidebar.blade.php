
    <!-- Search Widget -->
    <div class="card my-4">
        <h3 class="card-header">جستجو</h3>
        <div class="card-body">
            {!! Form::open(['method'=>'GET','action'=>'App\Http\Controllers\Frontend\PostController@searchTitle']) !!}
            <div class="input-group">
                    {!! Form::text('title',null,['class'=>'form-control']) !!}
                        <span class="input-group-btn">
                    {!! Form::submit('جستجو',['class'=>'btn btn-secondary'])!!}
                </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">دسته بندی ها</h5>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{$category->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>
