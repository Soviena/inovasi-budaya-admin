<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KinerjaBulController extends Controller
{   

    public function kinerjaBulanan(){
        $kinerja = Kinerja::orderBy('tanggal','DESC')->get();
        $page = ["title" => "Kinerja Bulanan"];
        return view('kinerjaBulanan',compact('kinerja','page'));
    }

    public function addKinerja(Request $request){
        $kinerja = new Kinerja;
        $kinerja->tanggal = $request->tanggal;
        $csv = $request->file('csv');
        $csv->storeAs('public/uploaded/csv/',$csv->hashName());
        $content = File::get(storage_path('app/public/uploaded/csv/').$csv->hashName());
        if (strpos($content, ";") != false) {
            $updatedContent = str_replace(',', '.', $content);
            $updatedContent = str_replace(';', ',', $updatedContent);
            File::put(storage_path('app/public/uploaded/csv/').$csv->hashName(), $updatedContent);
        }
        $kinerja->fileName = $csv->hashName();
        $kinerja->save();
        return redirect()->route('kinerjaBulan');
    }

    public function kinerja($id){
        $kinerja = Kinerja::find($id);
        $filePath = storage_path('app/public/uploaded/csv/').$kinerja->filename;
        if (($open = fopen($filePath, "r")) !== false) {
            while (($data = fgetcsv($open, 1000, ",")) !== false) {
                $array[] = $data;
            }
            fclose($open);
        }
        return view('kinerja',compact('array'));
    }

    public function deleteKinerja($id){
        $kinerja = Kinerja::find($id);
        Storage::delete('public/uploaded/csv/'.$kinerja->filename);
        $kinerja->delete();
        return redirect()->back();
    }

    public function editKinerja(Request $request, $id){
        $kinerja =Kinerja::findOrFail($id);
        $kinerja->tanggal = $request->tanggal;    
        if ($request->hasFile('csv')) {
            Storage::delete('public/uploaded/csv/'.$kinerja->filename);
            $csv = $request->file('csv');
            $csv->storeAs('public/uploaded/csv/',$csv->hashName());
            $content = File::get(storage_path('app/public/uploaded/csv/').$csv->hashName());
            if (strpos($content, ";") != false) {
                $updatedContent = str_replace(',', '.', $content);
                $updatedContent = str_replace(';', ',', $updatedContent);
                File::put(storage_path('app/public/uploaded/csv/').$csv->hashName(), $updatedContent);
            }
            $kinerja->filename = $csv->hashName();
        }
        $kinerja->save();
        return redirect()->route('kinerjaBulan')->with('success');
    }
}
