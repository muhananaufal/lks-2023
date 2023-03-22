@extends('templating.template_container')
@section('content')

<form action="{{route('products.update', $product->slug)}}" method="post" enctype="multipart/form-data">
  @method('put')
  @csrf
  <img src="{{asset('storage/'.$product->picture)}}" class="w-25">
  <div class="mb-3">
    <input type="file" name="picture" class="form-control" placeholder="Picture">
    @error('picture')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">
    <input type="text" placeholder="Title" name="title" class="form-control" value="{{$product->title}}">
    @error('title')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">
    <textarea name="description" class="form-control" placeholder="Desription">{{$product->description}}</textarea>
    @error('description')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">
    <input type="text" name="color" class="form-control" placeholder="Color" value="{{$product->color}}">
    @error('color')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">
    <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="{{$product->quantity}}">
    @error('quantity')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">
    <input type="number" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
    @error('price')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>


  <div class="mb-3">
    <select name="status" class="form-control">
      <option value="" disabled selected>Select Status</option>
      <option value="published" @if ($product->status === 'published') selected
        @endif>Published</option>
      <option value="draft" @if ($product->status === 'draft') selected
        @endif>Draft</option>
    </select>
    @error('status')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">
    <select name="brand_id" class="form-control">
      <option value="" disabled selected>Select Brand</option>
      @foreach ($brands as $brand)
      <option value="{{$brand->id}}" @if ($product->brand_id === $brand->id) selected
        @endif>{{$brand->brand_name}}</option>
      @endforeach
    </select>
    @error('brand_id')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>


  <button type="submit" class="btn btn-success">Edit</button>
</form>
@endsection