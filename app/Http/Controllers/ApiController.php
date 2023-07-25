<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\SafetyMoment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Storage;



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
            'dob' => $user->tanggal_lahir
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
                'profilePic' => $u->profilepic,
                'dob' => $u->tanggal_lahir
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

    public function editUser(Request $request, $id){
        $User = User::find($id);
        $User->name=$request->name;
        $User->email=$request->email;
        $User->tanggal_lahir=$request->tanggal_lahir;
        if($request->hasfile('picture')){
            if ($User->profilepic != "default.png") {
                Storage::delete('public/uploaded/user/'.$User->profilepic);
                $here = "public/uploaded/user/".$User->profilepic;
            }
            $profilepic = $request->file('picture');
            $profilepic->storeAs('public/uploaded/user/',$profilepic->hashName());
            $User->profilepic = $profilepic->hashName();
        }
        $User->save();
        $data = [
            'msg' => "Berhasil update = ",
            'uid' => $User->id,
            'email' => $User->email,
            'name' => $User->name,
            'profilePic' => $profilepic->hashName(),
            'dob' => $User->tanggal_lahir
        ];
        return response()->json($data);
    }

    public function budayaAll(){
        $budaya = Budaya::orderBy('tanggal','DESC')->get();
        return response()->json($budaya);
    }

    public function aktivitasBudaya($id){
        $b = Budaya::with('aktivitas')->find($id);
        return response()->json($b);
    }

    public function safetyMoment(){
        $safety = SafetyMoment::all();
        return response()->json($safety);
    }

    public function getBudayaNow(){
        $today = new \DateTime();
        $b= DB::table('budayas')->where('tanggal',$today->format('Y-m'))->first();
        return response()->json($b);
    }

    public function getBudayaYearNow(){
        $today = new \DateTime();
        $b= DB::table('budayas')->where('tanggal','like',$today->format('Y').'%')->orderBy('tanggal','ASC')->get();
        return response()->json($b);
    }

}
