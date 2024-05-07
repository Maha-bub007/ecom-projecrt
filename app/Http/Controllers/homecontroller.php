<?php

namespace App\Http\Controllers;

use App\Models\productmodel;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function home() {
        $hotproduct = productmodel::where('product_type','hot')->orderby('id','desc')->get();
        $newproduct = productmodel::where('product_type','new')->orderby('id','desc')->get();
        $regularproduct = productmodel::where('product_type','regular')->orderby('id','desc')->get();
        $discountproduct = productmodel::where('product_type','discount')->orderby('id','desc')->get();
        return \view('home.index',compact('hotproduct','newproduct','regularproduct','discountproduct'));
    }
    public function datilspage($slug) {
        $product = productmodel::where('slug',$slug)->with('color','size','gallaryimage')->first();
        // dd($product);
        return \view('home.productsDatils',compact('product'));

    }
    public function products_shop() {
        return \view('home.productshop');
        
    }
    public function return() {
        return \view('home.return');
        
    }
    public function viewall() {
        return \view('home.viewall');
        
    }
    public function viewcart() {
        return \view('home.viewcart');
        
    }
    public function checkout() {
        return \view('home.checkout');
        
    }
    public function policy() {
        return \view('home.policy');
        
    }
    public function ceatagory() {
        return \view('home.ceatagory');
        
    }
    public function contactus() {
        return \view('home.contactus');
        
    }

}
