<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return \view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required|confirmed'

        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'admin'=>0,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'hash'=> $request->password
        ]);

        auth()->attempt($request->only('email','password'));
        
        return \view('pages.dashboard');
        
    }
}
