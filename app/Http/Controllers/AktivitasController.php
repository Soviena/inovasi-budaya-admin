<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;
use App\Models\Image;



class AktivitasController extends Controller
{
    public function index(){
        $budaya = Budaya::orderBy('tanggal','DESC')->get();
        return view('aktivitas',compact('budaya'));
    }
}
