<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return \view('admin.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required'
        ]);
        auth()->attempt(['email' => $request->email, 'password' => $request->password, 'admin' => 1]);

        return \redirect()->route('adminhome');
    }
    
}
