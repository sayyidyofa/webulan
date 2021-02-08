<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDokumentasiRequest;
use App\Http\Requests\UpdateDokumentasiRequest;
use App\Models\Dokumentasi;
use Gate;
use File;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DokumentasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dokumentasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dokumentasis = Dokumentasi::all();

        return view('admin.dokumentasis.index', compact('dokumentasis'));
    }

    public function create()
    {
        abort_if(Gate::denies('dokumentasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dokumentasis.create');
    }

    public function store(StoreDokumentasiRequest $request)
    {
        $file = $request->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('storage/tmp/kegiatan/'), $nama_file);

        Dokumentasi::create([
            'kegiatan' => $request->kegiatan,
            'file_name' => $nama_file,
        ]);

        return redirect()->route('admin.dokumentasis.index');
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        abort_if(Gate::denies('dokumentasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dokumentasis.edit', compact('dokumentasi'));
    }

    public function update(UpdateDokumentasiRequest $request, Dokumentasi $dokumentasi)
    {
        $dokumentasi->kegiatan = $request->kegiatan;
        if ($request->file('foto') == "") {
            $dokumentasi->file_name = $dokumentasi->file_name;
        } else {
            $file       = $request->file('foto');
            $nama_file   = $file->getClientOriginalName();
            File::delete('storage/tmp/kegiatan/' . $dokumentasi->file_name);
            $request->file('foto')->move(public_path('storage/tmp/kegiatan/'), $nama_file);
            $dokumentasi->file_name = $nama_file;
        }

        $dokumentasi->update();
        return redirect()->route('admin.dokumentasis.index');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        abort_if(Gate::denies('dokumentasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        File::delete('storage/tmp/kegiatan/' . $dokumentasi->file_name);
        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasis.index');
    }
}
