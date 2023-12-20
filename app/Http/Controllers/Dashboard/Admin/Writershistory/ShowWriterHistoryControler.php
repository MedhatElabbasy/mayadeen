<?php

namespace App\Http\Controllers\Dashboard\Admin\Writershistory;

use App\Http\Controllers\Controller;
use App\Models\WriterHistory;
use Illuminate\Http\Request;

class ShowWriterHistoryControler extends Controller
{
    public function index($id)
    {
        $writer = WriterHistory::find($id);
        if (!$writer) {
            abort(404);
        }

        return view('dashboard.writershistory.show', compact('writer'));
    }
}