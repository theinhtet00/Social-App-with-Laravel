<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index() {
        $posts = Post::latest()->paginate(9);
        return view('index',['posts'=>$posts]);
    }

    function createPost(){
        return view('user.create');
    }

    function userProfile(){
        return view('user.userprofile');
    }

    function contactUs(){
        return view('user.contactus');
    }

    function show_post($id){
        $post = Post::find($id);
        return view('user.showpost',['post'=>$post]);
    }

    function edit_post($id){
        $post = Post::find($id);
        return view('user.editpost',['post'=>$post]);
    }

    
}
