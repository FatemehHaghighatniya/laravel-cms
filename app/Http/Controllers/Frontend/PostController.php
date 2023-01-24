<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;


class PostController extends Controller
{
    public function show($slug){
        $post=Post::with(['user','category','photo','comments'=>function($query){
            $query->where('status',1)
                ->where('parent_id',null);
        },'comments.replies'=>function($query){
            $query->where('status',1);

        }])
            ->where('slug',$slug)
            ->where('status',1)
            ->first();

        $categories=Category::all();
        return view('frontend.posts.show',compact(['post','categories']));
    }

    public function searchTitle(Request $request)
    {
        $query=$request->input('title');
        $posts=Post::with('user','category','photo')
            ->where('title','like',"%".$query."%")
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->paginate(3);
        $categories=Category::all();
        return view('frontend.posts.search',compact(['query','posts','categories']));
    }
}
