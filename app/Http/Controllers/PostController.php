<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function post(){
        
        $validation = request()->validate([
            'title'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'content'=>'required',
        ]);

        if($validation){
            $title = request('title');
            $image = request('image');
            $content = request('content');

            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('/images/posts'),$image_name);

            $post = new Post();
            $post->user_id = auth()->user()->id;
            $post->title = $title;
            $post->image = $image_name;
            $post->content = $content;
            $post->save();
            return redirect()->route('home')->with("message","Post added");
        }else{
            return back()->withErrors($validation);
        }
    }

    function delete_post($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('message','Post Deleted!');
    }

    function update_post($id){
        $post = Post::find($id);
        $image = request('image');

        if($image){
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('/images/posts'),$image_name);
            $post->image = $image_name;
            $post->update();
            return back()->with('message','image changed');
        }
        $post->title = request('title');
        $post->content = request('content');
        $post->update();

        return back()->with('message','Post Updated');
    }

    function delete_message($id){
        $message = ContactMessage::find($id);
        $message->delete();
        return back()->with('message','Message Deleted!');
    }
}
