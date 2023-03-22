@extends('templating.template_container')
@section('content')
@if (Session::get('brand_create'))
    <p class="alert alert-success">{{Session::get('brand_create')}}</p>
@endif
@if (Session::get('brand_edit'))
    <p class="alert alert-info">{{Session::get('brand_edit')}}</p>
@endif
@if (Session::get('brand_delete'))
    <p class="alert alert-danger">{{Session::get('brand_delete')}}</p>
@endif
<a href="{{route('brands.create')}}" class="btn btn-primary mb-5">Create a new</a>
<br>
<div class="row">
    @foreach ($brands as $brand)
    <div class="col-md-6">
        <h1 class="mt-5 mb-2">{{$brand->brand_name}}</h1>
        <p>{{$brand->updated_at->format('l d F Y')}}, {{$brand->updated_at->format('H:i')}}</p>
        <a href="{{route('brands.edit', $brand->slug)}}" class="btn btn-info mb-3">Edit</a>
        <a href="{{route('brands.show', $brand->slug)}}" class="btn btn-info mb-3">Show</a>
        <br>
        <form action="{{route('brands.delete', $brand->slug)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <br>
    </div>
    @endforeach
    {{$brands->links()}}
</div>

@endsection