<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rating' => 'required',
            'message' => 'required'
        ]);

        Feedback::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'message' => $request->message
        ]);

        return back()->with('success', 'Thank you for your feedback!');
    }
}