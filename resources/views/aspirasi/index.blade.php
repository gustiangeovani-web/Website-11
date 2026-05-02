@extends('layouts.app')

@section('title', 'Kotak Aspirasi - SMA 11 Bekasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/aplikasi.css') }}">
@endsection

@section('content')
  <div class="aspirasi-container">
    <div class="logo-aspirasi">
      <h1 class="blue">Kotak</h1>
      <h1 class="orange">Aspirasi Digital</h1>
    </div>

    @if(session('success'))
    <div style="color:green; text-align:center; margin-bottom:15px; font-weight:bold;">
      {{ session('success') }}
    </div>
    @endif

    <div class="form-aspirasi">
      <div class="container">
        <form method="POST" action="/aspirasi">
          @csrf
          <label for="fname">Nama Lengkap</label>
          <input type="text" id="fname" name="nama" placeholder="Your name..">

          <label for="role">Sebagai</label>
          <select id="role" name="role">
            <option value="Guru">Guru</option>
            <option value="Siswa">Siswa</option>
            <option value="OrangTua">Orang Tua</option>
            <option value="Masyarakat">Masyarakat</option>
          </select>

          <label for="subject">Ide, Kritik, dan Saran</label>
          <textarea id="subject" name="isi" placeholder="Tulis..." style="height:150px"></textarea>

          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
@endsection