<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentForm extends Component
{

    public Post $post;
    public Comment $comment;

    protected $rules = [
        'comment.comment_text' => 'required|string|min:6',
    ];

    public function mount()
    {
        // Initialising comment
        $this->comment = new Comment;
    }
 
    public function save()
    {
        $this->validate();

        // Adding relevant data
        $this->comment->user_id = Auth::id();

        $this->comment->post_id = $this->post->id;
 
        $this->comment->save();

        // Creating a new comment to be used for next time
        $this->comment = new Comment;

        // Updating post so changes are displayed instantly
        $this->post = Post::find($this->post->id);

    }

    public function render()
    {
        return view('livewire.comment-form', ['comments' => $this->post->comments]);
    }
}
