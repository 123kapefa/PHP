<?php

namespace App\Http\Controllers;

use App\Jobs\SendFeedbackJob;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        return view("pages.feedback",
            ['menu' => config('top.menu'), 'currentPage' => 'Feedback']);
    }

    public function up(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'text' => 'required',
        ]);

        SendFeedbackJob::dispatch($validated['email'], $validated['phone'], $validated['text']);


        return redirect()->route('base')->with('status', 'The leter was sent');
    }
}
