<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestClientController extends Controller
{
    public function index(){
        return view('client.request.index');
    }

    public function detailRequest(){
        return view('client.request.detail');
    }

    public function payRequest(){
        return view('client.request.make-payment');
    }
    
    public function payment(){ 
        return view('client.payment.payment');
    }

    public function activeRequest(){
        return view('client.request.active-request');
    }

    public function readyReview(){
        return view('client.request.ready-review');
    }
}
