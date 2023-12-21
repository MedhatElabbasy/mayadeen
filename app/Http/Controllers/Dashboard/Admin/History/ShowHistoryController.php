<?php

namespace App\Http\Controllers\Dashboard\Admin\History;
use App\Models\HistoricalWriter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowHistoryController extends Controller
{
    public function index($id)
    {
        $HistoricalWriter = HistoricalWriter::find($id);
        if (!$HistoricalWriter) {
            abort(404);
        }

        // Assuming you have a 'writer_img' column in your database for the image path
        $imagePath = asset('storage/' . $HistoricalWriter->writer_img);

        return view('dashboard.HistoricalWriter.show', compact('HistoricalWriter', 'imagePath'));
    }
}
