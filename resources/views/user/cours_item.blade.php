@extends('layouts.user2')

@section('content')
<main class="main">

<!-- Page Title -->
<div class="page-title" data-aos="fade">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>{{ $Cours['cours_name'] }}</h1>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('user_home') }}">Bosh sahifa</a></li>
        <li><a href="{{ route('user_cours') }}">Kurslar</a></li>
        <li class="current">Kurs haqida</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Courses Course Details Section -->
<section id="courses-course-details" class="courses-course-details section">

  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-8">
        <img src="../image/banner/{{ $Cours['cours_image'] }}" class="img-fluid" alt="">
        <h3>{{ $Cours['cours_name'] }}</h3>
        <p>
          {{ $Cours['cours_description'] }}
        </p>
      </div>
      <div class="col-lg-4">

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Kurs</h5>
          <p><a>{{ $Cours['cours_name'] }}</a></p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Darslar soni</h5>
          <p>{{ $Count }}</p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Dars davomiyligi</h5>
          <p>{{ $Cours['lessin_time'] }}</p>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>O'qituvchi</h5>
          <p>{{ $Cours['techer_name'] }}</p>
        </div>
        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Daraja</h5>
          <p>{{ $Cours['lessin_daraja'] }}</p>
        </div>
        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Kurs narxi</h5>
          <p>{{ $Cours['lessin_price'] }} so'm</p>
        </div>
        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Davomiyligi</h5>
          <p>{{ $Cours['lessin_davomiyligi'] }} kun</p>
        </div>
        <div class="text-center py-3">
          @if($Cours['lessin_price']=='0')
            <a href="{{ route('lessin_show', $Cours['id']) }}" class="p-3 text-white" style="background-color: red;border-radius: 20px;">Kurslarimga saqlash</a>
          @else
            <a href="{{ route('paymart',$Cours['id']) }}" class="p-3 text-white" style="background-color: red;border-radius: 20px;">Kursni sotib olish</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<section id="tabs" class="tabs section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="tab-content">
      <div class="tab-pane active show" id="tab-1">
        <div class="row">
          <div class="col-lg-8 details order-2 order-lg-1">
            <h3>Kurs mavzulari</h3>
            <ol>
              @foreach($CoursItem as $item)
              <li><p class="fst-italic py-2">{{ $item['item_name'] }}</p></li>
              @endforeach
            </ol>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
</main>


@endsection