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
            <li><a href="index.html">Bosh sahifa</a></li>
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
              <form action="" method="post">
                <div class="course-content">
                  <h3 class="w-100 text-center">Emailni kiriting</h3>
                  <p class="description mb-1">Email</p>
                  <input type="email" required class="form-control">
                  <button type="submit" class="btn btn-primary w-100 mt-3">Tasdiqlash</button>
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