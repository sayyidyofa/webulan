<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFotoProdukRequest;
use App\Http\Requests\UpdateFotoProdukRequest;
use App\Http\Resources\Admin\FotoProdukResource;
use App\Models\FotoProduk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FotoProdukApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('foto_produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FotoProdukResource(FotoProduk::with(['produk_unggulan'])->get());
    }

    public function store(StoreFotoProdukRequest $request)
    {
        $fotoProduk = FotoProduk::create($request->all());

        if ($request->input('foto', false)) {
            $fotoProduk->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
        }

        return (new FotoProdukResource($fotoProduk))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FotoProduk $fotoProduk)
    {
        abort_if(Gate::denies('foto_produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FotoProdukResource($fotoProduk->load(['produk_unggulan']));
    }

    public function update(UpdateFotoProdukRequest $request, FotoProduk $fotoProduk)
    {
        $fotoProduk->update($request->all());

        if ($request->input('foto', false)) {
            if (!$fotoProduk->foto || $request->input('foto') !== $fotoProduk->foto->file_name) {
                if ($fotoProduk->foto) {
                    $fotoProduk->foto->delete();
                }

                $fotoProduk->addMedia(storage_path('tmp/uploads/' . $request->input('foto')))->toMediaCollection('foto');
            }
        } elseif ($fotoProduk->foto) {
            $fotoProduk->foto->delete();
        }

        return (new FotoProdukResource($fotoProduk))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FotoProduk $fotoProduk)
    {
        abort_if(Gate::denies('foto_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fotoProduk->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
