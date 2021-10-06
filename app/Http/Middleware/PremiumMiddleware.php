<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PremiumMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = request('id');
        $authorID = Post::find($id)->user_id;
        if(auth()->user()->Admin == "1" || auth()->user()->Premium == "1" || auth()->user()->id == $authorID){
            return $next($request);
        }else{
            return back()->with('errors',"You're not Premium User!");
        }
    }
}
