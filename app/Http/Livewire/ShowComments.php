<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;

class ShowComments extends Component
{

    public Post $post;

    public function render()
    {
        return view('livewire.show-comments', ['comments' => $this->post->comments]);
    }
}
