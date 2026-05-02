<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('q', '');
        $berita = DB::table('berita')
            ->when($keyword, function($query) use ($keyword) {
                $query->where('judul', 'like', "%$keyword%")
                      ->orWhere('isi', 'like', "%$keyword%");
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(8);

        return view('berita.index', compact('berita', 'keyword'));
    }

    public function detail($id)
    {
        $berita = DB::table('berita')->where('id', $id)->first();
        $beritaLain = DB::table('berita')->where('id', '!=', $id)->orderBy('tanggal', 'desc')->take(5)->get();
        return view('berita.detail', compact('berita', 'beritaLain'));
    }
}