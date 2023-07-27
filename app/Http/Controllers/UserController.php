<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $remember = $request->has('remember'); // Check if the "Remember Me" checkbox is checked
        if (Auth::attempt($credentials, $remember)) {
            $unreadItems = Feedback::where('status', 'unread')->get();

            // Save the unread items to the session
            Session::put('unreadFeedbacks', count($unreadItems));
            return redirect()->route("index"); // Redirect to your desired authenticated route
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

    public function editUser(Request $request, $id){
    $users = User::findOrFail($id);
    $users->name = $request->input('name');
    $users->email = $request->input('email');
    $users->tanggal_lahir = $request->input('tanggal_lahir');

    if ($request->password != '') {
            $users->password = $request->password;
    }

    if ($request->hasFile('file_profile')) {
        Storage::delete('public/uploaded/profile/'.$users->profilepic);
        $file_profile = $request->file('file_profile');
        $file_profile->storeAs('public/uploaded/profile/',$file_profile->hashName());
        $users->profilepic = $file_profile->hashName();
        $users->save();        
        return redirect()->route('manageUser');
    }
  
    $users->save();

    return redirect()->route('manageUser');
}

public function tambahUser(Request $request){
    $users = new User;
    $users->name = $request->name;
    $users->email = $request->email;
    $users->tanggal_lahir = $request->tanggal_lahir;
    $users->password = $request->password;
    $file_profile = $request->file('file_profile');
        $file_profile->storeAs('public/uploaded/profile/',$file_profile->hashName());
        $users->profilepic = $file_profile->hashName();
        $users->save();        
        return redirect()->route('manageUser');
}

public function hapusUser(Request $request, $id){
    $users = User::find($id);
    Storage::delete('public/uploaded/profile/'.$users->profilepic);
    $users->delete();
    return redirect()->route('manageUser');
}

    public function ubahAdmin($id){
    $users = User::findOrFail($id);
    $users->admin = "TRUE"; 
    $users->save();

    return redirect()->route('manageUser')->with('');
    }

}
