<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;

class ProfileController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::latest()->paginate(5);

        return view('profiles.index', compact('profiles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'real_name' => 'required',
            'favourite_games' => 'required',
            'location' => 'required',
            'about_me' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'required'
        ]);

        $profile = Profile::create($request->all());

        // Check if an image has been uploaded
        if ($request->has('avatar')) {
            // Get image file
            $avatar = $request->file('avatar');
            // Make a image name based on profile name and current timestamp
            $name = Str::slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '/images/profiles/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $avatar->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($avatar, $folder, 'public', $name);
            // Set profile image path in database to filePath
        }

        $user_id = auth()->user->id;
        
        $profile->save();

        return redirect()->route('profiles.index')
            ->with('success', 'profile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'real_name' => 'required',
            'favourite_games' => 'required',
            'location' => 'required',
            'about_me' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $profile->update($request->all());

        // Check if an image has been uploaded
        if ($request->has('avatar')) {
            // Get image file
            $avatar = $request->file('avatar');
            // Make a image name based on profile name and current timestamp
            $name = Str::slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '/images/profiles/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $avatar->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($avatar, $folder, 'public', $name);
            // Set profile image path in database to filePath
            $profile->image = $filePath;
        }
        $profile->save();

        return redirect()->route('profiles.index')
            ->with('success', 'profile created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('profiles.index')
            ->with('success', 'profile deleted successfully');
    }
}
