@extends('layouts.user2')

@section('content')
<main class="main">

<!-- Page Title -->
<div class="page-title" data-aos="fade">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Kurs uchun to'lov</h1>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('user_home') }}">Bosh sahifa</a></li>
        <li><a href="{{ route('user_cours') }}">Kurslar</a></li>
        <li class="current">To'lov</li>
      </ol>
    </div>
  </nav>
</div>

<section id="courses-course-details" class="courses-course-details section">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 text-center">
        <div class="course-info">
          <h3>ATKO Koreys Tili</h3>
          <h6>{{ $Cours->cours_name }}</h6>
          <p class="price">To'lov summasi: <strong>5000 so'm</strong></p>
          <h6 class="select-payment">To'lov turini tanlang</h6>
            <input type="hidden" name="cours_id" value="">
            <input type="hidden" name="price" value="">
            <div class="payment-options">
              <form method="POST" action="https://test.paycom.uz" class="py-5">
                <input type="hidden" name="merchant" value="{Merchant ID}"/>
                <input type="hidden" name="amount" value="{{ $Order->price*100 }}"/>
                <input type="hidden" name="account[order_id]" value="{{ $Order->user_id }"/>
                <input type="hidden" name="lang" value="uz"/>
                <input type="hidden" name="callback" value="https://atko.uz"/>
                <input type="hidden" name="callback_timeout" value="15"/>
                <input type="hidden" name="description" value="{{ $Cours->cours_name }} kursi uchun to'lov"/>
                <button type="submit">
                  <img src="https://cdn.payme.uz/logo/payme_color.png?target=_blank" 
                    alt="Payme" class="payment-icon p-2" style="width:150px;">
                </button>
              </form>
        </div>
      </div>
    </div>
  </div>
</section>


</main>


@endsection