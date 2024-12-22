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
            <source src="{{ isset($CoursItem[0]['video_url']) ? $CoursItem[0]['video_url'] : null }}"
              type="video/mp4">
          </video>
        </div>
        <h3>
          {{ isset($CoursItem[0]['video_url']) ? $CoursItem[0]['item_name'] : null }}
        </h3>
        <p>
          {{ isset($CoursItem[0]['video_url']) ? $CoursItem[0]['item_discription'] : null }}
        </p>
        @if(isset($CoursItem[0]['audio_url']) AND $CoursItem[0]['audio_url'] != 'NULL')
        <audio controls>
          <source src="{{ $CoursItem[0]['audio_url'] }}" type="audio/mpeg">
          Brauzeringiz audio playerni qo'llab-quvvatlamaydi.
        </audio> 
        @endif
      </div>
    </div>
  </div>
</section>

</main>



@endsection