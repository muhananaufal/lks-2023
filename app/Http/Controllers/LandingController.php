<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::latest()->limit(3)->get();
        return view('landing', [
            'products'=>$products
        ]);
    }
}
