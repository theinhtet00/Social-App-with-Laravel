<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(
    function(){
        // home
        Route::get('/',[PageController::class,'index'])->name('home');

        Route::get('/posts/{id}',[PageController::class,'show_post'])->name('show_post');

        Route::get('/posts/edit/{id}',[PageController::class,'edit_post'])->name('edit_post')->middleware('Premium');


        // delete
        Route::get('/posts/delete/{id}',[PostController::class,'delete_post'])->name('delete_post')->middleware('Premium');

        // edit
        Route::post('/posts/update/{id}',[PostController::class,'update_post'])->name('update_post')->middleware('Premium');

        //post
        Route::post('/user/post',[PostController::class,'post'])->name('post');
        

        //create
        Route::get('/user/post',[PageController::class,'createPost'])->name('createPost');


        //Profile
        Route::get('/user/profile',[PageController::class,'userProfile'])->name('userProfile');
        
        Route::post('/user/profile',[AuthController::class,'post_userProfile'])->name('post_userProfile');

        //contact us
        Route::get('/user/contact_us',[PageController::class,'contactUs'])->name('contactUs');

        Route::post('/users/contact_us',[ContactUsController::class,'contact_message'])->name('contact_message');

        Route::get('/contact_us/delete/{id}',[PostController::class,'delete_message'])->name('delete_message');
        
        Route::middleware('admin')->group(function(){
            //Admin
            Route::get('/admin',[AdminController::class,'index'])->name('admin.home');
    
            Route::get('admin/manage-premium-users',[AdminController::class,'mpu'])->name('admin.manage-premium-users');
    
            Route::get('/admin/manage-premium-users/delete/{id}',[AdminController::class,'delete_user'])->name('delete_user');
    
            Route::get('/admin/manage-premium-users/edit/{id}',[AdminController::class,'edit_user'])->name('edit_user');
    
            Route::post('/admin/manage-premium-users/update/{id}',[AdminController::class,'update_user'])->name('update_user');
    
            Route::get('admin/contact-messages',[AdminController::class,'contact_messages'])->name('admin.contact-messages');
        });
        
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    }
);

Route::middleware('guest')->group(
    function(){
        // authentication
        Route::get('/login',[AuthController::class,'login'])->name('login');

        Route::post('/login',[AuthController::class,'post_login'])->name('post_login');

        Route::get('/register',[AuthController::class,'register'])->name('register');

        Route::post('/register',[AuthController::class,'post_register'])->name('post_register');
    }
);




