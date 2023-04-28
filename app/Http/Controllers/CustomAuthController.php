<?php
namespace App\Http\Controllers;

use App\Http\Traits\UploadTrait;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    use UploadTrait;
    public function index()
    {
        // dd('l');
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home')
                        ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        if($data['image'])
        {
            $imageName = $this->uploadImage('image', 'user_images');
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'image' => $imageName,
    ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('welcome');
        }

        return redirect("/")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        // dd('k');
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
