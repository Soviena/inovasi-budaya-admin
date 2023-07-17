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
    public function aktivitas($id){
        $b = Budaya::with('aktivitas')->find($id);
        return view('aktiv',compact('b'));
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


    public function deleteAktivitas(Request $request, $id){
        $aktivitas = Aktivitas::find($id);
        Storage::delete('public/uploaded/aktivitas/'.$aktivitas->fileName);
        $aktivitas->delete();
        return redirect()->route('indexAktivitas');
    }

    

}
