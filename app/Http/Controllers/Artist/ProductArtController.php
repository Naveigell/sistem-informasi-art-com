<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductArtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('artist.product.index');
    }

    public function editProduct(){
        return view('artist.product.edit-product');
    }

    public function uploadProduct()
    {
        return view('artist.product.upload-product');
    }

    public function collectionProduct()
    {
        return view('artist.product.product-collections');
    }
}
