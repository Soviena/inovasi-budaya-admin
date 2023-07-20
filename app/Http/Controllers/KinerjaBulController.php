<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KinerjaBulController extends Controller
{   

    public function kinerjaBulanan(){
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
        return view('kinerjaBulanan',compact('array'));
    }
}
