<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestArtistController extends Controller
{

    public function index(){
        return view('artist.request.index');
    }

    public function activeRequest(){
        return view('artist.request.active-request');
    }

    public function finishRequest(){
        return view('artist.request.finish-request');
    }

    public function reviewRequest(){
        return view('artist.request.review');
    }
}