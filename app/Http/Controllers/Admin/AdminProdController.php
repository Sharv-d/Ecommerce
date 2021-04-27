<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
class AdminProdController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        if(auth()->user()->admin==1){
        return \view('admin.addproducts');
        }else{
            return \back();
        }
    }
    public function store(Request $request){
        if(auth()->user()->admin==1){
            $this->validate($request,[
                'product_name'=>'required',
                'company_name'=>'required',
                'price'=>'required',
                'description'=>'required',
                'file-upload'=>'required|image|max:1999'            
            ]);
            $filenameithExt=$request->file('file-upload')->getClientOriginalName();
            $filname=\pathinfo($filenameithExt,PATHINFO_FILENAME);
            $ext=$request->file('file-upload')->getClientOriginalExtension();
            $fileNameToStore=$filname.'_'.\time().'.'.$ext;
            $path=$request->file('file-upload')->storeAs('public/product_images',$fileNameToStore);
            Product::create([
                'prod_name' => $request->product_name,
                'company_name' => $request->company_name,            
                'price' => $request->price,
                'description' => $request->description,
                'image'=>$fileNameToStore
                
            ]);
            return \redirect()->route('adminhome');
        }else{
            return \back();
        }
    }
}
