<?php

// app/Http/Controllers/FeedbackController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; 

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all(); 
        return view('feedback', compact('feedbacks'));
    }
}
