@extends('templating.template_container')
@section('content')
<div class="row">
  <div class="col-md-9">
    <div class="row">
      @foreach ($products as $product)
      <div class="col-md-6">
        <img src="{{asset('storage/'.$product->picture)}}" class="w-50">
        <h3>{{$product->title}}</h3>
        <p>{{$product->description}}</p>
        <p>Color : {{$product->color}}</p>
        <p>Quantity : {{$product->quantity}}</p>
        <p>Price : ${{$product->price}}</p>
        <p class="btn btn-outline-secondary">{{$product->brand->brand_name}}</p>
        <br>
        <a href="{{route('products.show' ,$product->slug)}}" class="btn btn-info mb-5">Detail</a>
      </div>
      @endforeach
      {{$products->links()}}
    </div>
  </div>
  <div class="col-md-3">
    @foreach ($brands as $brand)
    <div class="col-md-6">
        <a href="{{route('brands.show', $brand->slug)}}" class="mt-5 text-decoration-none h2">{{$brand->brand_name}}</a>
        <p class="mb-5">{{$brand->updated_at->format('l d F Y')}}, {{$brand->updated_at->format('H:i')}}</p>
    </div>
    @endforeach
  </div>
</div>


@endsection