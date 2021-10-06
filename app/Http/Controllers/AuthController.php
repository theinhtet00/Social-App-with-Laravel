<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function post_login(){
        $validation = request()->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if($validation){
            $auth = Auth::attempt([
                "email"=> $validation['email'],
                "password"=> $validation['password'],
            ]);
            if($auth){
                return redirect()->route('home');
            }else{
                return back()->with('error',"Authentication Failed!");
            }
            
        }else{
            return back()->withErrors($validation);
        }
    }

    function register(){
        return view('auth.register');
    }

    function post_register(){
        $validation = request()->validate([
            "username"=>'required',
            "email"=>'required',
            "password"=>'required||min:8||confirmed',
            "image"=>'required',
        ]);
        
        if($validation){

            $image = request('image');
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles'),$image_name);

            $user = new User();
            $user->username = request('username');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->image = $image_name; 
            $user->save();
            if(Auth::attempt([
                "email"=>$validation['email'],
                "password"=>$validation['password'],
                ])){
                    return redirect()->route('home');             
                }
        }else{
            return back()->withErrors($validation);
        }
    }

    function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    function post_userProfile(){

        $username = request('username');
        $email = request('email');
        $image = request('image');
        $old_password = request('old_password');
        $new_password = request('new_password');

        $id = auth()->user()->id;
        $current_user = User::find($id);
        $current_user->username = $username;
        $current_user->email = $email;

        if($image){
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('/images/profiles'),$image_name);
            $current_user->image = $image_name;
            $current_user->update();

            return back()->with('Success','Image Changed!');
        }

        if($old_password && $new_password){
            if(Hash::check($old_password,$current_user->password)){
                $current_user->password = Hash::make($new_password);
                $current_user->update();
                return back()->with('Success','Password Changed!');
            }else{
                return back()->with('Error','Password is not same!');
            }
        }
        $current_user->update();
        return back();
    }
}
