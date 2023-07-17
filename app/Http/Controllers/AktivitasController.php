<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktivitas;
use App\Models\Budaya;
use Illuminate\Support\Facades\Storage;




class AktivitasController extends Controller
{
    public function index(){
        $budaya = Budaya::with('aktivitas')->orderBy('tanggal','DESC')->get();
        return view('aktivitas',compact('budaya'));
    }

    public function addAktivitas($bid){
        return view('addAktivitas', ["budayaId"=>$bid]);
    }

    public function newAktivitas(Request $request){
        $aktivitas = new Aktivitas;
        $aktivitas->budaya_id = $request->idBudaya;
        $aktivitas->judul = $request->judul;
        $aktivitas->deskripsi = $request->deskripsi;
        // $aktivitas->filename = $request->file;
        // Storage::delete('public/uploaded/Course/'.$course->image);
        $img = $request->file('img');
        $img->storeAs('public/uploaded/aktivitas/',$img->hashName());
        $aktivitas->filename = $img->hashName();
        $aktivitas->save();        
        return redirect()->route('indexAktivitas');
    }

}
