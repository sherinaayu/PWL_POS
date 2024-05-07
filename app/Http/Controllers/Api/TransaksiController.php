<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return TransaksiModel::all();
    }

    public function store(Request $request)
    {
        $transaksi = TransaksiModel::create($request->all());
        return response()->json($transaksi, 201);
    }

    public function show(TransaksiModel $transaksi)
    {
        $transaksiWithImage = TransaksiModel::with('barang')->find($transaksi->detail_id);
        return response()->json($transaksiWithImage);
    }

    public function update(Request $request, TransaksiModel $transaksi)
    {
        $transaksi->update($request->all());
        return TransaksiModel::find($transaksi);
    }

    public function destroy(TransaksiModel $transaksi)
    {
        $transaksi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}