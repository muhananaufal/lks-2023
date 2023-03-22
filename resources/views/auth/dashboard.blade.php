@extends('templating.template_container')
@section('content')
@if (Session::get('login_success'))
    <p class="alert alert-success">{{Session::get('login_success')}}</p>
@endif
@if (Session::get('register'))
    <p class="alert alert-success">{{Session::get('register')}}</p>
@endif

<div class="row section-padding-top-sm align-item-center justify-content-center">
  <div class="col-md-6">
    <img src="{{asset('img/icon/dashboard.png')}}" alt="" class="w-100">
  </div>
  <div class="col-md-6">
    <h1 class="fw-bold"><span class="text-info">{{auth()->user()->first_name}}</span><br>{{auth()->user()->last_name}}</h1>
    <p class="text-info small">{{auth()->user()->email}}</p>
    <a href="#" class="btn btn-outline-primary">See my cart</a>
  </div>
</div>
@endsection