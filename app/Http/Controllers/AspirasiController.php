<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AspirasiController extends Controller
{
    public function index()
    {
        return view('aspirasi.index');
    }

    public function simpan(Request $request)
    {
        DB::table('aspirasi')->insert([
            'nama' => $request->input('nama'),
            'role' => $request->input('role'),
            'isi'  => $request->input('isi'),
        ]);

        return back()->with('success', 'Aspirasi berhasil dikirim!');
    }
}