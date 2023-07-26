<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function loginView(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Check if the "Remember Me" checkbox is checked
        if (Auth::attempt($credentials, $remember)) {
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
