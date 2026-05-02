@extends('layouts.app')

@section('title', 'SMA 11 Bekasi')

@section('content')
  <section class="hero-school">
    <div class="hero-overlay"></div>
    <div class="container hero-container">
      <div class="hero-content">
        <h1 class="hero-title">SMAN 11 <br><span>Kota Bekasi</span></h1>
        <p class="hero-description">Mewujudkan generasi emas yang cerdas dan berkarakter melalui pendidikan yang inovatif.</p>
        <a href="https://www.instagram.com/sman11bekasi/" class="btn-primary">Kunjungi Kami</a>
      </div>
    </div>
    <div class="stats-wrapper">
      <div class="stats-grid">
        @forelse($dataSekolah as $row)
        <div class="stat-card">
          <div class="stat-icon">{!! $row->icon !!}</div>
          <div class="stat-data">
            <h3>{{ number_format((float)preg_replace('/[^0-9]/', '', $row->angka), 0, ',', '.') }}</h3>
            <p>{{ $row->nama_lengkap }}</p>
          </div>
        </div>
        @empty
        <p>Data statistik belum tersedia.</p>
        @endforelse
      </div>
    </div>
  </section>

  <div class="section" data-aos="fade-up">
    <div class="section-container">
      <div class="welcome-img">
        <img src="{{ asset('assets/Lapangan Dalam.jpg') }}">
      </div>
    </div>
    <div class="section-container">
      <div class="section-par">
        <div class="section-header"><h1>Selamat Datang!</h1></div>
        <p>Selamat datang di situs web SMAN 11 Bekasi! Jelajahi seputar informasi tentang kami.</p>
        <div class="buttons"><a href="#" class="btn-primary">Jelajah</a></div>
      </div>
    </div>
  </div>

  <section class="whyMust" id="whyMust" data-aos="fade-up">
    <div class="container">
      <div class="section-header-center">
        <h1>Kenapa Harus <span class="orange-text">SMAN 11 Bekasi?</span></h1>
        <p>Membentuk generasi unggul dengan dukungan lingkungan dan fasilitas terbaik.</p>
      </div>
      <div class="whyMust-wrapper">
        <div class="whyMust-card">
          <div class="whyMust-icon"><i class="fi fi-rr-tree"></i></div>
          <div class="whyMust-text"><h4>Lingkungan Asri</h4><p>Suasana sekolah yang hijau dan tenang.</p></div>
        </div>
        <div class="whyMust-card">
          <div class="whyMust-icon"><i class="fi fi-rr-shield"></i></div>
          <div class="whyMust-text"><h4>Aman dan Nyaman</h4><p>Keamanan 24 jam dan budaya sekolah yang inklusif.</p></div>
        </div>
        <div class="whyMust-card">
          <div class="whyMust-icon"><i class="fi fi-rr-school"></i></div>
          <div class="whyMust-text"><h4>Fasilitas Lengkap</h4><p>Laboratorium modern hingga sarana olahraga.</p></div>
        </div>
      </div>
    </div>
  </section>

  <div class="section reversed" data-aos="fade-up">
    <div class="section-container">
      <div class="section-par">
        <div class="section-header"><h1>Fasilitas</h1></div>
        <p>Sekolah kami menyediakan beragam fasilitas untuk mendukung kegiatan mengajar.</p>
        <div class="buttons"><a href="#" class="btn-primary">Jelajah</a></div>
      </div>
    </div>
    <div class="section-container">
      <div class="fasilitas-section">
        <div class="fasilitas-wrapper">
          <div class="foto-fasilitas side">
            <img src="{{ asset('assets/Masjid.jpg') }}" alt="Masjid">
            <div class="fasilitas-overlay"><p>Masjid Sekolah</p></div>
          </div>
          <div class="foto-fasilitas tengah">
            <img src="{{ asset('assets/Lapangan Dalam.jpg') }}" alt="Lapangan">
            <div class="fasilitas-overlay"><p>Lapangan Utama</p></div>
          </div>
          <div class="foto-fasilitas side">
            <img src="{{ asset('assets/Ruang podcast.jpg') }}" alt="Ruang Podcast">
            <div class="fasilitas-overlay"><p>Studio Podcast</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="prestasi" id="prestasi" data-aos="fade-up">
    <div class="section-header-center">
      <h1>Prestasi <span class="orange-text">SMAN 11 Bekasi</span></h1>
      <p class="blue-par">Setiap tahunnya siswa/siswi kami menorehkan bermacam prestasi prestisius.</p>
    </div>
    <div class="prestasi-container">
      @forelse($prestasi as $p)
      <div class="listPrestasi">
        <div class="jenisPrestasi"><h2>{{ $p->jumlah }}</h2></div>
        <p>{{ $p->kategori }}</p>
      </div>
      @empty
      <p>Belum ada data prestasi.</p>
      @endforelse
    </div>
  </div>

  <div class="berita" id="berita" data-aos="fade-up">
    <div class="section-header"><h1>Berita Terbaru</h1></div>
    <div class="berita-container">
      @forelse($berita as $b)
      <article class="news-card">
        <div class="news-img-wrapper">
          <img src="{{ $b->gambar ? asset('admin/upload/'.$b->gambar) : asset('assets/sma11home.png') }}" class="news-img">
        </div>
        <div class="news-content">
          @if($b->kategori)
          <span class="news-category">{{ $b->kategori }}</span>
          @endif
          <h3 class="news-title"><a href="/berita/{{ $b->id }}">{{ $b->judul }}</a></h3>
          <p class="news-excerpt">{{ Str::limit(strip_tags($b->isi), 100) }}</p>
          <div class="news-footer">
            <small><i class="fa fa-calendar-o"></i> {{ date('d M Y', strtotime($b->tanggal)) }}</small>
            <a href="/berita/{{ $b->id }}">Baca Selengkapnya →</a>
          </div>
        </div>
      </article>
      @empty
      <p style="text-align:center;">Belum ada berita terbaru.</p>
      @endforelse
    </div>
    <div style="text-align:center; margin-top:20px;">
      <a href="/berita" class="btn-view-all">Lihat Semua Berita →</a>
    </div>
  </div>

  <div class="agenda-container" id="agenda" data-aos="fade-up">
    <div class="section-header"><h1>Agenda Sekolah</h1></div>
    @if($agendaHariIni->count() > 0)
    <div class="banner-today">
      🔔 Hari ini: <span>{{ $agendaHariIni->pluck('judul')->implode(' · ') }}</span>
    </div>
    @endif
    <div class="list-agenda">
      @forelse($agendaMendatang as $a)
      <div class="kartuAgenda">
        <div class="fotoAgenda"><i class="fi fi-rr-calendar"></i></div>
        <div class="judulAgenda">
          <p><strong>{{ $a->judul }}</strong></p>
          <span>{{ date('d M Y', strtotime($a->tanggal)) }}</span>
        </div>
      </div>
      @empty
      <p style="text-align:center;">Belum ada agenda mendatang.</p>
      @endforelse
    </div>
  </div>
@endsection