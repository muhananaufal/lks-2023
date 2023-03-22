@extends('templating.template_container')
@section('content')

<div class="row">
    <div class="col-md-6">
        <img src="{{asset('img/icon/register.png')}}" alt="" class="w-100">
    </div>
    <div class="col-md-6 pt-5">
        <form action="{{route('register.post')}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" placeholder="First Name" name="first_name" class="form-control">
                @error('first_name')
                <p class="small text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="mb-3">
                <input type="text" placeholder="Last Name" name="last_name" class="form-control">
                @error('last_name')
                <p class="small text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="mb-3">
                <input type="email" placeholder="Email" name="email" class="form-control">
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
            <div class="mb-3">

                <input type="password" placeholder="Retype Password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>

    </div>
</div>
@endsection