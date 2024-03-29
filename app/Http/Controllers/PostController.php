<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Gate;
use App\Helpers\PaginationHelper;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get()->sortByDesc('created_at');
        $paginated = PaginationHelper::paginate($posts, 15);
        return view('posts.index', ['posts' => $paginated]);
    }

    /**
     * Display a listing of the resource belonging to a particular user.
     *
     * @return \Illuminate\Http\Response
     */
    public function u_index($id)
    {
        $posts = Post::where('user_id', $id)->get()->sortByDesc('created_at');
        $user = User::find($id);
        $paginated = PaginationHelper::paginate($posts, 15);
        return view('posts.index', ['posts' => $paginated], ['user' => $user]);
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
            session()->flash('alert-class', 'alert-danger');
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
            'title' => 'min:1|max:50',
            'post_text' => 'min:1|max:1000',
            'image' => 'nullable|image',
        ]);

        $post = new Post;
        $post->title = $validatedData['title'];
        $post->post_text = $validatedData['post_text'];
        $post->user_id = Auth::id();
        $post->views = 0;
        $post->save();

        if($request['image'] != null){
            $image = new Image;
            $image->name = $this->storeImage($request);
            $post->image()->save($image);
        }
        session()->flash('message', 'New post uploaded.');
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
            session()->flash('alert-class', 'alert-danger');
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
            'title' => 'min:1|max:50',
            'post_text' => 'min:1|max:1000',
            'image' => 'nullable|image',
        ]);

        $post->title = $validatedData['title'];
        $post->post_text = $validatedData['post_text'];
        $image = $post->image;
        if($request['image'] != null){
            if ($image == null){
                $image = new Image;
            }
            $image->name = $this->storeImage($request);
            $post->image()->save($image);
        }
        if($request['checkbox']){
            if ($image != null){
                File::delete(public_path('images/'.$image->name));
                $post->image()->delete();
            }
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
            if ($post->image != null){
                File::delete(public_path('images/'.$post->image->name));
                $post->image()->delete();
            }
            $post->delete();
            session()->flash('message', 'Post was deleted.');
            return redirect()->route('posts.index');
        }else{
            session()->flash('message', 'You do not have permission to delete this post.');
            session()->flash('alert-class', 'alert-danger');
            return redirect()->route('posts.show', ['id'=> $post->id]);
        }
    }

    public function likes($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.likes', ['users'=> $post->likes()->get()], ['post' => $post]);
    }

    private function storeImage($request)
    {

        $newImageName = uniqid() . '-' . Auth::user()->username . '.' .
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        return $newImageName;
    }
}
