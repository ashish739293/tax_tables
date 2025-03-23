<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Rating::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Thank you for your feedback!');
    }

    public function getRatings()
{
    $ratings = Rating::with(['user:id,firstname,lastname']) // Fetch firstname and lastname instead of name
        ->latest()
        ->get()
        ->map(function ($rating) {
            return [
                'id' => $rating->id,
                'user_name' => $rating->user ? $rating->user->firstname . ' ' . $rating->user->lastname : 'Anonymous',
                'rating' => $rating->rating,
                'comment' => $rating->comment ?? 'No review given.',
                'created_at' => $rating->created_at->format('Y-m-d H:i:s'),
            ];
        });

    return response()->json($ratings);
}

    
}
