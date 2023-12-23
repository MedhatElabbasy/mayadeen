<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
// use Barryvdh\DomPDF\PDF;
use App\Mail\StoryPdfSendMail;
use App\Models\Story;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class StoryController extends Controller
{
    public function index()
    {
        return view('website.story.title');
    }

    public function store(Request $request)
    {
        $story = new Story($request->all());
        $story->save();

        // Generate PDF
        $pdf = FacadePdf::loadView('dashboard.story.pdf', ['title' => $story->title, 'content' => $story->content]);

        $recipientEmails = [
            auth()->user()->email,
            $request->input('w1_email'),
            $request->input('w2_email'),
            $request->input('w3_email'),
        ];
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['body'] = "from mayadeen";

        // Generate PDF
        $pdf = FacadePdf::loadView('dashboard.story.pdf', ['title' => $data['title'], 'content' => $data['content']]);
        $data['pdf'] = $pdf;

        // Send email with the PDF attached using Laravel Mail
        foreach ($recipientEmails as $recipientEmail) {
            $data['email'] = $recipientEmail;
            Mail::to($recipientEmail)->send(new StoryPdfSendMail($data));
        }

        // Save PDF to public/pdfs directory
        $pdfPath = public_path('pdfs/' . $story->title . '.pdf');
        $pdf->save($pdfPath);

        return redirect()->route('supervisor.story.thank-you')->with([
            'success' => 'Story created successfully',
            // 'w1_email' =>  $request->input('w1_email'),
            // 'w2_email' => $request->input('w2_email'),
            // 'w3_email' => $request->input('w3_email'),
            'w1_name' => $request->input('w1_name'),
            'w2_name' => $request->input('w2_name'),
            'w3_name' => $request->input('w3_name'),
        ]);
    }

}
