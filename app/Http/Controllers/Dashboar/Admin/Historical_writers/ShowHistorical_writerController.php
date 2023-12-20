<?php

namespace App\Http\Controllers\Admin\Historical_writers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalWriter;


class ShowHistorical_writerController extends Controller
{
    
    public function index($id)
    {
        $HistoricalWriter = HistoricalWriter::find($id);
        if (!$HistoricalWriter ) {
            abort(404); 
        }

        return view('dashboard.HistoricalWriter.show', compact('story'));
    }
}
