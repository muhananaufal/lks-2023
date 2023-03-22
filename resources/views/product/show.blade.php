@extends('templating.template_container')
@section('content')
@if (Session::get('bougth'))
    <p class="alert alert-info">{{Session::get('bougth')}}</p>
@endif

<img src="{{asset('storage/'.$product->picture)}}" class="w-25">
<h3>{{$product->title}}</h3>
<p>{{$product->description}}</p>
<p>Color : {{$product->color}}</p>
<p>Quantity : {{$product->quantity}}</p>
<p>Price : ${{$product->price}}</p>
<p>Status : {{$product->status}}</p>
<p>{{$product->updated_at->format('l d F Y')}}, {{$product->updated_at->format('H:i')}}</p> 
<p class="btn btn-outline-secondary">{{$product->brand->brand_name}}</p>
<form action="{{route('products.buy', $product->slug)}}" method="post">
@csrf
  <button type="submit" class="btn btn-outline-primary">Buy</button>
</form>


@endsection