<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'username' => 'required|max:30',
            'email' => 'required|email',
            'password' => 'required|max:255',
        ]);

        $user = new User;
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->email_verified_at = now(); // The email isn't actually verified right now, this just marks when the account was created.
        $user->password = Hash::make($validatedData['password']);
        $user->remember_token = Str::random(10);
        $user->save();

        $profile = new Profile; // Profiles are intrinsically linked to users, so when a user is created, an empty profile is also created.
        $profile->user_id = $user->id;
        $profile->save();

        session()->flash('message', 'New User was created.');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Comment::findOrFail($id);

        if (Gate::allows('delete-user')) {
            $user_id = $user->id;
            $user->delete();

            session()->flash('message', 'User was deleted.');
            return redirect()->route('posts.index');
        }else{
            session()->flash('message', "You don't have permission to delete this.");
            return redirect()->route('users.show', ['id'=> $user->id]);
        }
    }
}
