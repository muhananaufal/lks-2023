<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Bougth;
use App\Models\User;
use Illuminate\Http\Request;

class BougthController extends Controller
{
    public function buy(Product $product)
    {
        Bougth::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$product->id,
        ]);
        $product->update([
            'quantity'=>$product->quantity - 1
        ]);
        return redirect()->back()->with('bougth', 'Pemberitahuan!, kamu baru saja membeli sebuah produk');
    }
}
