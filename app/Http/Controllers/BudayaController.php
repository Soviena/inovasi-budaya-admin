<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;

class BudayaController extends Controller
{
    public function index(){
        $page = ["title" => "Budaya"];
        $budaya = Budaya::orderBy('tanggal','DESC')->get();
        return view('budaya',compact('budaya','page'));
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
        return redirect()->route('budayaIndex');
    }

    public function deleteBudaya(Request $request, $id){
        $budaya = Budaya::find($id);
        $budaya->delete();
        return redirect()->route('budayaIndex');
    }  
    
public function editBudaya($id)
{
    $budaya = Budaya::findOrFail($id);
    return view('editBudaya', compact('budaya'));
}
    
    public function updateBudaya(Request $request, $id)
{
    $budaya = Budaya::findOrFail($id);
    $budaya->judul = $request->input('judul');
    $budaya->deskripsi = $request->input('deskripsi');
    $budaya->tanggal = $request->input('tanggal');

    $budaya->save();

    return redirect()->route('budayaIndex')->with('');
}

}
