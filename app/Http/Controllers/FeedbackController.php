<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request; 

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::all(); 
        return view('feedback', compact('feedback'));
    }

    public function previewFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedback', compact('feedback'));
    }

    public function deleteFeedback(Request $request, $id){
        $feedback = Feedback::find($id);
        $feedback->delete();
        
        return redirect()->route('feedback');
    } 

}
