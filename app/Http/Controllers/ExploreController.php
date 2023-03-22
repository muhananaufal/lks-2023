<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        $products = Product::where('status', 'published')->latest()->paginate(6);
        return view ('explore', [
            'brands'=>$brands,
            'products'=>$products,
        ]);
    }
}
