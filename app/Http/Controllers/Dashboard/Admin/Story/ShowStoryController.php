<?php

namespace App\Http\Controllers\Dashboard\Admin\Story;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
//
use Illuminate\Support\Facades\App;

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

    // downloadPDF
    public function downloadPDF($id)
    {
        $story = Story::find($id);

        if (!$story) {
            abort(404);
        }
        $data = ['title' => $story->title, 'content' => $story->content];

        $pdf = FacadePdf::loadView('dashboard.story.pdf', $data);

        return $pdf->download($story->title . '.pdf');
    }

}