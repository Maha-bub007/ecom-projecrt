@extends('master');
@section('contant')
<main>
    <section class="checkout-section">
        <div class="container">
            <form action="{{url('comfirm-order')}}" method="post" class="form-group billing-address-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout-wrapper">
                            <div class="billing-address-wrapper">
                                <h4 class="title">Billing / Shipping Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Full Name *"/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone *"/>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea rows="4" name="address" class="form-control" id="address"
                                            placeholder="Enter Full Address"></textarea>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div style="background:  lightgrey;padding: 10px;margin-bottom: 10px;" onclick="indhaka()">
                                            <input type="radio" id="inside_dhaka"  name="area" value="80"/>
                                            <label for="inside_dhaka"
                                                style="font-size: 18px;font-weight: 600;color: #000;">Inside Dhaka (80
                                                Tk.)</label>
                                        </div>
                                        <div style="background: lightgrey;padding: 10px;" onclick="outdhaka()">
                                            <input type="radio" id="outside_dhaka" name="area" value="150"/>
                                            <label for="outside_dhaka"
                                                style="font-size: 18px;font-weight: 600;color: #000;">Outside Dhaka (150
                                                Tk.)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout-items-wrapper">
                            @foreach ($cartshow as $data)
                                <div class="checkout-item-outer">
                                <div class="checkout-item-left">
                                    <div class="checkout-item-image">
                                        <img src="{{asset('backend/image/product/'.$data->product->image)}}" alt="Image"/>
                                    </div>
                                    <div class="checkout-item-info">
                                        <h6 class="checkout-item-name">
                                            {{$data->product->name}}
                                        </h6>
                                        <p class="checkout-item-price">
                                           {{$data->price}}
                                        </p>
                                        <span class="checkout-item-count">
                                            {{$data->qty}}
                                        </span>
                                        <br />
                                        <span class="checkout-item-count">
                                         Size:   {{$data->size}}                                               
                                        </span>                                                
                                        <span class="checkout-item-count">
                                            Color: {{$data->color}}
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="checkout-item-right">
                                    <a href="{{url('/product-addtocats/delete/'.$data->id)}}" class="delete-btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($cartshow as $cart)
                            @php
                                $subtotal = $subtotal + $cart->price * $cart->qty;
                            @endphp
                                
                            @endforeach
                            
                            <div class="sub-total-wrap">
                                <div class="sub-total-item">
                                     <strong>Sub Total</strong>
                                    <strong id="subTotal">৳ {{$subtotal}}</strong>
                                    <input type ="hidden" id="stotal" name ="sototal" value="{{$subtotal}}">
                                </div>
                                <div class="sub-total-item">
                                    <strong>Delivery charge</strong>
                                    <strong id="deliveryCharge">৳ 0</strong>
                                    
                                </div>
                                <div class="sub-total-item grand-total">
                                     <strong>Grand Total</strong>
                                     <strong id="grandTotal">৳ {{$subtotal}}</strong>
                                     <input type ="hidden" name ="price" value="{{$subtotal}}">
                                </div>
                            </div>
                            <div class="payment-item-outer">
                                <h6 class="payment-item-title">
                                    Select Payment Method
                                </h6>
                                <div class="payment-items-wrap justify-content-center">
                                    <div class="payment-item-outer">
                                        <input type="radio" name="payment_type" id="cod" value="cod" checked="">
                                        <label class="payment-item-outer-lable" for="cod">
                                            <strong>Cash On Delivery</strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="order-place-btn-outer">
                                <button type="submit" class="order-place-btn-inner">
                                    Place an Order
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection;
@push('script')
<script>
    function indhaka(){
        var dhaka = parseFloat(document.getElementById('inside_dhaka').value);
        var charge =document.getElementById('deliveryCharge').innerHTML ='৳'+ dhaka;
        var subtotal = parseFloat(document.getElementById('stotal').value); 
        var grandTotal = document.getElementById('grandTotal');
        grandTotal.innerHTML = dhaka + subtotal;

       

    }
    function outdhaka(){
        var outdhaka =parseFloat(document.getElementById('outside_dhaka').value);
        var charge =document.getElementById('deliveryCharge').innerHTML ='৳'+ outdhaka;
        var subtotal = parseFloat(document.getElementById('stotal').value); 
        var grandTotal = document.getElementById('grandTotal');
        grandTotal.innerHTML = outdhaka + subtotal;
       

    }
   
        
        
        
    
    
    
       
    
</script>

    
@endpush