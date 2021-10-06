<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("admin",function(User $user){
            return $user->Admin == "1";
        });

        Gate::define('premium_user',function(User $user, $id){
            $post = Post::find($id);
            $ownerID = $post->user_id;
            return $user->Admin == '1' || $user->Premium == '1' || $user->id == $ownerID;

            
        });
    }
}
