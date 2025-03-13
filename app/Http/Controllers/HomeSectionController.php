<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSection;

class HomeSectionController extends Controller
{
    public function index()
    {
        $sections = HomeSection::all();
        return view('admin.home_sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.banner_upload');
    }

    // Handle image upload
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'main_text' => 'required|string',
            'footer_text' => 'required|string',
            'images' => 'required|array|min:3|max:3', // Exactly 3 images required
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each image
        ]);

        $imageNames = [];

        foreach ($request->file('images') as $image) {
            $imageName = time() . '-' . uniqid() . '.' . $image->extension();
            $image->move(public_path('uploads/banners'), $imageName);
            $imageNames[] = $imageName;
        }

        // Save to database
        HomeSection::create([
            'title' => $request->title,
            'main_text' => $request->main_text,
            'footer_text' => $request->footer_text,
            'image_1' => $imageNames[0],
            'image_2' => $imageNames[1],
            'image_3' => $imageNames[2],
        ]);

        return back()->with('success', 'Banners uploaded successfully!');
    }

    public function edit($id)
    {
        $section = HomeSection::findOrFail($id);
        return view('admin.home_sections.edit', compact('section'));
    }

    public function show()
    {
        $banners = HomeSection::latest()->take(1)->get(); // Fetch latest uploaded banners
        return ($banners);
    }


    public function update(Request $request, $id)
    {
        $section = HomeSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'main_text' => 'required',
            'footer_text' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('home_sections', 'public');
        } else {
            $imagePath = $section->image;
        }

        $section->update([
            'title' => $request->title,
            'main_text' => $request->main_text,
            'footer_text' => $request->footer_text,
            'image' => $imagePath,
        ]);

        return redirect()->route('home-sections.index')->with('success', 'Section updated successfully');
    }

    public function destroy($id)
    {
        $section = HomeSection::findOrFail($id);
        $section->delete();

        return redirect()->route('home-sections.index')->with('success', 'Section deleted successfully');
    }
}
