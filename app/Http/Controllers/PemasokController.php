<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $search = $request->get('search', '');

        $pemasoks = Pemasok::get();

        return view('pemasok.index', compact('pemasoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {

        return view('pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemasokRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $pemasok = Pemasok::create($validated);

        return redirect()
            ->back()
            ->withSuccess(__('crud.common.created'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Pemasok $pemasok): View
    {
        $this->authorize('view', $pemasok);

        return view('pemasok.show', compact('pemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Pemasok $pemasok): View
    {

        return view('pemasok.edit', compact('pemasok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdatePemasokRequest $request,
        Pemasok $pemasok
    ): RedirectResponse {

        $validated = $request->validated();

        $pemasok->update($validated);

        return redirect()
            ->back()
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Pemasok $pemasok
    ): RedirectResponse {
        $pemasok->delete();

        return redirect()
            ->back()
            ->withSuccess(__('crud.common.removed'));
    }
}
