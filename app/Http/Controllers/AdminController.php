<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }

    function mpu(){
        $users = User::all();
        return view('admin.manage-premium-users',['users'=>$users]);
    }

    function contact_messages(){
        $messages = ContactMessage::latest()->get();
        return view('admin.contact-messages',['messages'=>$messages]);
    }

    function delete_user($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('message','User Deleted!');
    }

    function edit_user($id){
        $user = User::find($id);
        return view('admin.edit-user',['user'=>$user]);
    }

    function update_user($id){

        $validation = request()->validate([
            'username' => 'required',
            'email' => 'required',
        ]);
        if($validation){
            $user = User::find($id);
            $user->username = request('username');
            $user->email = request('email');
            $user->Admin = request('Admin');
            $user->Premium = request('Premium');
            $user->update();
            return redirect()->route('admin.manage-premium-users')->with('message','User Information Updated Successfully!');
        }else{
            return back()->withErrors($validation);
        }
    }
}
