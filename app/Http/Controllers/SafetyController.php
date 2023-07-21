<?php

namespace App\Http\Controllers;

use App\Models\SafetyMoment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SafetyController extends Controller
{
    public function index()
    {
        $safety_moments = SafetyMoment::all(); 
        return view('safety', compact('safety_moments'));
    }

    public function addSafety(Request $request)
{
    // Validate the form data
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'file_safety' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
    ]);

    $filesafetyPath = $request->file('file_safety')->store('uploaded/safety', 'public');

    $safety = new SafetyMoment([
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'fileName' => $filesafetyPath,
    ]);
    $safety->save();
    return redirect()->back()->with('');
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

    public function editSafety($id)
{
    $safety = SafetyMoment::findOrFail($id);
    return view('editSafety', compact('safety'));
}

    public function updateSafety(Request $request, $id)
{
    $safety = SafetyMoment::findOrFail($id);
    $safety->judul = $request->input('judul');
    $safety->deskripsi = $request->input('deskripsi');

    if ($request->hasFile('file_safety')) {
        Storage::delete('public/'.$safety->fileName);
        $fileSafety = $request->file('file_safety');
        $path = $fileSafety->store('uploaded/safety', 'public');
        $safety->fileName = $path;
    }
    
    $safety->save();

    return redirect()->route('safety')->with('');
}

}
