<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\survey\storeSurveyRequest;
use App\Models\survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        return view('website.survey.index');
    }

    public function store(storeSurveyRequest $request)
    {
        $data = $request->validated();
        survey::create($data);

        return view('website.survey.success' );
    }
}
