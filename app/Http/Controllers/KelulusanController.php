<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class KelulusanController extends Controller
{
    public function index()
    {
        return view('kelulusan.index');
    }

    public function cetak(Request $request)
    {
        $nisn = trim($request->input('nisn'));

        if (!$nisn) {
            return back()->with('error', 'Masukkan NISN.');
        }

        $row = DB::table('kelulusan')->where('nisn', $nisn)->first();

        if (!$row) {
            return back()->with('error', 'NISN tidak ditemukan. Pastikan NISN benar.');
        }

        if ((int)$row->tahun_masuk !== 2022) {
            return back()->with('error', 'Maaf. Siswa/siswi belum lulus atau masih sekolah.');
        }

        $tanggal = $row->tanggal_kelulusan
            ? date('d F Y', strtotime($row->tanggal_kelulusan))
            : date('d F Y');

        $pdf = Pdf::loadView('kelulusan.pdf', compact('row', 'tanggal'));
        return $pdf->stream("SK_Kelulusan_{$nisn}.pdf");
    }
}