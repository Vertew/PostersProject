<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Helpers\PaginationHelper;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\CommentViewed;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource belonging to a particular user.
     *
     * @return \Illuminate\Http\Response
     */
    public function u_index($id)
    {
        $comments = Comment::where('user_id', $id)->get()->sortByDesc('created_at');
        $user = User::find($id);
        $paginated = PaginationHelper::paginate($comments, 15);
        return view('comments.index', ['comments' => $paginated], ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->views += 1;
        $comment->save();

        $current_user = User::find(Auth::id());
        if($comment->user != $current_user)
        {
            $comment->user->notify(new CommentViewed($comment, $current_user));
        }
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        if (Gate::allows('update-comment', $comment)){
            return view('comments.edit', ['comment' => $comment]);
        }else{
            session()->flash('message', "You don't have permission to edit this comment.");
            return redirect()->route('comments.show', ['id'=> $comment->id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment_text' => 'nullable|max:500',
        ]);

        $comment = Comment::findOrFail($id);

        $comment->comment_text = $validatedData['comment_text'];

        $comment->save();

        session()->flash('message', 'Comment was updated.');
        return redirect()->route('comments.show', ['id'=> $comment->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (Gate::allows('delete-comment', $comment)) {
            $post_id = $comment->post->id;
            $comment->delete();

            session()->flash('message', 'Comment was deleted.');
            return redirect()->route('posts.show', ['id'=> $post_id]);
        }else{
            session()->flash('message', "You don't have permission to delete this comment.");
            return redirect()->route('comments.show', ['id'=> $comment->id]);
        }
    }
}
