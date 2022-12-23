<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;

class CommentForm extends Component
{

    public Post $post;
    public Comment $comment;

    protected $rules = [
        'comment.comment_text' => 'required|string|min:1|max:500',
    ];

    public function mount()
    {
        // Initialising comment
        $this->comment = new Comment;
    }
 
    public function save()
    {
        if (Gate::allows('create-comment')){
            $this->validate();

            // Adding relevant data
            $this->comment->user_id = Auth::id();

            $this->comment->post_id = $this->post->id;
    
            $this->comment->save();

            // Creating a new comment to be used for next time
            $this->comment = new Comment;

            // Updating post so changes are displayed instantly
            $this->post = Post::find($this->post->id);
        }else{
            session()->flash('message', 'Cou do not have permission to post a comment.');
            return redirect()->route('posts.show', ['id'=> $this->post->id]);
        }

    }

    public function render()
    {
        return view('livewire.comment-form', ['comments' => $this->post->comments]);
    }
}
