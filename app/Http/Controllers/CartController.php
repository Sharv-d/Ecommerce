<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;


class CartController extends Controller
{  
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function store(Request $request){
        
        $this->validate($request,[
            'id'=>'required|integer',
            'name'=>'required',
            'company_name'=>'required',
            'price'=>'required|min:1',
            'quantity'=>'integer|required|min:1',
            'image'=>'required'
            
        ]);
        
        
        
            Cart::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$request->id,
                'name'=>$request->name,
                'company'=>$request->company_name,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'image'=>$request->image,
                'total'=>((int)$request->price * $request->quantity)
            ]);
                return \redirect()->route('dashboard');
            
        // // ShoppingCart::add($request->id,$request->name,1,$request->price,['company'=>$request->company_name,'image'=>$request]);
        // // return \redirect()->route('dashboard');
        // return \back();
    }
    public function destroy(Request $request)
    {
        $this->validate($request,[
            'id'=>'required'
        ]);
        $cart=Cart::Where('id',$request->id)->delete();
        return \back();
    }
}
