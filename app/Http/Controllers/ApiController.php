<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;



class ApiController extends Controller
{
    public function register(Request $request) {
        $email = $request->email;
        $pw = $request->password;
        $u = DB::table('users')->where('email',$email)->first();
        if($u){
            $data = [
                'msg1' => 'Maaf, Alamat Email sudah terdaftar, coba alamat email lain!.',
            ];
            return response()->json($data,400);
        }else if($pw != $request->password2) {
            $data = [
                'msg2' => 'Maaf, Konfirmasi password salah!',
            ];
            return response()->json($data,400);
        }
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $email;
        $user->password = Hash::make($request->password);
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->save();
        $data = [
            'msg' => "Berhasil daftar",
            'loggedin' => TRUE,
            'id' => $user->id,
            'email' => $email,
            'name' => $request->name,
            'pic' => $user->profilepic,    
        ];
        return response()->json($data);
    }

    public function login(Request $request){
        $u = DB::table('users')->where('email',$request->email)->first();
        if(!$u){
            $data = [
                'msg' => "Email tidak terdaftar",
                'email' => $request->email
            ];
            return response()->json($data,400);
            
        }else if (Hash::check($request->password,$u->password)) {
            $data = [
                'msg' => "Berhasil login",
                'loggedin' => TRUE,
                'uid' => $u->id,
                'email' => $u->email,
                'name' => $u->name,
                'profilePic' => $u->profilepic
            ];
            return response()->json($data);
        }else{
            $data = [
                'msg' => "Maaf, Password yang dimasukkan salah!.",
                'email' => $request->email
            ];            
            return response()->json($data,400);
        }
    }
}
