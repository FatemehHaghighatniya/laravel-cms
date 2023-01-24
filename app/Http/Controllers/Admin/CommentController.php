<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index()

    {
    $comments=Comment::with('post')->paginate(15);
    return view('admin.comments.index',compact(['comments']));
    }

    public function action($id){
//        if($request->has('action')){
//            if($request->input('action')=='approved'){

                $comment=Comment::where('id',$id)->first();
                if($comment->status !=0){
                    $comment->status=0;
                    $comment->save();
                    Session::flash('rejected_comment','نظر کاربر در وضعیت عدم تایید قرار گرفت');
                    return back();

                }
                else{
                    $comment->status=1;
                    $comment->save();
                    Session::flash('approved_comment','نظر کاربر در وضعیت تایید قرار گرفت');
                       return back();
        }

        }


        public function edit($id){
        $comment=Comment::findorfail($id);
        return view('admin.comments.edit',compact(['comment']));
        }

        public function update(Request $request,$id){
            $comment =Comment::findOrFail($id);
            $comment->description = $request->input('description');
            $comment->save();

            Session::flash('update_comment', 'نظر با موفقیت ویرایش شد');
            return redirect('/admin/comments');
        }

        public function destroy($id){
            $comment = Comment::findOrFail($id);
            $comment->delete();
            Session::flash('delete_comment', 'نظر با موفقیت حذف شد');

            return redirect('admin/comments');
        }
}
