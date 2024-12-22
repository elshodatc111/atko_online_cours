@extends('layouts.user')

@section('content')
<main class="main">
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Mening Kurslarim</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('user_home') }}">Bosh sahifa</a></li>
            <li class="current">Mening Kurslarim</li>
          </ol>
        </div>
      </nav>
    </div>
    <section id="courses" class="courses section">
      <div class="container">
        <div class="row">
          @forelse($UserCours as $item)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="image/banner/{{ $item['cours_image'] }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Kurs muddati: </p>
                  <p class="price">{{ $item['end'] }}</p>
                </div>
                <h3 class="w-100 text-center"><a href="{{ route('my_cours_show',$item['cours_id']) }}">{{ $item['cours_name'] }}</a></h3>
              </div>
            </div>
          </div> 
          @empty
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-5 py-5" data-aos="zoom-in" data-aos-delay="100">
              <h6 class="w-100 text-center my-5 py-5">Sizda aktiv kurslar mavjud emas</h6>
          </div>
          @endforelse

        </div>
      </div>
    </section>
  </main>



@endsection