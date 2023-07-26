<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Rewards;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function login(){
        return view('login');
    }
    public function reward(){
        $reward = Rewards::all();
        $users = User::all();
        return view('reward',compact('reward','users'));
    }

    public function manage()
    {
        $manage = User::all(); 
        return view('manage', compact('manage'));
    }
    public function csv(){
        $filePath = storage_path('temp/csv.csv');
        // $content = File::get($filePath);
        // $updatedContent = str_replace(',', '.', $content);
        // $updatedContent = str_replace(';', ',', $updatedContent);
        // File::put($filePath, $updatedContent);

        if (($open = fopen($filePath, "r")) !== false) {
            while (($data = fgetcsv($open, 1000, ",")) !== false) {
                $array[] = $data;
            }
         
            fclose($open);
        }
        return view('kinerja',compact('array'));
    }

    public function editUser(Request $request, $id)
{
    $users = User::findOrFail($id);
    $users->name = $request->input('name');
    $users->email = $request->input('email');
    $users->tanggal_lahir = $request->input('tanggal_lahir');

    if ($request->password != '') {
            $users->password = $request->password;
    }
    
    $users->save();

    return redirect()->route('manageUser',$request->id);
}

    public function ubahAdmin($id)
{
        $users = User::findOrFail($id);
        $users->admin = "TRUE"; 
        $users->save();

        return redirect()->route('manageUser')->with('');
}

}
