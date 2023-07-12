<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;



class BudayaController extends Controller
{
    public function index(){
        $budaya = Budaya::orderBy('tanggal','DESC')->get();
        return view('budaya',compact('budaya'));
    }
    public function addBudaya(){
        return view('addBudaya');
    }

    public function newBudaya(Request $request){
        $budaya = new Budaya;
        $budaya->judul = $request->judul;
        $budaya->deskripsi = $request->deskripsi;
        $budaya->tanggal = $request->bulan;
        $budaya->save();
        return redirect()->route('index');
    }

}
