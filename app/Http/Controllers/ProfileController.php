<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\user_profiles;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function show(Request $request): View
    {
        $user = $request->user();
        $posts = $user->posts;
    
        Log::info('Editing profile for user:', ['user_id' => $user->id, 'posts_count' => $posts->count()]);
    
        return view('profiles', [
            'user' => $user,
            'posts' => $posts,
        ]);

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    
    public function create()
    {
        return view('profile.create'); // Return the profile creation view
    }
    

    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user_profiles,username,' . Auth::user()->profile->id, // Adjusted to check in user_profiles
            'description' => 'required|string|max:500',
            'camera_info' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Update the user's profile
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Update the profile related to the user
        $user->profile->username = $request->username;
        $user->profile->description = $request->description;
        $user->profile->camera_info = $request->camera_info;
        $user->profile->instagram = $request->instagram;
        $user->profile->facebook = $request->facebook;
    
        // Save the changes
        $user->push(); // This will save the user and their profile
    
        // Redirect back with a success message
        return redirect()->back()->with('status', 'profile-updated');
    }



    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


}
