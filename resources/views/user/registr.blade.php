@extends('layouts.user')

@section('content')

<main class="main">
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Ro'yhatdan o'tish</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
          <li><a href="{{ route('user_home') }}">Bosh sahifa</a></li>
          <li class="current">Ro'yhatdan o'tish</li>
          </ol>
        </div>
      </nav>
    </div>
    <section id="courses" class="courses section">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          </div> 

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item w-100">
              <form action="{{ route('register_post') }}" method="post">
                @csrf 
                <div class="course-content">
                  <h3 class="w-100 text-center">Ro'yxatdan o'tish</h3>
                  <p class="description mb-1">Ismingiz</p>
                  <input type="text" name="name" required class="form-control" value="{{ old('name') }}">
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  <p class="description mb-1 mt-3">Email</p>
                  <input type="email" name="email" required class="form-control" value="{{ old('email') }}">
                  @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                  <p class="description mb-1 mt-3">Telefon raqam</p>
                  <input type="text" name="phone" required class="form-control" value="{{ old('phone') }}">
                  @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                  <p class="description mb-1 mt-3">Parol</p>
                  <input type="password" name="password" required class="form-control">
                  @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                  <p class="description mb-1 mt-3">Parolni tasdiqlash</p>
                  <input type="password" name="password_confirmation" required class="form-control">
                  <button type="submit" class="btn btn-primary w-100 mt-3">Ro'yxatdan o'tish</button>
                  <div class="w-100 text-center mt-3">
                      <a href="{{ route('user_login') }}">Kirish</a>
                  </div>
                </div>
              </form>
            </div>
          </div> 

          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          </div> 

        </div>
      </div>
    </section>
  </main>



  @endsection