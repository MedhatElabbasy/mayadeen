<?php

namespace App\Http\Controllers\website;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    public function index()
    {
        return view('website.story.title');
    }

    public function store(Request $request)
    {
        $story = new Story();
        $story->title = $request->input('story-title');
        $story->description = $request->input('description');
        $story->content = $request->input('content');

        // Writer 1
        $story->w1_name = $request->input('w1_name');
        $story->w1_number = $request->input('w1_number');
        $story->w1_email = $request->input('w1_email');

        // Writer 2
        $story->w2_name = $request->input('w2_name');
        $story->w2_number = $request->input('w2_number');
        $story->w2_email = $request->input('w2_email');

        // Writer 3
        $story->w3_name = $request->input('w3_name');
        $story->w3_number = $request->input('w3_number');
        $story->w3_email = $request->input('w3_email');
        $story->save();
        return redirect()->route('supervisor.story.thank-you')->with('success', 'Story created successfully');
    }
}