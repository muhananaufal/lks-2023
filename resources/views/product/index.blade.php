@extends('templating.template_container')
@section('content')
@if (Session::get('product_create'))
    <p class="alert alert-success">{{Session::get('product_create')}}</p>
@endif
@if (Session::get('product_edit'))
    <p class="alert alert-info">{{Session::get('product_edit')}}</p>
@endif
@if (Session::get('product_delete'))
    <p class="alert alert-danger">{{Session::get('product_delete')}}</p>
@endif

<a href="{{route('products.create')}}" class="btn btn-primary">Add a new product</a>
<br>
<br>
<div class="row">
    @foreach ($products as $product)
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
        <a href="{{route('products.edit' ,$product->slug)}}" class="btn btn-info mb-3 me-1">Edit</a>
        <a href="{{route('products.show' ,$product->slug)}}" class="btn btn-info mb-3">Detail</a>
        <br>
        <form action="{{route('products.delete', $product->slug)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger mb-5">Delete</button>
        </form>
        
    </div>
    @endforeach
    {{$products->links()}}
</div>

@endsection