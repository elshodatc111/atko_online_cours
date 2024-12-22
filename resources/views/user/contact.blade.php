@extends('layouts.user')

@section('content')
<main class="main">
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Bog'lanish</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('user_home') }}">Bosh sahifa</a></li>
            <li class="current">Bog'lanish</li>
          </ol>
        </div>
      </nav>
    </div>
    
    <section id="contact" class="contact section"><br><br><br><br>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Manzilimiz</h3>
                <p>{{ $Contact['addres'] }}</p>
              </div>
            </div>
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Telefon raqam</h3>
                <p>{{ $Contact['phone'] }}</p>
              </div>
            </div>
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email manzilimiz</h3>
                <p>{{ $Contact['email'] }}</p>
              </div>
            </div>
          </div>

            <div class="col-lg-8">
                <form action="{{ route('user_contact_add') }}" method="post">
                    @csrf 
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Ismingiz">
                        </div>
                        <div class="col-md-6 ">
                            <input type="text" class="form-control" name="phone" placeholder="Telefon raqamingiz">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="discriotion" rows="6" placeholder="Message"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-danger">Xabar yuborish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </main>

@endsection