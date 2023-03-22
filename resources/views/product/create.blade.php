@extends('templating.template_container')
@section('content')
<div class="section-padding-top-sm"></div>
<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <input type="file" name="picture" class="form-control" placeholder="Picture">
    @error('picture')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>
  <div class="mb-3">
    <input type="text" placeholder="Title" name="title" class="form-control">
    @error('title')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">

    <textarea name="description" class="form-control" placeholder="Desription"></textarea>
    @error('description')
    <p class="small text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3">

    <input type="text" name="color" class="form-control" placeholder="Color">
    @error('color')
    <p class="small text-danger">{{$message}}</p>
    @enderror
  </div>


  <div class="mb-3">

    <input type="number" name="quantity" class="form-control" placeholder="Quantity">
    @error('quantity')
    <p class="small text-danger">{{$message}}</p>
    @enderror
  </div>

  <div class="mb-3">
    <input type="number" name="price" class="form-control" placeholder="Price">
    @error('price')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>

  <div class="mb-3">
    <select name="status" class="form-control">
      <option value="" disabled selected>Select Status</option>
      <option value="published">Published</option>
      <option value="draft">Draft</option>
    </select>
    @error('status')
    <p class="small text-danger">{{$message}}</p>
    @enderror

  </div>
  <div class="mb-3">
    <select name="brand_id" class="form-control">
      <option value="" disabled selected>Select Brand</option>
      @foreach ($brands as $brand)
      <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
      @endforeach
    </select>
    @error('brand_id')
    <p class="small text-danger">{{$message}}</p>
    @enderror
  </div>
  <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection