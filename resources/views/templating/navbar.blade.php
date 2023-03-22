<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{asset('img/icon/icon.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>Visual - Mobile Phone Marketplace</title>
</head>

<body>
  <nav class="navbar navbar-expand-md fixed-top bg-white">
    <div class="container">
      <div>
        <a href="{{route('landing')}}" class="navbar-brand"><img src="{{asset('img/icon/brand.png')}}"></a>
        </div>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#toggler"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="toggler">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="{{route('explore')}}" class="nav-link">Explore</a></li>
          <li class="nav-item"><a href="{{route('dashboard')}}" class="nav-link">Dashboard</a></li>
          <li class="nav-item"><a href="{{route('brands.index')}}" class="nav-link">Brands</a></li>
          <li class="nav-item"><a href="{{route('products.index')}}" class="nav-link">Products</a></li>
          @guest
          <li class="nav-item"><a href="{{route('login')}}" class="nav-link btn btn-success text-white me-2">Log in</a>
          </li>
          <li class="nav-item"><a href="{{route('register')}}" class="nav-link btn btn-success text-white">Register</a>
          </li>
          @endguest
          @auth
          <li class="nav-item"><a href="{{route('logout')}}" class="nav-link btn btn-danger text-white">Log out</a></li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>