<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUsahaRequest;
use App\Http\Requests\StoreUsahaRequest;
use App\Http\Requests\UpdateUsahaRequest;
use App\Models\FotoProduk;
use App\Models\MediaSosial;
use App\Models\Pengusaha;
use App\Models\ProdukUnggulan;
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
        $usaha = new Usaha([
            'id' => $request->get('id'),
            'nama' => $request->get('nama'),
            'brand' => $request->get('brand'),
            'pengusaha_id' => $request->get('pengusaha_id'),
            'deskripsi' => $request->get('deskripsi'),
            'kategori' => $request->get('kategori'),
            'kontak' => $request->get('kontak'),
            'alamat_maps' => $request->get('alamat_maps'),
            'kegiatan' => $request->get('kegiatan') ?? null
        ]);
        $usaha->save();

        if (
            $request->has('sosmed_acc') &&
            $request->has('vendor') &&
            count($request->get('sosmed_acc')) > 0 &&
            count($request->get('vendor')) > 0 &&
            count($request->get('sosmed_acc')) === count($request->get('vendor'))
        ) {
            foreach ($request->get('sosmed_acc') as $index => $link_akun) {
                (new MediaSosial([
                    'link_accname' => $link_akun,
                    'vendor' => $request->get('vendor')[$index]
                ]))->usaha()->associate($usaha)->save();
            }
        }

        if ($request->has('produk_nama') && count($request->get('produk_nama')) > 0 ) {
            foreach ($request->get('produk_nama') as $index => $nama_produk) {
                $produk = new ProdukUnggulan([
                    'nama' => $nama_produk,
                    'deskripsi' => $request->has('produk_deskripsi')
                        ? array_key_exists($index, $request->get('produk_deskripsi'))
                            ? $request->get('produk_deskripsi')[$index]
                            : null
                        : null
                ]);
                $produk->save();
                if ($request->has('foto_'.$index) && count($request->get('foto_'.$index)) > 0) {
                    foreach ($request->get('foto_'.$index) as $fotoFilename) {
                        $fotoProduk = new FotoProduk;
                        $fotoProduk->produk_unggulan()->associate($produk)->save();
                        $fotoProduk->addMedia(storage_path('tmp/uploads'.$fotoFilename))->toMediaCollection('foto');
                    }
                }
            }
        }
    }
}
