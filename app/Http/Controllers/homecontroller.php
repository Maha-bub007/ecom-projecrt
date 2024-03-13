<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function home() {
        return \view('home.index');
    }
    public function datilspage() {
        return \view('home.productsDatils');

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
