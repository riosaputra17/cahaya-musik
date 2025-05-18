@extends('layouts.main')

@section('content')
    @include('templates.header')
    @include('page.navbar')

    {{-- Hero Section Main Page Start --}}
    <section class="hero">
        <div class="slides">
            <span id="slide-1"></span>
            <span id="slide-2"></span>
            <span id="slide-3"></span>
            <span id="slide-4"></span>

            <img src="{{ asset('img/Slide-1.png') }}" alt="">
            <img src="{{ asset('img/Slide-2.png') }}" alt="">
            <img src="{{ asset('img/Slide-3.png') }}" alt="">
            <img src="{{ asset('img/Slide-4.png') }}" alt="">
        </div>

        <!-- Previous and Next buttons -->
        <button class="nav-button prev" id="prev-slide">&#10094;</button>
        <button class="nav-button next" id="next-slide">&#10095;</button>

        <!-- navigation start -->
        <div class="navigation">
            <a href="#slide-1" class="nav-dot" data-slide="1"></a>
            <a href="#slide-2" class="nav-dot" data-slide="2"></a>
            <a href="#slide-3" class="nav-dot" data-slide="3"></a>
            <a href="#slide-4" class="nav-dot" data-slide="4"></a>
        </div>
        <!-- navigation end -->
    </section>
    {{-- Hero Section Main Page End --}}

    @include('page.about')
    @include('page.menu')
    @include('page.pricelist')
    @include('page.gallery')
    @include('page.kontak')

    <!-- Modal Floating -->
    <div id="modalFloating" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div id="calendar"></div>
        </div>
    </div>

    @include('templates.footer')
@endsection