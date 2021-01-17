<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProdukUnggulanRequest;
use App\Http\Requests\UpdateProdukUnggulanRequest;
use App\Http\Resources\Admin\ProdukUnggulanResource;
use App\Models\ProdukUnggulan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdukUnggulanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('produk_unggulan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProdukUnggulanResource(ProdukUnggulan::with(['usaha'])->get());
    }

    public function store(StoreProdukUnggulanRequest $request)
    {
        $produkUnggulan = ProdukUnggulan::create($request->all());

        return (new ProdukUnggulanResource($produkUnggulan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProdukUnggulan $produkUnggulan)
    {
        abort_if(Gate::denies('produk_unggulan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProdukUnggulanResource($produkUnggulan->load(['usaha']));
    }

    public function update(UpdateProdukUnggulanRequest $request, ProdukUnggulan $produkUnggulan)
    {
        $produkUnggulan->update($request->all());

        return (new ProdukUnggulanResource($produkUnggulan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProdukUnggulan $produkUnggulan)
    {
        abort_if(Gate::denies('produk_unggulan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produkUnggulan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
