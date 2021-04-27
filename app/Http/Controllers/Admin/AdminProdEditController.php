<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
use App\Models\Product;

class AdminProdEditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        if(auth()->user()->admin==1){    
            $prod=Product::Where('id',$_GET['pid'])->get();
            //  dd($product[0]->prod_name);
            // ->with('prod',$product)
            return \view('admin.editproducts',['prod'=>$prod]);
        }else{
            return \back();
        }
    }
    public function update(Request $request){
        if(auth()->user()->admin==1){    
            $this->validate($request,[
                    'product_name'=>'required',
                    'company_name'=>'required',
                    'price'=>'required',
                    'description'=>'required|max:255',
                    'file-upload'=>'nullable|image|max:1999'
                    
            ]);
            $Prod=Product::Where('id',$_GET['pid'])->get();
            $filenameToRemove=$Prod[0]->image;
            if($request->hasFile('file-upload')){
                $filenameithExt=$request->file('file-upload')->getClientOriginalName();
                $filname=\pathinfo($filenameithExt,PATHINFO_FILENAME);
                $ext=$request->file('file-upload')->getClientOriginalExtension();
                $fileNameToStore=$filname.'_'.\time().'.'.$ext;
                $path=$request->file('file-upload')->storeAs('public/product_images',$fileNameToStore);
                unlink(public_path('storage/product_images/'.$filenameToRemove));
            }else{
                $fileNameToStore=$filenameToRemove;
            }
            
            $prod=Product::Where('id',$_GET['pid'])->update([
                'prod_name' => $request->product_name,
                'company_name'=>$request->company_name,
                'price'=>$request->price,
                'description'=>$request->description,
                'image'=>$fileNameToStore
                ]);
            //  dd($product[0]->prod_name);
            // ->with('prod',$product)
            
            
            return \redirect()->route('adminProducts.show');
        }else{
            return \back();
        }
    }
    public function destroy(){
        if(auth()->user()->admin==1){  
            $Prod=Product::Where('id',$_GET['pid'])->get();
            $filenameToRemove=$Prod[0]->image;
            // File::delete('/storage/app/public/products_image/'.$filenameToRemove);
            unlink(public_path('storage/product_images/'.$filenameToRemove));
            $prod=Product::Where('id',$_GET['pid'])->delete();
            return \redirect()->route('adminProducts.show');
        }else{
            return \back();
        }
    }
}
