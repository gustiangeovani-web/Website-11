<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaDidikController extends Controller
{
    public function index(Request $request)
    {
        $data = null;
        $error = '';

        if ($request->isMethod('post')) {
            $nisn = trim($request->input('nisn', ''));

            if ($nisn === '') {
                $error = 'Silakan masukkan NISN terlebih dahulu.';
            } elseif (!ctype_digit($nisn)) {
                $error = 'NISN harus berupa angka.';
            } else {
                $data = DB::table('siswa')->where('nisn', $nisn)->first();
                if (!$data) {
                    $error = 'Data dengan NISN <b>' . htmlspecialchars($nisn) . '</b> tidak ditemukan.';
                }
            }
        }

        return view('pesertadidik.index', compact('data', 'error'));
    }
}