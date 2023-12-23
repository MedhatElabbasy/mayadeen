<?php

namespace App\Http\Controllers\Dashboard\Admin\Story;

use App\Models\User;
use App\Models\Story;
use Illuminate\Http\Request;
//
use App\Mail\StoryPdfSendMail;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

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




    public function showSendEmailForm(Story $story){
        $supervisor = User::where('role_id', '2')->first();

        return view('dashboard.story.send-email-form', compact('story','supervisor'));
    }

    public function sendEmail(Request $request, Story $story)
    {

        $pdf = FacadePdf::loadView('dashboard.story.pdf', ['title' => $story->title, 'content' => $story->content]);
        $data['title'] =$story->title;
        $data['content'] = $story->content;
        $data['pdf'] = $pdf;


        $recipients = $request->input('recipients', []);
        // dd(  $recipients);
        //send mail
        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new StoryPdfSendMail($data));
        }


        return redirect()->route('admin.dashboard.story')->with('success', ' تم الارسال   ');
    }
}
