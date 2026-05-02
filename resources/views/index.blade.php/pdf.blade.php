<!DOCTYPE html>
<html>
<head>
<title>Kelulusan - SMA 11 Bekasi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/2.css') }}">
<link rel="stylesheet" href="{{ asset('css/aplikasi.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
</head>
<body>
<div id="body">

  <div class="aplikasi-siswa">
    <h1>Pengumuman Kelulusan Online</h1>
    <p>Masukkan NISN Anda untuk melihat surat kelulusan:</p>

    @if(session('error'))
    <div style="color:red; margin-bottom:10px;">{{ session('error') }}</div>
    @endif

    <div class="apk-container">
      <form method="POST" action="/kelulusan/cetak">
        @csrf
        <input type="text" name="nisn" class="text-input" placeholder="Masukkan NISN anda" required>
        <button type="submit" class="enter-btn">Lihat & Cetak PDF</button>
      </form>
    </div>
  </div>

</div>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>