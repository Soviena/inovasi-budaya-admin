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
        $request->validate([
            'title' => 'required|string|max:255',
            'file_pdf' => 'required|file|mimes:pdf|max:10240', // Limit PDF file size to 10MB (10 * 1024 KB)
        ]);

        // Upload the PDF file and store its path in the database
        $filePdfPath = $request->file('file_pdf')->store('pdfs', 'public');

        $materi = new Materi([
            'title' => $request->input('title'),
            'fileName' => $filePdfPath,
        ]);

        $materi->save();

        return redirect()->back()->with('');
    }
    public function deleteMateri(Request $request, $id){
        $materi = Materi::find($id);
        $materi->delete();
        return redirect()->route('materi');
    }    

    public function downloadMateri($id)
    {
        $materi = Materi::findOrFail($id);
        return Storage::download("public/".$materi->fileName, $materi->title . '.pdf');
    }
}
