<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // read
    public function index()
    {
        $brands = Brand::latest()->paginate(6);
        return view('brand.index', [
            'brands'=>$brands,
        ]);
    }

    // create
    public function create()
    {
        return view('brand.create');
    }
    public function store()
    {
        request()->validate([
            'brand_name'=>'required|unique:brands'
        ]);
        
        Brand::create([
            'brand_name'=>request()->brand_name,
            'slug'=>str()->slug(request()->brand_name)."-". str()->random(5),
        ]);
        return redirect()->route('brands.index')->with('brand_create', 'Selamat!! kamu baru saja membuat brand baru');
    }

    // update
    public function edit(Brand $brand)
    {
        return view('brand.edit', [
            'brand'=>$brand,
        ]);
    }
    public function update(Brand $brand)
    {
        request()->validate([
            'brand_name'=>'required|unique:brands'
        ]);

        $brand->update([
            'brand_name'=>request()->brand_name,
            'slug'=>str()->slug(request()->brand_name)."-". str()->random(5),
        ]);
        return redirect()->route('brands.index')->with('brand_edit', 'Pemberitahuan!! kamu baru saja mengubah sebuah Brand');
    }

    // delete
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('brand_delete', 'Peringatan!! kamu baru saja menghapus sebuah Brand');
    }

    // show
    public function show(Brand $brand)
    {
        return view ('brand.show', [
            'brand'=>$brand
        ]);
    }
}
