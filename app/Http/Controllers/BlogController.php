<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blogs', compact('blogs'));
    }

    public function admin()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs', compact('blogs'));
    }

    public function create()
    {
        return view('includes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        // return redirect()->route('blogs')->with('success', 'Blog posted successfully!');
        $blogs = Blog::latest()->get();

        return view('admin.blogs.blogs', compact('blogs'))->with('success', 'Blog posted successfully!');
    
    }
}
