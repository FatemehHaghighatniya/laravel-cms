<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\AdminUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'admin'],function(){
 Route::resource('admin/users','App\Http\Controllers\Admin\AdminUserController');
 Route::resource('admin/posts','App\Http\Controllers\Admin\AdminPostController');
 Route::resource('admin/categories','App\Http\Controllers\Admin\AdminCategoryController');
 Route::resource('admin/photos','App\Http\Controllers\Admin\AdminPhotoController');
 Route::get('admin/dashboard','App\Http\Controllers\Admin\DashboardController@index')->name('dashboard.index');

 Route::get('admin/comments','App\Http\Controllers\Admin\CommentController@index')->name('comments.index');
 Route::post('admin/actions/{id}','App\Http\Controllers\Admin\CommentController@action')->name('comments.actions');
 Route::get('admin/comments/{id}','App\Http\Controllers\Admin\CommentController@edit')->name('comments.edit');
 Route::patch('admin/comments/{id}','App\Http\Controllers\Admin\CommentController@update')->name('comments.update');
 Route::delete('admin/comments/{id}','App\Http\Controllers\Admin\CommentController@destroy')->name('comments.destroy');

 Route::delete('admin/delete/media','App\Http\Controllers\Admin\AdminPhotoController@deleteAll')->name('photo.delete.all');

});
Route::get('/','App\Http\Controllers\Frontend\MainController@index');
Route::get('/posts/{id}','App\Http\Controllers\Frontend\PostController@show')->name('frontend.posts.show');
Route::get('search','App\Http\Controllers\Frontend\PostController@searchTitle')->name('frontend.posts.search');

Route::post('comments/{postId}', 'App\Http\Controllers\Frontend\CommentController@store' )->name('frontend.comments.store');
Route::post('comments', 'App\Http\Controllers\Frontend\CommentController@reply')->name('frontend.comments.reply');
