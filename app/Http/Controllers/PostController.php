<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller // Ensure it's PostController
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('dashboard', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Post::create([
            'user_id' => auth()->id(),
            'image' => $path,
            'caption' => $request->caption,
        ]);

        return redirect()->back();
    }
}
