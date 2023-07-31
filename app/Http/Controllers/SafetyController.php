<?php

namespace App\Http\Controllers;

use App\Models\SafetyMoment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SafetyController extends Controller
{
    public function index()
    {
        $page = ["title" => "Safety Moments"];
        $safety_moments = SafetyMoment::all(); 
        return view('safety', compact('safety_moments','page'));
    }

    public function addSafety(Request $request)
{
    $safety = new SafetyMoment;
    $safety->judul = $request->judul;
    $safety->deskripsi = $request->deskripsi;
    $file_safety = $request->file('file_safety');
        $file_safety->storeAs('public/uploaded/safety/',$file_safety->hashName());
        $safety->fileName = $file_safety->hashName();
        $safety->save();        
        return redirect()->route('safety');
}

        public function previewSafety($id)
    {
        $safety = SafetyMoment::findOrFail($id);
        return view('safety', compact('safety'));
    }

    public function deleteSafety(Request $request, $id){
        $safety = SafetyMoment::find($id);
        Storage::delete('public/'.$safety->fileName);
        $safety->delete();
        
        return redirect()->route('safety');
    } 

    public function updateSafety(Request $request, $id)
{
    $safety = SafetyMoment::findOrFail($id);
    $safety->judul = $request->input('judul');
    $safety->deskripsi = $request->input('deskripsi');

    if ($request->hasFile('img')) {
        Storage::delete('public/uploaded/safety/'.$safety->fileName);
        $img = $request->file('img');
        $img->storeAs('public/uploaded/safety/',$img->hashName());
        $safety->fileName = $img->hashName();
    }
    $safety->save();        
    return redirect()->route('safety');
}

}
