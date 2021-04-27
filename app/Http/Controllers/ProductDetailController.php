<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

class ProductDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index($i){
        $carts=Cart::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $Prod=Product::Where('id',$i)->get();
        // dd($carts->contains('product_id',$prod[0]->id));
        // dd($Prod);
        return \view('pages.details',['prod'=>$Prod,'carts'=>$carts]);
    }
}
