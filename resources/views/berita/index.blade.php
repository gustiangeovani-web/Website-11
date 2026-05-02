@extends('layouts.app')

@section('title', 'Berita - SMA 11 Bekasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/berita.css') }}">
@endsection

@section('content')
  <section class="hero">
    <h1>Berita SMAN 11 Bekasi</h1>
    <p>Ikuti kabar terkini dan kegiatan menarik di lingkungan sekolah kami</p>
  </section>

  <section class="news-section">
    <div class="search-section">
      <form method="get" action="/berita" class="search-form">
        <input type="text" name="q" class="search-input" placeholder="Cari berita..." value="{{ $keyword ?? '' }}">
        <button type="submit" class="search-button">
          <i class="fa fa-search"></i> Cari
        </button>
      </form>
    </div>

    <div class="berita-container">
      @forelse($berita as $b)
      <article class="news-card">
        <div class="news-img-wrapper">
          <img src="{{ $b->gambar ? asset('admin/upload/'.$b->gambar) : asset('assets/sma11home.png') }}" class="news-img">
        </div>
        <div class="news-content">
          <h3 class="news-title">
            <a href="/berita/{{ $b->id }}">{{ $b->judul }}</a>
          </h3>
          <p class="news-excerpt">{{ Str::limit(strip_tags($b->isi), 100) }}...</p>
          <div class="news-footer">
            <small><i class="fa fa-calendar"></i> {{ date('d M Y', strtotime($b->tanggal)) }}</small>
            <a href="/berita/{{ $b->id }}" class="read-more">Baca Selengkapnya →</a>
          </div>
        </div>
      </article>
      @empty
      <p style="text-align:center;">Berita tidak ditemukan.</p>
      @endforelse
    </div>

    <div class="pagination-container">
      {{ $berita->appends(['q' => $keyword ?? ''])->links() }}
    </div>
  </section>
@endsection

@section('scripts')
<script src="{{ asset('js/berita.js') }}"></script>
@endsection