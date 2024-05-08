<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\productmodel;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function home()
    {
        $hotproduct = productmodel::where('product_type', 'hot')->orderby('id', 'desc')->get();
        $newproduct = productmodel::where('product_type', 'new')->orderby('id', 'desc')->get();
        $regularproduct = productmodel::where('product_type', 'regular')->orderby('id', 'desc')->get();
        $discountproduct = productmodel::where('product_type', 'discount')->orderby('id', 'desc')->get();
        return \view('home.index', compact('hotproduct', 'newproduct', 'regularproduct', 'discountproduct'));
    }
    public function datilspage($slug)
    {
        $product = productmodel::where('slug', $slug)->with('color', 'size', 'gallaryimage')->first();
        // dd($product);
        return \view('home.productsDatils', compact('product'));
    }
    public function products_shop()
    {
        return \view('home.productshop');
    }
    public function return()
    {
        return \view('home.return');
    }
    public function viewall()
    {
        return \view('home.viewall');
    }
    public function viewcart()
    {
        return \view('home.viewcart');
    }
    public function checkout()
    {
        return \view('home.checkout');
    }
    public function policy()
    {
        return \view('home.policy');
    }
    public function ceatagory()
    {
        return \view('home.ceatagory');
    }
    public function contactus()
    {
        return \view('home.contactus');
    }
    public function adtocart(Request $request, $id)
    {
        $cartproduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = productmodel::where('id', $id)->first();
        $action = $request->action;
        if ($cartproduct == null) {
            $cart = new Cart();
            $cart->color = $request->color;
            $cart->size = $request->size;
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = $request->qty;
            if ($product->discount_price == null) {
                $cart->price = $product->regular_price;
            } elseif ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            }
            $cart->save();
            if ($action == 'addToCart') {
                toastr()->success('Add to cart has been saved successfully!');
                return redirect()->back();
            } else {
                toastr()->success('Add to cart has been saved successfully!');
                return redirect('/products-checkout');
            }
        } else if ($cartproduct != null) {
            $cartproduct->qty = $cartproduct->qty + $request->qty;
            if ($action == 'addToCart') {
                toastr()->success('Add to cart has been saved successfully!');
                return redirect()->back();
            } else {
                toastr()->success('Add to cart has been saved successfully!');
                return redirect('/products-checkout');
            }
        }
    }
}
