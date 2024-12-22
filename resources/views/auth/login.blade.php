@extends('layouts.user')

@section('content')

<main class="main">
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Kirish</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('user_home') }}">Bosh sahifa</a></li>
            <li class="current">Kirish</li>
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
              <form action="{{ route('login') }}" method="post">
                @csrf 
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="course-content">
                  <h3 class="w-100 text-center">Kirish</h3>
                  <p class="description mb-1">Email</p>
                  <input type="email" name="email" required class="form-control">
                  @error('email') <span class="text-danger">Login yoki parol xato</span> @enderror
                  <p class="description mb-1 mt-3">Parol</p>
                  <input type="text" name="password" required class="form-control">
                  @error('password') <span class="text-danger">Login yoki parol xato</span> @enderror
                  <button type="submit" class="btn btn-primary w-100 mt-3">Kirish</button>
                  <div class="row mt-3">
                    <div class="col-6">
                      <a href="{{ route('user_registr') }}">Ro'yhatdan o'tish</a>
                    </div>
                    <div class="col-6" style="text-align: right;">
                      <!-- <a href="{{ route('confirm_email') }}">Parolni tiklash</a> -->
                    </div>
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