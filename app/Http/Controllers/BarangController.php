<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barangs = Barang::get();

        $users = User::pluck('name', 'id');
        $produks = Product::pluck('nama_produk', 'id');
        // dd($users);
        return view('barang.index', compact('barangs', 'users', 'produks'));
    }
    public function store(StoreBarangRequest $request)
    {
        $validated = $request->validated();
        $validated['ditarik'] = 0;
// dd($validated);
        $barang = Barang::create($validated);

        return redirect()
            ->back()
            ->withSuccess(__('crud.common.created'));
    }
    public function update(
        UpdateBarangRequest $request,
        Barang $barang
    ){
    

        $validated = $request->validated();
        $barang->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Barang $barang)
    {

        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
