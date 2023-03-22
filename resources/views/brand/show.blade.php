@extends('templating.template_container')
@section('content')
  <h1 class="mb-5">Brand : {{$brand->brand_name}}</h1>

  <div class="row">
    @foreach ($brand->products as $product)
    <div class="col-md-6">
        <img src="{{asset('storage/'.$product->picture)}}" class="w-50">
        <h3>{{$product->title}}</h3>
        <p>{{$product->description}}</p>
        <p>Color : {{$product->color}}</p>
        <p>Quantity : {{$product->quantity}}</p>
        <p>Price : ${{$product->price}}</p>
        <p>Status : {{$product->status}}</p>
        <p>{{$product->updated_at->format('l d F Y')}}, {{$product->updated_at->format('H:i')}}</p>
        <p class="btn btn-outline-secondary">{{$product->brand->brand_name}}</p>
        <br>
        <a href="{{route('products.show' ,$product->slug)}}" class="btn btn-info mb-3">Detail</a>
    </div>
    @endforeach
</div>
@endsection