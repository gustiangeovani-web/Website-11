<!DOCTYPE html>
<html>
<head>
<title>@yield('title', 'SMA 11 Bekasi')</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="{{ asset('assets/logosebelas.png') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/2.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
@yield('styles')
</head>
<body>

<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div class="sidePanelink">
    <p>Menu</p>
    <div class="sub-link">
      <a href="/">Home</a>
      <a href="/profil">Profil</a>
      <a href="/berita">Berita</a>
      <a href="/kesiswaan">Kesiswaan</a>
    </div>
    <p>Aplikasi</p>
    <div class="sub-link">
      <a href="/kelulusan">SK Kelulusan</a>
      <a href="/peserta-didik">Data Peserta Didik</a>
      <a href="/aspirasi">Kotak Aspirasi Digital</a>
    </div>
    <a href="/admin/login.php" class="btn btn-outline-primary">Login Admin</a>
  </div>
</div>

<div id="body">
  <header class="topbar" id="topbar">
    <div class="container">
      <div class="brand">
        <img class="logo" src="{{ asset('assets/logosebelas.png') }}" alt="SMAN 11 Bekasi Logo">
        <a href="/" class="brand-name">SMAN 11 <span>Bekasi</span></a>
      </div>
      <nav class="nav-links">
        <div class="menu-items" id="menuItems">
          <a href="/profil" class="nav-item">Profil</a>
          <a href="/berita" class="nav-item">Berita</a>
          <a href="/kesiswaan" class="nav-item">Kesiswaan</a>
          <a href="/aspirasi" class="nav-item">Aspirasi</a>
        </div>
        <button class="openbtn" onclick="openNav()"><span>☰</span></button>
      </nav>
    </div>
  </header>

  @yield('content')

</div>

@yield('footer')

<script>
function openNav() {
  if (window.innerWidth < 600) {
    document.getElementById("mySidepanel").style.width = "100%";
  } else {
    document.getElementById("mySidepanel").style.width = "300px";
  }
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

window.addEventListener('scroll', function() {
  const topbar = document.getElementById("topbar");
  if (window.scrollY > 50) {
    topbar.classList.add("scrolled");
  } else {
    topbar.classList.remove("scrolled");
  }
});
</script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>