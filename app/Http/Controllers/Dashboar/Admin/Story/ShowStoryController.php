<?php

namespace App\Http\Controllers\Dashboar\Admin\Story;

use App\Http\Controllers\Controller;
use App\Models\Story;

class ShowStoryController extends Controller
{
    public function index($id)
    {
        $story = Story::find($id);
        if (!$story) {
            abort(404); 
        }

        return view('dashboard.story.show', compact('story'));
    }
}
