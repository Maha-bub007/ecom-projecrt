<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDeatils;
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
    public function ordersuccessful($invoiceId){
        return view('home.thankyou',compact('invoiceId'));

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

                return redirect('/products-checkout');
                toastr()->success('Add to cart has been saved successfully!');
            }
        } elseif ($cartproduct != null) {
            $cartproduct->qty = $cartproduct->qty + $request->qty;
            $cartproduct->save();
            if ($action == 'addToCart') {
                toastr()->success('Add to cart has been saved successfully!');
                return redirect()->back();
            } else {
                toastr()->success('Add to cart has been saved successfully!');
                return redirect('/products-checkout');
            }
        }
    }
    public function adtocarts(Request $request, $id)
    {
        $cartproduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = productmodel::where('id', $id)->first();
        if ($cartproduct == null) {
            $cart = new Cart();
            $cart->color = $request->color;
            $cart->size = $request->size;
            $cart->product_id = $id;
            $cart->ip_address = $request->ip();
            $cart->qty = 1;
            if ($product->discount_price == null) {
                $cart->price = $product->regular_price;
            } elseif ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            }
            $cart->save();
            toastr()->success('Add to cart has been saved successfully!');
            return redirect()->back();
        } elseif ($cartproduct != null) {
            $cartproduct->qty = $cartproduct->qty + 1;
            $cartproduct->save();
            toastr()->success('Add to cart has been saved successfully!');
            return redirect()->back();
        }
    }
    public function adtocartsdelete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function orderconfirm(OrderRequest $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->area = $request->area;
        $order->address = $request->address;
        $order->price = $request->price;
        $previousorder = Cart::orderBy('id', 'desc')->first();
        if ($previousorder != null) {
            $invoice = 'Xcellence Find - ' . $previousorder->id+1;
            $order->InvoiceId =  $invoice ;
        }
        if ($previousorder == null) {
            $order->InvoiceId = 'Xcellence Find - 1';
        }
        $order->save();
        $cartdeatils = Cart::with('product')->where('ip_address',$request->ip())->get();
        if($cartdeatils) 
        {
            foreach($cartdeatils as $data){
                $orderdatils = new OrderDeatils();
                $orderdatils->order_id = $order->id;
                $orderdatils->product_id = $data->product->id;
                $orderdatils->price =$data->price;
                $orderdatils->qty =$data->qty;
                $orderdatils->size =$data->size;
                $orderdatils->color =$data->color;
                $orderdatils->OrderProductImage = $data->product->image;
                $orderdatils->save();
                $data->delete();
                return redirect('order-successful/'.$invoice);                                         
               
            }
           
        }
        else{
            toastr()->warning('Your order can not  successfull!');
            return redirect()->back();
        }
        
    }
}
