<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        // dd("orders");
        $orders=Order::Where('user_id',auth()->user()->id);
        return \view('pages.orders',['orders'=>$orders]);
    }
}
