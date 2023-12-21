<?php

namespace App\Http\Controllers\Dashboard\Admin\Story;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
