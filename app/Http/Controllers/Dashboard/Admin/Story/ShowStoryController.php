<?php

namespace App\Http\Controllers\Dashboard\Admin\Story;

use App\Models\Story;
// use Barryvdh\DomPDF\PDF;

use Barryvdh\DomPDF\PDF;



use Barryvdh\DomPDF\Facade ;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;

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

    //// downloadPDF
    public function downloadPDF($id){
        $story = Story::find($id);

        if (!$story) {
            abort(404);
        }
        $data = ['title' => $story->title, 'content' => $story->content];

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('dashboard.story.pdf', $data); // Update with your view path
        $pdf->setPaper('a4', 'portrait');
$pdf->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);
$pdf->output();

        // Download PDF
        return $pdf->download($story->title . '.pdf');
    }
}