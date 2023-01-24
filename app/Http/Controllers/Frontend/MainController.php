<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index(){
        {
            $posts = Post::with('user', 'category', 'photo')
                ->where('status', 1)
                ->orderBy('created_at', 'asc')
                ->paginate(2);
            $categories = Category::all();

            return view('frontend.main.index', compact(['posts', 'categories']));
        }}
}
