<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        $carts=Cart::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        if($carts->count()>0){
        $total=0;
        foreach($carts as $c){
            $total=$total+(int)$c->total;
        }
        return \view('pages.checkout',['carts'=>$carts,'total'=>$total]);
        }else{
           
            return \redirect()->route('dashboard');
        }
    }
    public function store(Request $request){
        $this->validate($request,[
            'deliverytype'=>'required',
            'addresss'=>'required|max:255'
        ]);
        $carts=Cart::where('user_id',auth()->user()->id)->get();
        if($request->deliverytype=="prime"){
            $e=30;
        }else{
            $e=10;
        }
        // $array1=array();
        foreach($carts as $c){   
        //     $order=new Order();
        //     $order->user_id=auth()->user()->id;
        //     $order->product_id=$c->product_id;
        //    $order->price=$c->price;
        //    $order->address=$request->addresss;
        //    $order->status="En Route";
        //    $order->quantity=$c->quantity;
        //    $order->DeliverMode=$request->deliverytype;
        //    $order->total=(($c->price*$c->quantity)+$e);
        //    $order->save();
            Order::create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$c->product_id,
                'price'=>$c->price,
                'address'=>$request->addresss,
                'status'=>"En Route",
                'quantity'=>$c->quantity,
                'DeliverMode'=>$request->deliverytype,
                'total'=>(($c->price*$c->quantity)+$e)

            ]);
            // array_push($array1,$order);
        }
        // dd($carts);
        $cart=Cart::Where('user_id',auth()->user()->id)->delete();
        return \redirect()->route('dashboard');
    }
}
