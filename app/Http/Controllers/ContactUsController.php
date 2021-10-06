<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function contact_message(){
        $validation = request()->validate([
            'username'=>'required',
            'email'=>'required',
            'messages'=>'required'
        ]);
        if($validation){
            $message = new ContactMessage();
            $message->username = request('username');
            $message->email = request('email');
            $message->messages = request('messages');
            $message->save();
            return back()->with('message','Feedback Sent Successfully!');
        }else{
            return back()->withErrors($validation);
        }
    }
}
