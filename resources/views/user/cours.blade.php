@extends('layouts.user')

@section('content')
<main class="main">
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Kurslar</h1>
              <p class="mb-0">Yurtimizning eng yetakchi o‘qituvchilari tomonidan tayyorlangan videodarslarni tomosha qilib,
                siz nafaqat ishonchli o‘qituvchi qidirishdan holi bo‘lasiz, balki noyob metodika orqali darslarni qiziq va
                oson yo‘llar bilan o‘zlashtirishingiz mumkin.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('user_home') }}">Bosh sahifa</a></li>
            <li class="current">Kurslar</li>
          </ol>
        </div>
      </nav>
    </div>
    <section id="courses" class="courses section">
      <div class="container">
        <div class="row">
          @forelse($Cours as $item)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="image/banner/{{ $item->cours_image }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Kurs narxi: </p>
                  <p class="price">@if($item->lessin_price==0) Bepul @else $item->lessin_price so'm @endif</p>
                </div>
                <h3 class="w-100 text-center"><a href="{{ route('user_cours_show', $item['id'] ) }}">{{ $item->cours_name }}</a></h3>
                <p class="description">{{ $item->cours_description }}</p>
              </div>
            </div>
          </div> 
          @empty

          @endforelse
        </div>
      </div>
    </section>
  </main>


@endsection