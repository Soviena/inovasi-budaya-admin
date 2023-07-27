<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller 
{
    public function index()
    {
        $materis = Materi::all(); 
        return view('materi', compact('materis'));
    }

    public function store(Request $request)
    {
        $materi = new Materi;
        $materi->title = $request->title;
        $file_pdf = $request->file('file_pdf');
        $file_pdf->storeAs('public/uploaded/materi/',$file_pdf->hashName());
        $materi->fileName = $file_pdf->hashName();
        $materi->save();        
        return redirect()->route('materi');
    }
    
    public function deleteMateri(Request $request, $id){
        $materi = Materi::find($id);
        Storage::delete('public/uploaded/materi/'.$materi->fileName);
        $materi->delete();
        return redirect()->route('materi');
    } 

    public function editMateri(Request $request, $id)
{
    $materi = Materi::findOrFail($id);
    $materi->title = $request->input('title');

    if ($request->hasFile('file_pdf')) {
        Storage::delete('public/uploaded/materi/'.$materi->fileName);
        $file_pdf = $request->file('file_pdf');
        $file_pdf->storeAs('public/uploaded/materi/',$file_pdf->hashName());
        $materi->fileName = $file_pdf->hashName();
        $materi->save();        
        return redirect()->route('materi');
    }
    
    $materi->save();

    return redirect()->route('materi');
}


    public function downloadMateri($id)
    {
        $materi = Materi::findOrFail($id);
        return Storage::download("public/uploaded/materi/".$materi->fileName, $materi->title . '.pdf');
    }
}
