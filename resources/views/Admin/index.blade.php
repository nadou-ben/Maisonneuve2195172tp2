@extends('Admin.main')
@section('content')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('assets/1.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('assets/2.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('assets/3.jpg')}}" alt="Third slide">
      </div>
    </div>
  </div>

  <h1 class="mt-5 text-info text-center ">@lang('lang.text_titre_site')</h1>

@endsection