<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\Bulan;
use App\Models\SafetyMoment;
use App\Models\Feedback;
use Illuminate\Http\Request;
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
        if($b){
            return response()->json($b);
        }else{
            return response("not found",404);
        }
    }

    public function getBudayaYearNow(){
        $today = new \DateTime();
        $b= DB::table('budayas')->where('tanggal','like',$today->format('Y').'%')->orderBy('tanggal','ASC')->get();
        return response()->json($b);
    }


    public function newFeedback(Request $request){
    $feedback = new Feedback;
    $feedback->user_id= $request->user_id;
    $feedback->judul= $request->judul;
    $feedback->deskripsi= $request->deskripsi;

    $feedback->save();

    return response()->json(['message' => 'Feedback added successfully'], 200);
    }

    public function incrementVisit($id){
        $user = User::find($id);
        $bulan = Bulan::where('bulan',date('Y').'-'.date('m'))->with('users')->first();
        if($bulan == ''){
            $bulan = new Bulan;
            $bulan->bulan = date('Y').'-'.date('m');
            $bulan->save();
            $user->bulan()->attach($bulan, [
                'visit' => 1,
                'updated_at' => now(),
                'created_at' => now(),
                ]);
            return response()->json(["msg" => "Sucessfully incremented because it new"]);
        }
        if ($bulan->users->contains('id', $user->id)) {
            if($user->bulan->first()->pivot->updated_at == ""){
                $user->bulan->first()->pivot->increment('visit');
                $user->bulan->first()->pivot->updated_at = now();
                return response()->json(["msg" => "Sucessfully incremented because it null"]);
            }
            // Convert the 'edited_at' timestamp into a DateTime instance.
            $editedTimestamp = new \DateTime($user->bulan->first()->pivot->updated_at);
            // Get the current time as a DateTime instance.
            $currentTime = new \DateTime();
            // Calculate the difference between the current time and the 'edited_at' timestamp.
            $timeDifference = $currentTime->diff($editedTimestamp);
    
            if ($timeDifference->y >= 1 || $timeDifference->m >= 1 || $timeDifference->d >= 1 || $timeDifference->h >=1 || $timeDifference->i >= 30) {
                // Perform your actions here (e.g., notify the user, log the event, etc.).
                // For example: return a response indicating that the edit is more than 30 minutes ago.
                $user->bulan->first()->pivot->increment('visit');
                $user->bulan->first()->pivot->updated_at = now();
                return response()->json(["msg" => "Sucessfully incremented","timeDifference"=>$timeDifference]);
            }
        }else{
            $user->bulan()->attach($bulan, [
                'visit' => 1,
                'updated_at' => now(),
                'created_at' => now(),
                ]);
            return response()->json(["msg" => "Sucessfully incremented because it new"]);
        }
        return response()->json(["msg" => "Already incremented","timeDifference"=>$timeDifference]);
    }

}
