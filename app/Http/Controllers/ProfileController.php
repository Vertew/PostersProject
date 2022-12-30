<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Gate;
use App\Models\Profile;
use App\Contracts\IP_Locator;

class ProfileController extends Controller
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
        $profile = Profile::findOrFail($id);
        return view('profiles.show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        if (Gate::allows('update-profile', $profile)) {
            return view('profiles.edit', ['profile' => $profile]);
        }else{
            session()->flash('message', "You don't have permission to edit this profile.");
            return redirect()->route('profiles.show', ['id'=> $profile->id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, IP_Locator $ip_locator)
    {
        // All data here is nullable since it's not required that the user enter any profile info.
        $validatedData = $request->validate([
            'name' => 'nullable|max:30',
            'date_of_birth' => 'nullable|date',
            'status' => 'nullable|max:100',
            'profile_picture' => 'nullable|image',
        ]);


        $profile = Profile::findOrFail($id);

        // Unfortunately laravel isn't able to get my actual IP adress so for demonstration
        // I'm generating a fake ip address with faker. If the website were to go into production
        // this line would be replaced with $request->ip()
        $ip = fake()->ipv4();

        // Service container used for my IP_Locator class which communicates with IPinfo.
        if($request['location']){
            $ip_location = $ip_locator->locate($ip);
            $city= $ip_location->city();
            $country= $ip_location->country();
            $profile->location = $country.', '.$city;
        }else{
            $profile->location = null;
        }

        $profile->name = $validatedData['name'];
        $profile->date_of_birth = $validatedData['date_of_birth'];
        $profile->status = $validatedData['status'];
        $image = $profile->image;
        if (Gate::allows('icon-profile', $profile)) {
            if($request['profile_picture'] != null){
                $image->name = $this->storeImage($request);
            }
            if($request['checkbox'] && !($profile->image->name === "DefaultProfileIcon.png")){
                File::delete(public_path('profile_pictures/'.$image->name));
                $image->name = "DefaultProfileIcon.png";
            }
            $profile->image()->save($image);
            session()->flash('message', 'Profile was updated.');
        }elseif($request['profile_picture'] != null || $request['checkbox']){
            session()->flash('message', 'Profile Updated. You do not have permission to alter your profile icon.');
        }

        $profile->save();

        return redirect()->route('profiles.show', ['id'=> $profile->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . Auth::user()->username . '.' .
        $request->profile_picture->extension();
        $request->profile_picture->move(public_path('profile_pictures'), $newImageName);

        return $newImageName;
    }

}
