<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProdukUnggulanRequest;
use App\Http\Requests\StoreProdukUnggulanRequest;
use App\Http\Requests\UpdateProdukUnggulanRequest;
use App\Models\ProdukUnggulan;
use App\Models\Usaha;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdukUnggulanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('produk_unggulan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produkUnggulans = ProdukUnggulan::with(['usaha'])->get();

        $usahas = Usaha::get();

        return view('admin.produkUnggulans.index', compact('produkUnggulans', 'usahas'));
    }

    public function create()
    {
        abort_if(Gate::denies('produk_unggulan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usahas = Usaha::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.produkUnggulans.create', compact('usahas'));
    }

    public function store(StoreProdukUnggulanRequest $request)
    {
        $produkUnggulan = ProdukUnggulan::create($request->all());

        return redirect()->route('admin.produk-unggulans.index');
    }

    public function edit(ProdukUnggulan $produkUnggulan)
    {
        abort_if(Gate::denies('produk_unggulan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usahas = Usaha::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $produkUnggulan->load('usaha');

        return view('admin.produkUnggulans.edit', compact('usahas', 'produkUnggulan'));
    }

    public function update(UpdateProdukUnggulanRequest $request, ProdukUnggulan $produkUnggulan)
    {
        $produkUnggulan->update($request->all());

        return redirect()->route('admin.produk-unggulans.index');
    }

    public function show(ProdukUnggulan $produkUnggulan)
    {
        abort_if(Gate::denies('produk_unggulan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produkUnggulan->load('usaha', 'produkUnggulanFotoProduks');

        return view('admin.produkUnggulans.show', compact('produkUnggulan'));
    }

    public function destroy(ProdukUnggulan $produkUnggulan)
    {
        abort_if(Gate::denies('produk_unggulan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produkUnggulan->delete();

        return back();
    }

    public function massDestroy(MassDestroyProdukUnggulanRequest $request)
    {
        ProdukUnggulan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
