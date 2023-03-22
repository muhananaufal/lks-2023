@extends('templating.template_container')
@section('content')
<div class="section-padding-top"></div>
<div class="row">
    <div class="col-md-5">
        <img src="{{asset('img/icon/edit-brands.png')}}" alt="" class="w-100">
    </div>
    <div class="col-md-7 mt-5 pt-5">
        <form action="{{route('brands.update', $brand->slug)}}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <h3 class="mb-3">Edit your Brand</h3>
                <input type="text" placeholder="Brand Name" name="brand_name" class="form-control" value="{{$brand->brand_name}}">
                @error('brand_name')
                <p class="small text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>
<div class="section-padding-bottom"></div>

@endsection