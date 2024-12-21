@extends('layouts.user')

@section('content')
<main class="main">
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>O'qituvchilar</h1>
            <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ route('user_home') }}">Bosh sahida</a></li>
          <li class="current">O'qituvchilar</li>
        </ol>
      </div>
    </nav>
  </div>
    
  <section id="trainers" class="section trainers">
    <div class="container">
      <div class="row gy-5">
        @foreach($Techer as $item)
        <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
          <div class="member-img">
            <img src="image/techer/{{ $item['techer_image'] }}" class="img-fluid" alt="">
            <div class="social">
              <a href="{{ $item['telegram'] }}"><i class="bi bi-telegram"></i></a>
              <a href="{{ $item['instagram'] }}"><i class="bi bi-facebook"></i></a>
              <a href="{{ $item['facebook'] }}"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
          <div class="member-info text-center">
            <h4>{{ $item['techer_name'] }}</h4>
            <span>{{ $item['techer_title'] }}</span>
            <p>{{ $item['techer_discription'] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</main>


@endsection