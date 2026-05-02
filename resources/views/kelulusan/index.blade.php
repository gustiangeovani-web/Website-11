@extends('layouts.app')

@section('title', 'Kelulusan - SMA 11 Bekasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/aplikasi.css') }}">
@endsection

@section('content')
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
@endsection