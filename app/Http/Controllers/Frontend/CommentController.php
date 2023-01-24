<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request,$id)
    {
        $post=Post::findOrFail($id);
        if($post){
            $comment=new Comment();
            $comment->post_id=$post->id;
            $comment->description=$request->description;
            $comment->status=0;
            $comment->save();
        }
        Session::flash('add_comment','دیدگاه شما با موفقیت ثبت و در انتظار تایید مدیران قرار گرفت');
        return back();
    }

    public function reply(Request $request)
    {
        $postId = $request->input('post_id');
        $parentId = $request->input('parent_id');

        $post = Post::findOrFail($postId);
        if($post){
            $comment = new Comment();
            $comment->description = $request->input('description');
            $comment->parent_id = $parentId;
            $comment->post_id = $post->id;
            $comment->status = 0;
            $comment->save();
        }
        Session::flash('add_comment', 'نظر شما با موفقیت درج شد و در انتظار تایید مدیران قرار گرفت');
        return back();
    }


}
