@extends('templating.template')
@section('content')
<section id="hero-section" class="mt-5 pt-5 mb-3">
  <div class="container section-padding-top-sm">
    <div class="row">
      <div class="col-md-6"><img src="{{asset('img/phone/samsung-fold.png')}}"></div>
      <div class="col-md-6">
        <h1 class="fw-bold fs-80">Everything<div class="text-info align-items-center justify-content-center">Relative
          </div>
        </h1>
      </div>
    </div>
  </div>
</section>
<div class="section-padding-top section-padding-bottom">
</div>
<section id="section-2">
  <div class="container section-padding-top-sm">
    <div class="row text-center">
      <div class="col-md-12">
        <h1 class="fw-bold fs-80">Create Your<div class="text-info">Brands</div></h1>
        <p>You can make your own brands, but you must login</p>
        <a href="{{route('brands.create')}}" class="btn btn-outline-info">Get new brands</a>
      </div>
    </div>
  </div>
</section>
<div class="section-padding-top section-padding-bottom">
  <section id="section-2">
    <div class="container section-padding-top-sm">
      <div class="row text-center">
        <div class="col-md-12">
          <h1 class="fw-bold fs-80">Create Your<div class="text-info">Products</div></h1>
          <p>You can make your own products, but you must login</p>
          <a href="{{route('products.create')}}" class="btn btn-outline-info">Get new products</a>
        </div>
      </div>
    </div>
  </section>

  <div class="section-padding-top">
    <section id="section-2" class="bg-dark text-white">
      <div class="container section-padding-top-sm  section-padding-bottom-sm">
        <div class="row text-center">
          <div class="col-md-12">
            <h5 class="fw-bold">Website by Muhana Naufal Al-Atsari</h5>
            <p>Enjoy !!</p>
          </div>
        </div>
      </div>
    </section>

</div>
</div>
  @endsection