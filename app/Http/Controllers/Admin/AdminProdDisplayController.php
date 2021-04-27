<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProdDisplayController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        if(auth()->user()->admin==1){
            $prods=Product::where('id','>',0)->paginate(16);
            return \view('admin.allProducts',['prods'=>$prods]);
        }else{
            return \back();
        }
    }
}
