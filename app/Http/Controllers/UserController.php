<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function index(){
        $page = ["title" => "Dashboard"];
        return view('index', compact('page'));
    }
    public function loginView(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); 
        // mengecek apakah checkbox "Ingat Saya" sudah ter centang
        if (Auth::attempt($credentials, $remember)) {
            $unreadItems = Feedback::where('status', 'unread')->get();

            Session::put('unreadFeedbacks', count($unreadItems));
            return redirect()->route("index"); 
            // Meneruskan ke route utama
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function manage()
    {
        $page = ["title" => "Manajemen Pengguna"];
        $manage = User::all(); 
        return view('manage', compact('manage','page'));
    }

    public function editUser(Request $request, $id){
        $request->validate([
            'email' => 'required|email',
        ]);    
        $user = User::findOrFail($id);
        //Mencari user dengan email yang valid
        $user->name = $request->input('name');
        if ($user->email != strtolower($request->input('email'))) {
            $user->email = strtolower($request->input('email'));
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
        // Mengirim email verifikasi
        $user->tanggal_lahir = $request->input('tanggal_lahir');

        if ($request->password != '') {
                $user->password = $request->password;
        }

        if ($request->hasFile('file_profile')) {
            if ($user->profilepic != "default.png") {
                Storage::delete('public/uploaded/user/'.$user->profilepic);
            }
            // Menambah foto profil
            $file_profile = $request->file('file_profile');
            $file_profile->storeAs('public/uploaded/user/',$file_profile->hashName());
            $user->profilepic = $file_profile->hashName();
            // mengubah foto profil
        }
    
        $user->save();

        return redirect()->back()->with(["EditSuccess" => "Data diri berhasil diubah"]);
    }

    public function tambahUser(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);    
        $u = DB::table('users')->where('email',$request->email)->first();
        if($u){
            return back()->withErrors("Maaf, Alamat Email sudah terdaftar, coba alamat email lain!.");
        }  
        $users = new User;
        $users->name = $request->name;
        $users->email = strtolower($request->email);
        $users->tanggal_lahir = $request->tanggal_lahir;
        $users->password = $request->password;
        if ($request->hasFile('file_profile')) {
            $file_profile = $request->file('file_profile');
            $file_profile->storeAs('public/uploaded/user/',$file_profile->hashName());
            $users->profilepic = $file_profile->hashName();
        }
        $users->save();
        $users->sendEmailVerificationNotification();
        return redirect()->route('manageUser');
        //Mengirim ulang verifikasi email jika user belum menerima
    }

    public function hapusUser(Request $request, $id){
        $users = User::find($id);
        if ($users->profilepic != "default.png") {
            Storage::delete('public/uploaded/profile/'.$users->profilepic);
        }
        $users->delete();
        return redirect()->route('manageUser');
    }

    public function ubahAdmin($id){
    $users = User::findOrFail($id);
    $users->admin = "TRUE"; 
    $users->save();

    return redirect()->route('manageUser')->with('');
    }

    public function ubahUser($id){
        $users = User::findOrFail($id);
        $users->admin = "FALSE"; 
        $users->save();
    
        return redirect()->route('manageUser')->with('');
    }

    public function profile(){
        return view('profil');
    }
    
    public function internalisasi(){
        $page = ["title" => "Tim Internalisasi"];
        $usersInternal = User::where('tim_internalisasi','TRUE')->get();
        $users = User::where('tim_internalisasi','FALSE')->get();
        return view('internalisasi',compact('usersInternal','users','page'));
    }
    public function addTimInternal($id){
        $users = User::findOrFail($id);
        $users->tim_internalisasi = "TRUE"; 
        $users->save();
    
        return redirect()->route('internalisasi')->with('');
    }

    public function deleteTimInternal($id){
        $users = User::findOrFail($id);
        $users->tim_internalisasi = "FALSE"; 
        $users->save();
    
        return redirect()->route('internalisasi')->with('');
    }

    public function aboutUs(){
        return view('aboutUs');
    }

}
