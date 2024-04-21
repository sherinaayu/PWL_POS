<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiDataTable;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TransaksiController extends Controller
{
    public function index(TransaksiDataTable $dataTable)
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi',
            'list'  => ['Home', 'Transaksi']
        ];

        $page = (object) [
            'title' => 'Daftar transaksi yang terdaftar dalam sistem'
        ];

        $activeMenu = 'transaksi';

        $user = UserModel::all();

        return view('transaksi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $transaksi = TransaksiModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')
            ->with('user');

        if ($request->user_id) {
            $transaksi->where('user_id', $request->user_id);
        }

        return DataTables::of($transaksi)
            ->addIndexColumn() 
            ->addColumn('aksi', function ($transaksi) { 
                $btn = '<a href="' . url('/transaksi/' . $transaksi->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/transaksi/' . $transaksi->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/transaksi/' . $transaksi->penjualan_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) 
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi',
            'list'  => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah transaksi baru'
        ];

        $user = UserModel::all();
        $activeMenu = 'transaksi'; 

        return view('transaksi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'              => 'required|integer',
            'pembeli'              => 'required|string|max:50',
            'penjualan_kode'       => 'required|string|max:20|unique:t_penjualan,penjualan_kode', 
            'penjualan_tanggal'    => 'required|date'
        ]);

        TransaksiModel::create([
            'user_id'              => $request->user_id,
            'pembeli'              => $request->pembeli,
            'penjualan_kode'       => $request->penjualan_kode, 
            'penjualan_tanggal'    => $request->penjualan_tanggal
        ]);

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil disimpan');
    }

    public function show(string $id)
    {
        $transaksi = TransaksiModel::with('user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Transaksi',
            'list'  => ['Home', 'Transaksi', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $transaksi = TransaksiModel::find($id);
        $user = UserModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Transaksi',
            'list' => ['Home', 'Transaksi', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id'              => 'required|',
            'pembeli'              => 'required|string|max:50',
            'penjualan_kode'       => 'required|string|max:20', 
            'penjualan_tanggal'    => 'required|date'
        ]);

        TransaksiModel::find($id)->update([
            'user_id'              => $request->user_id,
            'pembeli'              => $request->pembeli,
            'penjualan_kode'       => $request->penjualan_kode, 
            'penjualan_tanggal'    => $request->penjualan_tanggal
        ]);

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = TransaksiModel::find($id);
        if (!$check) { 
            return redirect('/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        try {
            TransaksiModel::destroy($id); 

            return redirect('/transaksi')->with('success', 'Data transaksi berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi')->with('error', 'Data transaksi gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}