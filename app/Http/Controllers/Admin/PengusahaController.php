<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPengusahaRequest;
use App\Http\Requests\StorePengusahaRequest;
use App\Http\Requests\UpdatePengusahaRequest;
use App\Models\Pengusaha;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengusahaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pengusaha_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengusahas = Pengusaha::all();

        return view('admin.pengusahas.index', compact('pengusahas'));
    }

    public function create()
    {
        abort_if(Gate::denies('pengusaha_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengusahas.create');
    }

    public function store(StorePengusahaRequest $request)
    {
        $pengusaha = Pengusaha::create($request->all());

        return redirect()->route('admin.pengusahas.index');
    }

    public function edit(Pengusaha $pengusaha)
    {
        abort_if(Gate::denies('pengusaha_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengusahas.edit', compact('pengusaha'));
    }

    public function update(UpdatePengusahaRequest $request, Pengusaha $pengusaha)
    {
        $pengusaha->update($request->all());

        return redirect()->route('admin.pengusahas.index');
    }

    public function show(Pengusaha $pengusaha)
    {
        abort_if(Gate::denies('pengusaha_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengusahas.show', compact('pengusaha'));
    }

    public function destroy(Pengusaha $pengusaha)
    {
        abort_if(Gate::denies('pengusaha_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengusaha->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengusahaRequest $request)
    {
        Pengusaha::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
