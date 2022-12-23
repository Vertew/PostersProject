<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        /*
        Rules:

        Admins can do anything aside from editing personal user information of other accounts e.g. emails and passwords.
        Moderators can do anything apart from editing other peoples' content and deleting accounts.
        Premium users are allowed have custom profile pictures.
        Verified users are allowed to make and edit their own comments and posts.
        Standard users can post, comment and alter their profile information.
        Restricted users can only view the website. This status can be applied to any account
        except admins as a form of suspension.
        (All roles are allowed to delete their own posts/comments)
        */


        // Post
        Gate::define('create-post', function (User $user) {
            return !($user->roles->contains(1)) || $user->roles->contains(6);
        });

        Gate::define('update-post', function (User $user, Post $post) {
            return ($user->id === $post->user_id && ($user->roles->contains(3) || $user->roles->contains(5))) || $user->roles->contains(6);
        });

        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->roles->contains(6) || $user->roles->contains(5);
        });

        // Comment
        Gate::define('create-comment', function (User $user) {
            return !($user->roles->contains(1)) || $user->roles->contains(6);
        });

        Gate::define('update-comment', function (User $user, Comment $comment) {
            return ($user->id === $comment->user_id && ($user->roles->contains(3) || $user->roles->contains(5))) || $user->roles->contains(6);
        });

        Gate::define('delete-comment', function (User $user, Comment $comment) {
            return $user->id === $comment->user_id || $user->roles->contains(6) || $user->roles->contains(5);
        });


        // Profile
        Gate::define('update-profile', function (User $user, Profile $profile) {
            return ($user->id === $profile->user_id && !($user->roles->contains(1))) || $user->roles->contains(6);
        });

        Gate::define('icon-profile', function (User $user) {
            return $user->roles->contains(4) || $user->roles->contains(6);
        });


        // User

        Gate::define('delete-user', function (User $user) {
            return $user->roles->contains(6);
        });



    }
}
