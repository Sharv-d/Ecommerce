<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return \view('auth.login');
    }
    public function store(Request $request){
        
        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required'
        ]);
        auth()->attempt(['email' => $request->email, 'password' => $request->password, 'admin' => 0]);

        return \redirect()->route('dashboard');
    }

}
