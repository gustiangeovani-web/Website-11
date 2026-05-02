@extends('layouts.app')

@section('title', 'Profil - SMA 11 Bekasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profil.css') }}">
@endsection

@section('content')
  <div class="profileHero">
    <div class="profileHero-container">
      <div class="profileHero-tag"><p>Profil Sekolah</p></div>
      <h1>SMAN 11 KOTA BEKASI</h1>
      <p class="profileHero-description">Membangun Generasi Unggul dengan Dukungan Lingkungan dan Fasilitas Terbaik</p>
    </div>
  </div>

  <div class="profileVid" data-aos="fade-up">
    <iframe src="https://www.youtube-nocookie.com/embed/DQI-uMOmkVo?controls=0"
      title="YouTube video player" frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen></iframe>
  </div>

  <section id="visi-misi" class="profile-section">
    <div class="split-wrapper">
      <div class="side-dark">
        <div class="content-box left-align" data-aos="fade-right">
          <span class="top-label">Visi & Misi Sekolah</span>
          <h1 class="main-heading">Visi<br><span class="accent-color">Sekolah</span></h1>
          <div class="visiMisi-card"><div class="visiMisi-info"><h4>Unggul</h4><p>Memiliki kualitas dan kemampuan dalam aspek akademik maupun non akademik serta karakter.</p></div></div>
          <div class="visiMisi-card"><div class="visiMisi-info"><h4>Religius</h4><p>Memiliki kesadaran dan komitmen dalam menjalankan ajaran agama secara konsisten.</p></div></div>
          <div class="visiMisi-card"><div class="visiMisi-info"><h4>Kreatif</h4><p>Mampu berfikir, bertindak, dan berkarya secara Inovatif dan bermanfaat.</p></div></div>
          <div class="visiMisi-card"><div class="visiMisi-info"><h4>Bernalar Kritis</h4><p>Memiliki kemampuan untuk berpikir secara logis dalam memahami dan memecahkan masalah.</p></div></div>
          <div class="visiMisi-card"><div class="visiMisi-info"><h4>IPTEK</h4><p>Memiliki pengetahuan dan keterampilan dalam mengembangkan ilmu pengetahuan dan teknologi.</p></div></div>
          <div class="visiMisi-card"><div class="visiMisi-info"><h4>Berbudaya Lingkungan</h4><p>Menjadikan kepedulian terhadap alam sebagai bagian dari gaya hidup sehari-hari.</p></div></div>
        </div>
      </div>
      <div class="side-light">
        <div class="content-box" data-aos="fade-left">
          <h1 class="main-heading">Misi<br><span class="accent-color">Sekolah</span></h1>
          <div class="misi-cards-list">
            @foreach([
              ['Karakter Panca Waluya', 'Mengembangkan karakter murid melalui 5 Pilar (Cageur, Bageur, Bener, Pinter, Singer).'],
              ['7 Kebiasaan Hebat', 'Menerapkan pola hidup sehat, disiplin ibadah, dan gemar belajar setiap hari.'],
              ['Budaya Religius', 'Menumbuhkan budaya religius dan budi pekerti melalui pembiasaan tertib ibadah.'],
              ['Mutu Pembelajaran', 'Mendorong sikap kritis, kreatif, komunikatif, dan kolaboratif.'],
              ['Mutu Pembelajaran', 'Meningkatkan mutu pembelajaran dan kompetensi murid agar unggul dalam akademik.'],
              ['Mutu Pembelajaran', 'Mengembangkan rasa kepedulian, nasionalisme, dan cinta budaya lokal.'],
              ['Mutu Pembelajaran', 'Membudayakan literasi dan life skill untuk membentuk peserta didik yang mandiri.'],
              ['Mutu Pembelajaran', 'Meningkatkan disiplin, kebersihan, dan karakter pembelajar sepanjang hayat.'],
              ['Mutu Pembelajaran', 'Meningkatkan kompetensi guru dan tenaga kependidikan agar profesional.'],
              ['Mutu Pembelajaran', 'Meningkatkan mutu pelayanan sekolah yang responsif terhadap kebutuhan seluruh pihak.'],
            ] as $i => $misi)
            <div class="visiMisi-card bordered">
              <div class="visiMisi-icon">{{ $i + 1 }}</div>
              <div class="visiMisi-info">
                <h4>{{ $misi[0] }}</h4>
                <p>{{ $misi[1] }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="section-header"><h1>Video</h1></div>
  <div class="videos" id="youtube-videos"></div>
@endsection

@section('scripts')
<script>
const API_KEY = "AIzaSyBtvS4YqCn1AgYoaaODBFU3gS50kQbxdoE";
const CHANNEL_ID = "UCK2yyw_NQ5BpUGUybVpRYQQ";
const videoContainer = document.getElementById("youtube-videos");
async function loadVideos() {
  try {
    const response = await fetch(`https://www.googleapis.com/youtube/v3/search?key=${API_KEY}&channelId=${CHANNEL_ID}&part=snippet,id&order=date&maxResults=4`);
    const data = await response.json();
    videoContainer.innerHTML = data.items.map(item => {
      if (item.id.kind === "youtube#video") {
        return `<div class="video-item"><iframe src="https://www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe><p>${item.snippet.title}</p></div>`;
      }
    }).join("");
  } catch (error) {
    videoContainer.innerHTML = "<p>Gagal memuat video YouTube.</p>";
  }
}
loadVideos();
</script>
<script src="{{ asset('js/profil.js') }}"></script>
@endsection