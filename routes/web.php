<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Models\User;

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
Auth::routes(['verify'=>true]);

Route::get('/',function(){
     return view('auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('postCategory/{id}',[HomeController::class,'postCategory']);
Route::get('postDetail/{id}',[HomeController::class,'postDetail']);
Route::get('getSearch',[HomeController::class,'getSearch']);

Route::get('admin',function(){
     return view('admin.index');
})->name('admin');

Route::resource('category',CategoryController::class);
Route::resource('post',PostController::class);
Route::resource('user',UserController::class);
Route::resource('comment',CommentController::class);