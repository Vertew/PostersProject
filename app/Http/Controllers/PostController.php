<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Gate;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('create-post')) {
            return view('posts.create');
        }else{
            session()->flash('message', 'You do not have permission to create posts.');
            return redirect()->route('posts.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'nullable|max:20',
            'post_text' => 'nullable|max:1000',
            'image' => 'nullable|image',
        ]);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->post_text = $validatedData['post_text'];
        if($request['image'] != null){
            $post->image = $this->storeImage($request);
        }
        $post->user_id = Auth::id();
        $post->views = 0;
        $post->save();

        session()->flash('message', 'New Post was created.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $post->views += 1;
        $post ->save();
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Gate::allows('update-post', $post)) {
            return view('posts.edit', ['post' => $post]);
        }else{
            session()->flash('message', "You don't have permission to edit this post.");
            return redirect()->route('posts.show', ['id'=> $post->id]);
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
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'nullable|max:20',
            'post_text' => 'nullable|max:1000',
            'image' => 'nullable|image',
        ]);

        $post->title = $validatedData['title'];
        $post->post_text = $validatedData['post_text'];
        if($request['image'] != null){
            $post->image = $this->storeImage($request);
        }
        if($request['checkbox']){
            File::delete(public_path('images/'.$post->image));
            $post->image = null;
        }

        $post->save();

        session()->flash('message', 'Post was updated.');
        return redirect()->route('posts.show', ['id'=> $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (Gate::allows('delete-post', $post)) {
            File::delete(public_path('images/'.$post->image));
            $post->delete();

            session()->flash('message', 'Post was deleted.');
            return redirect()->route('posts.index');
        }else{
            session()->flash('message', 'You do not have permission to delete this post.');
            return redirect()->route('posts.show', ['id'=> $post->id]);
        }
    }

    private function storeImage($request)
    {

        $newImageName = uniqid() . '-' . Auth::user()->username . '.' .
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        return $newImageName;
    }
}
