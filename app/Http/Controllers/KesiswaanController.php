<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KesiswaanController extends Controller
{
    public function index()
    {
        $ekskul = DB::table('ekskul')->orderBy('id', 'desc')->get();
        return view('kesiswaan.index', compact('ekskul'));
    }
}