<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable){
        return $dataTable->render('kategori.index');
    }

    public function create():View{
        return view('kategori.create');
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            'kodeKategori' => 'bail|required|string|max:255',
            'namaKategori' => 'bail|required|string|max:255',
        ]);
        KategoriModel::create([
            'kategori_kode'=>$request->kodeKategori,
            'kategori_nama'=>$request->namaKategori,
        ]);
        return redirect('/kategori');
    }
}