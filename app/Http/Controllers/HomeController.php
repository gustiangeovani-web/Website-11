<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $dataSekolah = DB::table('data_sekolah')->get();
        $prestasi = DB::table('prestasi')->get();
        $berita = DB::table('berita')->orderBy('tanggal', 'desc')->take(4)->get();
        $today = date('Y-m-d');
        $agendaHariIni = DB::table('agenda')->where('tanggal', $today)->get();
        $agendaMendatang = DB::table('agenda')->where('tanggal', '>=', $today)->orderBy('tanggal')->take(5)->get();

        return view('welcome', compact(
            'dataSekolah', 'prestasi', 'berita', 'agendaHariIni', 'agendaMendatang'
        ));
    }
}