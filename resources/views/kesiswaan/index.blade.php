@extends('layouts.app')

@section('title', 'Kesiswaan - SMA 11 Bekasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/kesiswaan.css') }}">
@endsection

@section('content')
  <section class="hero-container">
    <div class="hero-content" data-aos="fade-right">
      <span class="hero-subtitle">Selamat Datang di Portal Kesiswaan</span>
      <h1 class="hero-title">Wujudkan Prestasi & Kreativitas di <span>SMA 11 Bekasi</span></h1>
      <p class="hero-description">Temukan berbagai kegiatan ekstrakurikuler, agenda sekolah, dan sumber belajar terbaik.</p>
      <div class="hero-buttons">
        <a href="#ekskul-scroll-element" class="btn-hero-primary">Jelajahi Ekskul</a>
        <a href="#agenda-section" class="btn-hero-secondary">Lihat Agenda</a>
      </div>
    </div>
    <div class="hero-image" data-aos="zoom-in" data-aos-delay="200">
      <img src="{{ asset('assets/Masjid.JPG') }}" alt="SMA 11 Bekasi">
      <div class="hero-shape"></div>
    </div>
  </section>

  <section class="ekskul-section">
    <div class="section-header">
      <h1>Ekstrakurikuler</h1>
    </div>
    <div class="carousel-wrapper" style="position: relative;">
      <button class="nav-btn prev" onclick="scrollCarousel(-1)">&#10094;</button>
      <button class="nav-btn next" onclick="scrollCarousel(1)">&#10095;</button>
      <div class="ekskul-container" id="ekskul-scroll-element">
        @forelse($ekskul as $data)
        <div class="ekskul-card" data-aos="fade-up">
          <div class="card-image-wrapper">
            <img src="{{ asset('admin/assets/'.$data->foto) }}" alt="{{ $data->nama }}">
            @if($data->badge)
            <div class="card-badge">{{ $data->badge }}</div>
            @endif
          </div>
          <div class="card-body">
            <h3>{{ $data->nama }}</h3>
            <p>{{ $data->deskripsi }}</p>
            <div class="card-footer">
              <a href="{{ $data->link_gabung }}" class="btn-primary" target="_blank">Gabung Sekarang</a>
              <span class="member-count">{{ $data->jumlah_anggota }} Anggota</span>
            </div>
          </div>
        </div>
        @empty
        <p>Belum ada data ekstrakurikuler.</p>
        @endforelse
      </div>
    </div>
  </section>
@endsection

@section('scripts')
<script src="{{ asset('js/profil.js') }}"></script>
<script>AOS.init({ duration: 1000, once: true });</script>
@endsection