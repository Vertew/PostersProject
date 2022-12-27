<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostLiked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LikeForm extends Component
{
    public Post $post;
    public User $user;
    public $likes;

    public function increment()
    {

        $this->user = User::find(Auth::id());

        if (!($this->post->likes()->where('id', $this->user->id)->exists())){
            $this->post->likes()->attach($this->user);
            if($this->post->user != $this->user){
                $this->post->user->notify(new PostLiked($this->post, $this->user));
            }
        }else{
            $this->post->likes()->detach($this->user);
        }

    }


    public function render()
    {
        $this->post = Post::find($this->post->id);

        $this->likes = $this->post->likes()->count();

        return view('livewire.like-form', ['likes' => $this->likes]);
    }
}
