<?php

namespace App\Http\Controllers;

use App\Models\PembelianModel;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
         // ambil data dari database
         $pembelian = PembelianModel::all();

         // menampilkan view dengan mengirim data pelanggan
         return view('pembelian.index', compact('pembelian'));
    }
}
