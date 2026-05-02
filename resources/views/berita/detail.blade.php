@extends('layouts.app')

@section('title', '{{ $berita->judul }} - SMA 11 Bekasi')

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
.newscontainer { max-width: 1300px; margin: 0 auto; padding: 20px; display: flex; flex-wrap: wrap; gap: 30px; }
.main-content { flex: 3; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); background: #fff; }
.sidebar { flex: 1; min-width: 300px; }
.breadcrumb { font-size: 13px; color: #777; margin: 15px 0; }
.breadcrumb a { text-decoration: none; color: #2c3e50; font-weight: 700; }
h1.news-title { font-family: 'Merriweather', serif; font-size: 36px; font-weight: 700; line-height: 1.2; margin-bottom: 15px; color: #222; }
.meta-info { border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 10px 0; margin-bottom: 25px; display: flex; justify-content: space-between; font-size: 14px; color: #777; }
.news-image-wrapper img { width: 100%; height: auto; border-radius: 4px; margin-bottom: 10px; }
.news-body { font-family: 'Poppins', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #333; }
.news-body img { max-width: 100%; height: auto !important; display: block; margin: 20px auto; border-radius: 8px; }
.sidebar-widget { background: #fff; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
.widget-title { border-left: 4px solid #2c3e50; padding-left: 10px; font-weight: 600; margin-bottom: 15px; text-transform: uppercase; }
.latest-item { display: flex; gap: 10px; margin-bottom: 15px; text-decoration: none; color: #222; }
.latest-item img { width: 80px; height: 60px; object-fit: cover; border-radius: 4px; }
.latest-item h4 { font-size: 14px; margin: 0; line-height: 1.3; }
@media screen and (max-width: 1000px) { .newscontainer { flex-direction: column; } h1.news-title { font-size: 28px; } }
</style>
@endsection

@section('content')
<div class="newscontainer">
  <main class="main-content">
    <a href="/berita" style="color:#2c3e50; text-decoration:none; font-weight:bold; display:inline-block; margin-bottom:10px;">
      <i class="fa fa-arrow-left"></i> Kembali ke Daftar Berita
    </a>
    <nav class="breadcrumb">
      <a href="/">Home</a> > <a href="/berita">Berita</a> > Detail
    </nav>

    <h1 class="news-title">{{ $berita->judul }}</h1>

    <div class="meta-info">
      <div>
        <span><strong>Oleh:</strong> Admin SMAN 11</span> |
        <span>{{ date('l, d F Y', strtotime($berita->tanggal)) }}</span>
      </div>
      <div>
        <i class="fab fa-facebook-f" style="margin-right:10px; cursor:pointer;"></i>
        <i class="fab fa-whatsapp" style="cursor:pointer;"></i>
      </div>
    </div>

    @if($berita->gambar)
    <div class="news-image-wrapper">
      <img src="{{ asset('admin/upload/'.$berita->gambar) }}" alt="{{ $berita->judul }}">
      <div class="image-caption">Foto: Dokumentasi SMAN 11 Bekasi</div>
    </div>
    @endif

    <article class="news-body">
      {!! $berita->isi !!}
    </article>
    <hr>
  </main>

  <aside class="sidebar">
    <div class="sidebar-widget">
      <h3 class="widget-title">Berita Lainnya</h3>
      @foreach($beritaLain as $row)
      <a href="/berita/{{ $row->id }}" class="latest-item">
        <img src="{{ asset('admin/upload/'.$row->gambar) }}" alt="">
        <div>
          <h4>{{ Str::limit($row->judul, 50) }}</h4>
          <small style="color:#999">{{ date('d M Y', strtotime($row->tanggal)) }}</small>
        </div>
      </a>
      @endforeach
    </div>
  </aside>
</div>
@endsection