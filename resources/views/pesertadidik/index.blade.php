@extends('layouts.app')

@section('title', 'Data Peserta Didik - SMA 11 Bekasi')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/aplikasi.css') }}">
@endsection

@section('content')
  <div class="aplikasi-siswa">
    <h1>Cek Data Peserta Didik</h1>
    <p>Masukkan NISN anda di bawah ini untuk melihat data lengkap siswa.</p>

    <div class="apk-container">
      <form class="simple-form" method="POST" action="/peserta-didik">
        @csrf
        <input class="text-input" type="text" name="nisn" placeholder="Masukkan NISN..." value="{{ old('nisn') }}" required>
        <button class="enter-btn" type="submit">Cari</button>
      </form>
    </div>
  </div>

  @if($error)
  <div class="error">{!! $error !!}</div>
  @endif

  @if($data)
  <div class="result">
    <div class="result-card">
      <h2>Data Siswa Ditemukan:</h2>
      <table>
        <tr><td>Nama Lengkap</td><td>{{ $data->nama_lengkap }}</td></tr>
        <tr><td>NISN</td><td>{{ $data->nisn }}</td></tr>
        <tr><td>Tempat Lahir</td><td>{{ $data->tempat_lahir }}</td></tr>
        <tr><td>Tanggal Lahir</td><td>{{ $data->tanggal_lahir }}</td></tr>
        <tr><td>Alamat</td><td>{{ $data->alamat ?? '-' }}</td></tr>
        <tr><td>Tahun Masuk</td><td>{{ $data->tahun_masuk ?? '-' }}</td></tr>
        <tr><td>Kelas/Angkatan</td><td>{{ $data->kelas_angkatan ?? '-' }}</td></tr>
      </table>
    </div>
  </div>
  @endif
@endsection