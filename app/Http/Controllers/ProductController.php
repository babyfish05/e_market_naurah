<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use PDO;
use PDOException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['produk'] = Product::orderBy('created_at', 'DESC')->get();
            return view('produk.index', compact('data'));
        } catch (QueryException | Expectation | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        // Product::create($request->all());

        // return redirect('produk');
        try {
            DB::beginTransaction();
            Product::create($request->all());

            DB::commit();
            return redirect('produk')->with('success', "input data berhasil");
        } catch (QueryException | Expectation | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $product)
    {
        try {
            DB::beginTransaction();
            $produk = Product::findOrFail($product);
            $validate = $request->validated();
            $produk->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        // dd($product);
        $produk = Product::findOrFail($product);
        // dd($produk);
        try {
            $produk->delete();
            // dd('berhasil');
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
