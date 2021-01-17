<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFotoProdukRequest;
use App\Http\Requests\StoreFotoProdukRequest;
use App\Http\Requests\UpdateFotoProdukRequest;
use App\Models\FotoProduk;
use App\Models\ProdukUnggulan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FotoProdukController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('foto_produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fotoProduks = FotoProduk::with(['produk_unggulan', 'media'])->get();

        $produk_unggulans = ProdukUnggulan::get();

        return view('admin.fotoProduks.index', compact('fotoProduks', 'produk_unggulans'));
    }

    public function create()
    {
        abort_if(Gate::denies('foto_produk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produk_unggulans = ProdukUnggulan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fotoProduks.create', compact('produk_unggulans'));
    }

    public function store(StoreFotoProdukRequest $request)
    {
        $fotoProduk = FotoProduk::create($request->all());

        foreach ($request->input('foto', []) as $file) {
            $fotoProduk->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $fotoProduk->id]);
        }

        return redirect()->route('admin.foto-produks.index');
    }

    public function edit(FotoProduk $fotoProduk)
    {
        abort_if(Gate::denies('foto_produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produk_unggulans = ProdukUnggulan::all()->pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fotoProduk->load('produk_unggulan');

        return view('admin.fotoProduks.edit', compact('produk_unggulans', 'fotoProduk'));
    }

    public function update(UpdateFotoProdukRequest $request, FotoProduk $fotoProduk)
    {
        $fotoProduk->update($request->all());

        if (count($fotoProduk->foto) > 0) {
            foreach ($fotoProduk->foto as $media) {
                if (!in_array($media->file_name, $request->input('foto', []))) {
                    $media->delete();
                }
            }
        }

        $media = $fotoProduk->foto->pluck('file_name')->toArray();

        foreach ($request->input('foto', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $fotoProduk->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('foto');
            }
        }

        return redirect()->route('admin.foto-produks.index');
    }

    public function show(FotoProduk $fotoProduk)
    {
        abort_if(Gate::denies('foto_produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fotoProduk->load('produk_unggulan');

        return view('admin.fotoProduks.show', compact('fotoProduk'));
    }

    public function destroy(FotoProduk $fotoProduk)
    {
        abort_if(Gate::denies('foto_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fotoProduk->delete();

        return back();
    }

    public function massDestroy(MassDestroyFotoProdukRequest $request)
    {
        FotoProduk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('foto_produk_create') && Gate::denies('foto_produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FotoProduk();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
