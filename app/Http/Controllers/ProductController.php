<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // read
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->latest()->paginate(6);
        return view('product.index', [
            'products' => $products
        ]);
    }

    // create
    public function create()
    {
        $brands = Brand::latest()->get();
        return view('product.create', [
            'brands' => $brands
        ]);
    }
    public function store()
    {
        request()->validate([
            'picture' => 'required|mimes:jpg,jpeg,png',
            'title' => 'required',
            'description' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'status' => 'required',
            'brand_id' => 'required',
        ]);

        $picture = request()->file('picture');
        $pictureURL = $picture->storeAs('picture', str()->random(20) . ".{$picture->extension()}");

        Product::create([
            'picture' => $pictureURL,
            'title' => request()->title,
            'description' => request()->description,
            'color' => request()->color,
            'price' => request()->price,
            'quantity' => request()->quantity,
            'status' => request()->status,
            'brand_id' => request()->brand_id,
            'slug' => str()->slug(request()->title) . "-" . str()->random(5),
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('products.index')->with('product_create', 'Selamat!! kamu baru saja menambahkan sebuah product');
    }

    // update
    public function edit(Product $product)
    {
        $this->authorize('access', $product);

        $brands = Brand::latest()->get();
        return view('product.edit', [
            'product' => $product,
            'brands' => $brands,
        ]);
    }
    public function update(Product $product)
    {
        $this->authorize('access', $product);

        request()->validate([
            'picture' => 'required|mimes:jpg,jpeg,png',
            'title' => 'required',
            'description' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'status' => 'required',
            'brand_id' => 'required',
        ]);

        if (request()->file('picture')) {
            $picture = request()->file('picture');
            $pictureURL = $picture->storeAs('picture', str()->random(20) . ".{$picture->extension()}");
            \Storage::delete($product->picture);
        } else {
            $pictureURL = $product->picture;
        }

        $product->update([
            'picture' => $pictureURL,
            'title' => request()->title,
            'description' => request()->description,
            'color' => request()->color,
            'quantity' => request()->quantity,
            'price' => request()->price,
            'status' => request()->status,
            'brand_id' => request()->brand_id,
            'slug' => str()->slug(request()->title) . "-" . str()->random(5),
        ]);
        return redirect()->route('products.index')->with('product_edit', 'Pemberitahuan!! kamu baru saja mengubah sebuah product');
    }
    // delete
    public function destroy(Product $product)
    {
        $this->authorize('access', $product);

        $product->delete();
        return redirect()->route('products.index')->with('product_delete', 'Peringatan!! kamu baru saja menghapus sebuah product');
    }
    // show
    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product
        ]);
    }
}
