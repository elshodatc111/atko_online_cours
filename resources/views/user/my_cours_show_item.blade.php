@extends('layouts.user3')

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
        <li><a href="{{ route('my_cours') }}">Kurslarim</a></li>
        <li class="current">Kurs mavzusi</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Courses Course Details Section -->
<section id="courses-course-details" class="courses-course-details section">

  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-4">
        <h3>Kurs mavzulari</h3>
        @foreach($CoursItem as $item)
        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>{{ $loop->index+1 }}-dars</h5>
          <p><a href="{{ route('my_cours_show_item', ['cours_id' => $Cours['id'], 'item_id' => $item['id']]) }}">{{ $item['item_name'] }}</a></p>
        </div>
        @endforeach
      </div>
      <div class="col-lg-8">
        <div class="ratio ratio-16x9">
          <video controls controlsList="nodownload" disablePictureInPicture muted loop>
            <source src="{{ $Item['video_url'] }}" type="video/mp4">
          </video>
        </div>
        <h3>{{ $Item['item_name'] }}</h3>
        <p>
          {{ $Item['item_discription'] }}
        </p>
        @if(isset($Item['audio_url']) AND $Item['audio_url'] != 'NULL')
        <audio controls>
          <source src="{{ $Item['audio_url'] }}" type="audio/mpeg">
          Brauzeringiz audio playerni qo'llab-quvvatlamaydi.
        </audio> 
        @endif
      </div>
    </div>
  </div>
</section>

</main>



@endsection