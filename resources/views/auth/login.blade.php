@extends('templating.template_container')
@section('content')
@if (Session::get('login_failed'))
<p class="alert alert-danger">{{Session::get('login_failed')}}</p>
@endif
@if (Session::get('logout'))
<p class="alert alert-danger">{{Session::get('logout')}}</p>
@endif
@if (Session::get('register'))
<p class="alert alert-success">{{Session::get('register')}}</p>
@endif

<div class="row">
    <div class="col-md-6">
        <img src="{{asset('img/icon/auth.png')}}" alt="" class="w-100">
    </div>
    <div class="col-md-6 pt-5">
    <a href="{{route('register')}}" class="text-decoration-none small">Dont have account?</a>
    <form action="{{route('login.post')}}" method="post">
        @csrf
        <div class="mb-3">
            <input type="email" placeholder="Email" name="email" class="form-control mt-3">
            @error('email')
            <p class="small text-danger">{{$message}}</p>
            @enderror
    
        </div>
        <div class="mb-3">
            <input type="password" placeholder="Password" name="password" class="form-control">
            @error('password')
            <p class="small text-danger">{{$message}}</p>
            @enderror
    
        </div>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
    </div>
</div>
@endsection