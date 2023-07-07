<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function checkout(){
        return view('dashboard.payment.checkout');
    }
    public function session(Request $request){
        // dd($request);
        $productname=$request->get('productname');
        $totalprice=$request->get('total');
dd($productname,$totalprice);
        return ('session');
    }
    public function success(){
        return ('success');
    }

}
