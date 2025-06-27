@extends('layouts.main')

@section('content')
    @include('templates.header')
    @include('page.navbar')

    {{-- Hero Section Main Page Start --}}
    <div class="hero">
        <div class="scroll-container" id="scrollContainer">
      <div class="section" id="slide-1">
        <div class="slide-1">
          <div class="text-1">
            <h1>NEW <span>CAHAYA MUSIK</span></h1>
          </div>
          <div class="text-2">
            <h1>TEMPATNYA ORANG SENANG</h1>
          </div>
          <div class="text-3">
            Dangdut Full | Sound System | Lighting | Genset | Alat Band |
            Wedding Organizer
          </div>
        </div>
      </div>
      <div class="section" id="slide-2">
        <div class="slide-2">
          <div class="model-pict"><img src="/img/Slide/model-2.png" alt="" /></div>
          <div class="text-1">
            <h1>SIAP MENGGOYANG PANGGUNG ORKEZ DANGDUT FULL & SEMI FULL</h1>
          </div>
          <div class="text-2">
            Bawa Kemeriahan Ke Acara Anda Dengan Musik Dangdut Berkualitas
          </div>
        </div>
      </div>
      <div class="section" id="slide-3">
        <div class="slide-3">
          <div class="text-1">
            <h1>Ayah Mansyur S</h1>
          </div>
            <div class="text-2">
              <h2>Nikmati Kemeriahan Dangdut Dengan Performa Spesial dari Sang
              Legenda
              </h2>
            </div>
        </div>
      </div>
      <div class="section" id="slide-4">
        <div class="slide-4">
          <div class="text-1">
            <h2>CAHAYA PRODUUCTION</h2>
            <br />
            <h3>Wujudkan Pernikahan Impian, Satu Kenangan Tak Terlupakan</h3>
            <br />
            <p>Wedding Organizer Termurah dan Terpercaya</p>
          </div>
        </div>
      </div>

    </div>
     <!-- button next and previous -->
    <button class="nav-button prev" id="prev-slide">&#10094;</button>
    <button class="nav-button next" id="next-slide">&#10095;</button>
   
    <!-- navigation start -->
    <div class="navigation">
      <a href="#slide-1" class="nav-dot" data-slide="1"></a>
      <a href="#slide-2" class="nav-dot" data-slide="2"></a>
      <a href="#slide-3" class="nav-dot" data-slide="3"></a>
      <a href="#slide-4" class="nav-dot" data-slide="4"></a>
    </div>
    </div>
    {{-- Hero Section Main Page End --}}
    


    @include('page.about')
    @include('page.menu')
    @include('page.pricelist')
    @include('page.gallery')
    @include('page.kontak')

    <!-- Modal Floating -->
    <div id="modalFloating" class="modal-overlay" style="display: none;">
        <div class="modal-content">
          <div class="calender-stat"></div>
          <span class="close-btn" onclick="closeModal()">&times;</span>
          <div id="calendar"></div>
        </div>
    </div>

    @include('templates.footer')
@endsection