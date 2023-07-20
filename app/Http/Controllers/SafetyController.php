<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SafetyController extends Controller
{
    public function safety(){
        return view('safety');
    }
    

}
