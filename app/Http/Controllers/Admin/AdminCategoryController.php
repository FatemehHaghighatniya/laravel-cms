<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(2);
        return view('admin.categories.index',compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category=new Category();
        $category->title=$request->input('title');
        if($request->input('slug') == ""){
            $category->slug=make_slug($request->input('title'));
        }else{
            $category->slug=make_slug($request->input('slug'));
        }
        $category->meta_description=$request->input('meta_description');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->save();
        Session::flash('add_category','دسته بندی جدید با موفقیت اضافه شد');
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findorfail($id);
        return view('admin.categories.edit',compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category=Category::findorfail($id);
        $category->title=$request->input('title');
        if($request->input('slug') == ""){
            $category->slug=make_slug($request->input('title'));
        }else{
            $category->slug=make_slug($request->input('slug'));
        }
        $category->meta_description=$request->input('meta_description');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->save();
        Session::flash('update_category','دسته بندی با موفقیت ویرایش شد');
        return redirect('admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findorfail($id);
        $category->delete();
        Session::flash('delete_category','دسته بندی با موفقیت حذف شد');
        return redirect('admin/categories');
    }
}
