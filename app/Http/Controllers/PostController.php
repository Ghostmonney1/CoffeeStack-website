<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Laat alle posts van een bepaald topic zien
    public function topic($slug)
    {
        $posts = Post::where('topic', $slug)->latest()->get();
        return view('topic', compact('slug', 'posts'));
    }

    // Opslaan van een nieuwe post (voor later)
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'topic' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title ?? 'Untitled Question',
            'content' => $request->content,
            'topic' => $request->topic,
        ]);

        return redirect()->back()->with('success', 'Your question has been posted!');
    }
}
