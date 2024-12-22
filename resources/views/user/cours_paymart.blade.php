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
        <li><a href="{{ route('user_cours') }}">Kurs</a></li>
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
          <p class="price">To'lov summasi: <strong>5000 so'm</strong></p>
          <h6 class="select-payment">To'lov turini tanlang</h6>
          <form action="" method="post" id="payment-form">
            @csrf 
            <input type="hidden" name="cours_id" value="">
            <input type="hidden" name="price" value="">
            <div class="payment-options">
              <label class="payment-option">
                <input type="radio" name="payment_method" value="payme" class="payment-radio">
                <img src="https://sun6-22.userapi.com/s/v1/if1/m-RU96PmaZgDTMsEL_ZpMlGDguBcXOLZD_WbymC7BPjXa9h4cttf7r0T-ewaP8aiYBNuWIHW.jpg?size=991x991&quality=96&crop=16,16,991,991&ava=1" alt="Payme" class="payment-icon">
                <p>Payme</p>
              </label>
              <label class="payment-option">
                <input type="radio" name="payment_method" value="click" class="payment-radio">
                <img src="https://itsm.uz/uploads/content/kSBRrRNue4JbUSrJrw55lNBfeZJ9C4NH.jpg" alt="Click" class="payment-icon">
                <p>Click</p>
              </label>
            </div>
            <button type="submit" class="btn btn-primary w-50 mt-4">To'lovga o'tish</button>
          </form>
          <script>
            document.getElementById('payment-form').addEventListener('submit', function(event) {
              const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
              if (!paymentMethod) {
                event.preventDefault();
                alert('Iltimos, to\'lov turini tanlang!');
              }
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .courses-course-details {
    background-color: #f9f9f9;
    padding: 40px 0;
  }
  .course-info h3 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 15px;
  }
  .course-info .price {
    font-size: 1.25rem;
    color: #2ecc71;
    margin-bottom: 20px;
  }
  .course-info .select-payment {
    font-size: 1.1rem;
    margin-bottom: 20px;
    color: #555;
  }
  .payment-options {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
  }
  .payment-option {
    text-align: center;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 8px;
    transition: all 0.3s ease;
    width: 120px;
    cursor: pointer;
  }
  .payment-option:hover {
    border-color: #2ecc71;
    box-shadow: 0 0 10px rgba(46, 204, 113, 0.3);
  }
  .payment-option input[type="radio"] {
    display: none;
  }
  .payment-option input[type="radio"]:checked + .payment-icon {
    border: 2px solid #2ecc71;
    padding: 5px;
  }
  .payment-option img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-bottom: 10px;
    transition: border 0.3s ease;
  }
  .payment-option p {
    font-size: 1rem;
    color: #333;
    margin: 0;
  }
  .btn-primary {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  .btn-primary:hover {
    background-color: #27ae60;
  }
</style>


</main>


@endsection