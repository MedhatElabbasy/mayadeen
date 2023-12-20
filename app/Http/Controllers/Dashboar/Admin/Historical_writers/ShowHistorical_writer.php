<?php

namespace App\Http\Controllers\Admin\Historical_writers;

use App\Http\Controllers\Controller;
use App\Models\HistoricalWriter;

use Illuminate\Http\Request;

class ShowHistorical_writer extends Controller
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
