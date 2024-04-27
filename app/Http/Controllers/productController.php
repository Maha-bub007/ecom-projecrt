<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\productmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class productController extends Controller
{
    //
    public function productlist()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $products = productmodel::orderby('id', 'desc')->with('category', 'subcategory')->get();

                return view('backend.admin.products.list', compact('products'));
            }
        }
    }
    public function productAddNew(){
        $products= Category::get();
        return view('backend.admin.products.add',compact('products'));
    }
    public function productStore(Request $request){
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $product =new productmodel();
                $product->name = $request->name;
                $product->slug = Str::slug($request->name);
                $product->cat_id = $request->cat_id;
                $product->quantity = $request->quantity;
                $product->buy_price = $request->buy_price;
                $product->discount_price = $request->discount_price;
                $product->regular_price = $request->regular_price;
                $product->sqy_code = $request->sqy_code;
                $product->short_desc = $request->short_desc;
                $product->long_desc = $request->long_desc;
                $product->product_policy = $request->product_policy;
                $product->product_type = $request->product_type;
                if(isset($request->image)){
                    // $imageName = rand() . 'category' . '.' . $store->image->extension();
                    // $store->image->move('backend/image/category', $imageName);
                    // $CategoryStore->image = $imageName;
                    $imageName = rand().'product'.'.'.$request->image->extension();
                    $request->image->move('backend/image/product',$imageName);
                    $product->image=  $imageName;

                }
                $product->save();
                return redirect()->back();

                
            }
        }

    }
    public function productedit($id){
        $productedit = productmodel::find($id);
        $products= productmodel::get();
        
        return view ('backend/admin/products/edit',compact('productedit','products'));
    }
    public function productupdate (Request $requests, $id){
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $productes =productmodel::find($id);
                $productes->name = $requests->name;
                $productes->slug = Str::slug($requests->name);
                $productes->cat_id = $requests->cat_id;
                $productes->quantity = $requests->quantity;
                $productes->buy_price = $requests->buy_price;
                $productes->discount_price = $requests->discount_price;
                $productes->regular_price = $requests->regular_price;
                $productes->sqy_code = $requests->sqy_code;
                $productes->short_desc = $requests->short_desc;
                $productes->long_desc = $requests->long_desc;
                $productes->product_policy = $requests->product_policy;
                $productes->product_type = $requests->product_type;
                if(isset($requests->image)){
                    $imageName = rand().'product'.'.'.$requests->image->extension();
                    $requests->image->move('backend/image/product',$imageName);
                    $productes->image=  $imageName;

                }
                $productes->save();
                return redirect()->back();

                
            }
        }

    }
    
}
