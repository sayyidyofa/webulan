<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUsahaRequest;
use App\Http\Requests\StoreUsahaRequest;
use App\Http\Requests\UpdateUsahaRequest;
use App\Models\Pengusaha;
use App\Models\Usaha;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsahaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('usaha_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usahas = Usaha::with(['pengusaha'])->get();

        $pengusahas = Pengusaha::get();

        return view('admin.usahas.index', compact('usahas', 'pengusahas'));
    }

    public function create()
    {
        abort_if(Gate::denies('usaha_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengusahas = Pengusaha::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.usahas.create', compact('pengusahas'));
    }

    public function store(StoreUsahaRequest $request)
    {
        $usaha = Usaha::create($request->all());

        return redirect()->route('admin.usahas.index');
    }

    public function edit(Usaha $usaha)
    {
        abort_if(Gate::denies('usaha_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengusahas = Pengusaha::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usaha->load('pengusaha');

        return view('admin.usahas.edit', compact('pengusahas', 'usaha'));
    }

    public function update(UpdateUsahaRequest $request, Usaha $usaha)
    {
        $usaha->update($request->all());

        return redirect()->route('admin.usahas.index');
    }

    public function show(Usaha $usaha)
    {
        abort_if(Gate::denies('usaha_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usaha->load('pengusaha', 'usahaMediaSosials', 'usahaProdukUnggulans');

        return view('admin.usahas.show', compact('usaha'));
    }

    public function destroy(Usaha $usaha)
    {
        abort_if(Gate::denies('usaha_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usaha->delete();

        return back();
    }

    public function massDestroy(MassDestroyUsahaRequest $request)
    {
        Usaha::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeComplete(Request $request) {
        dd($request);
    }
}
