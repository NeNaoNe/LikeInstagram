<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    //

    const LOCAL_STORAGE_FOLDER = 'public/avatars/';
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public function show($id){
        $user = $this->user->findOrFail($id);

        return view('users.profile.show')->with('user', $user);
    }

    public function edit($id)
    {


        $user = $this->user->findOrFail($id);

        if(Auth::user()->id !== $user->id){
            return redirect()->route('profile.show', $id);
        }

        // $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.profile.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        # 1. Validate the data from the form
        $request->validate([
            'name'       => 'required|max:255',
            'email'    => 'required|email|max:255' . Rule::unique('users')->ignore(Auth::user()->id),
            'introductioin'  => 'max:1000',
            'avatar'         => 'mimes:jpg,png,jpeg,gif|max:1048'
        ]);

        # 2. Update the post
        $user         = $this->user->findOrFail(Auth::user()->id);
        $user->name   = $request->name;
        $user->email  = $request->email;
        $user->introduction   = $request->introduction;

        # If the user uploaded an avatar...
        if ($request->avatar){
            # If the user currently has an avatar, delete it from local storage
            if ($user->avatar){
                $this->deleteAvatar($user->avatar);
            }

            # Move the new image to local storage
            $user->avatar = $this->saveAvatar($request);
            // $user->avatar = '16823621234.jpeg';
    }

        $user->save();

        return redirect()->route('profile.show', $id);
    }

    private function saveAvatar($request)
    {
        # Rename the image to the CURRENT TIME to avoid overwriting
        $avatar_name = time() . "." . $request->avatar->extension();
        // $avatar_name = '16823621234.jpeg';

        # Save the image inside storage/app/public/avatars
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $avatar_name);

        return $avatar_name;
    }

    private function deleteAvatar($avatar_name)
    {
        $avatar_path = self::LOCAL_STORAGE_FOLDER . $avatar_name;
        // $avatar_path = "public/avatars/1672564784.jpg";

        // If the avatar is existing, delete.
        if (Storage::disk('local')->exists($avatar_path)){
            Storage::disk('local')->delete($avatar_path);
        }
    }

    public function followers($id){
        $user = $this->user->findOrFail($id);

        return view('users.profile.followers')->with('user', $user);
    }


}
