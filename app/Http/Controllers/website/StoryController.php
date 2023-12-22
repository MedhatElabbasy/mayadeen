<?php

namespace App\Http\Controllers\website;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Requests\StoryRequest;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    public function index()
    {
        return view('website.story.title');
    }

    public function store(Request $request)
    {


        $story = new Story( $request->all());
        $story->save();


        return redirect()->route('supervisor.story.thank-you')->with('success', 'Story created successfully');
    }
}
