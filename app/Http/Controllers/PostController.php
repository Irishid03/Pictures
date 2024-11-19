<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; // Include Auth facade

class PostController extends Controller
{

public function view()
{
    // Fetch all posts with their associated user and shuffle them
    $randomPost = \App\Models\Post::with('user')->get()->shuffle(); // Use eager loading to get user data
    
    return view('discover', compact('randomPost')); 
}


    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
    
        // Check if the request has an image file
        if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->extension();
            // Move the image to the public/images directory
            $request->image->move(public_path('images'), $imageName);
    
            \Log::info('Authenticated User ID: ' . Auth::id());
            
            // Create the post and associate it with the authenticated user
            $post = Post::create([
                'image' => 'images/' . $imageName,
                'name' => $request->name,
                'description' => $request->description,
                'location' => $request->location,
                'camera' => $request->camera,
                'ISO' => $request->ISO,
                'aperture' => $request->aperture,
                'shutterspeed' => $request->shutterspeed,
                'zoom' => $request->zoom,
                'user_id' => Auth::id(), // Ensure this is set
            ]);
    
            return redirect()->back()->with('success', 'Post created successfully.');
        }
    
        // If no image was uploaded, return an error message
        return redirect()->back()->withErrors(['image' => 'Image is required.']);
    }

}