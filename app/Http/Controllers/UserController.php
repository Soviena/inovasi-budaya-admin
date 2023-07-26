<?php

namespace App\Http\Controllers;



class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function login(){
        return view('login');
    }

    public function manage(){
        return view('manage');
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

}
