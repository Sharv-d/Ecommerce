<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class DashboardController extends Controller
{
    
    public function index(){
        if(auth()->user()){
            $carts=Cart::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
            $prods=Product::where('id','>',0)->paginate(16);
            return \view('pages.dashboard',['prods'=>$prods,'carts'=>$carts]);
        }else{
            $prods=Product::where('id','>',0)->paginate(16);
            return \view('pages.dashboard',['prods'=>$prods]);
        }
        
    }
}
