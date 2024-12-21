@extends('layouts.user')

@section('content')
<main class="main">
    <section id="hero" class="hero section dark-background">
      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">
      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">ATKO koreys tili markazi</h2>
        <p data-aos="fade-up" data-aos-delay="200">
          Yurtimizning eng yetakchi o‘qituvchilari tomonidan tayyorlangan videodarslarni tomosha qilib,<br>
          siz nafaqat ishonchli o‘qituvchi qidirishdan holi bo‘lasiz, balki noyob metodika orqali darslarni qiziq va <br>
          oson yo‘llar bilan o‘zlashtirishingiz mumkin.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="courses.html" class="btn-get-started">Ro'yhatdan o'tish</a>
        </div>
      </div>
    </section>

    <div class="container my-5">
      <div class="ratio ratio-16x9">
        <video controls controlsList="nodownload" disablePictureInPicture muted loop>
          <source src="https://videos.pexels.com/video-files/11526886/11526886-uhd_2560_1440_25fps.mp4" type="video/mp4">
        </video>
      </div>
    </div>

    <section id="why-us" class="section why-us">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-xl-3">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Koreys tili alifbosi kursi!</h4>
                  <p>Koreys alifbosi, Koreys tilida erkin o'qish, Koreys tilida yozish, Sodda so'zlarni eshitib tushunish, Sodda gaplar tuzish, Bo'g'inlarni to'g'ri o'qish va Koreys tilida sanash o'rganiladi.</p>
                </div>
              </div>
              <div class="col-xl-3" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Koreya ish imtixoni!</h4>
                  <p>Koreya tomonidan ishlab chiqilgan maxsus kitoblar tahlili, Ish imtixoniga kerek bo'ladigan maxsus lug'atlar Imtixonda savollarda keladigan madaniyat ma'lumotlari, Ish imtixoni ehtimoliy testlar, ularni yechimi va tahlili.</p>
                </div>
              </div>
              <div class="col-xl-3" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>ATKO Koreys tili markazi!</h4>
                  <p>ATKO koreys tili markazi o`quv qo'llanmalari gramatika qismi video qo'llanma tarzida yozib chiqilgan. Unda Gramatik tushuntirishlar, Madaniyat ma`lumotlari, Yangi so`zlar o'rin olgan.</p>
                </div>
              </div>
              <div class="col-xl-3" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Topik II</h4>
                  <p>O`rta va yuqori daraja gramatikasi va ularga sharhlar O`rta va yuqori daraja so`zlar, antonim, sinonim, omonim so`zlar O`rta va yuqori daraja testlari va u testlar tahlili o`rin olgan.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="courses" class="courses section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Online kurslar</h2>
        <p>Eng mashhur kurslar</p>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Kurs narxi</p>
                  <p class="price">124 000 so'm</p>
                </div>
                <h3 class="w-100 text-center"><a href="course-details.html">Website Design</a></h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Kurs narxi</p>
                  <p class="price">124 000 so'm</p>
                </div>
                <h3 class="w-100 text-center"><a href="course-details.html">Website Design</a></h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Kurs narxi</p>
                  <p class="price">124 000 so'm</p>
                </div>
                <h3 class="w-100 text-center"><a href="course-details.html">Website Design</a></h3>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </main>
  @endsection