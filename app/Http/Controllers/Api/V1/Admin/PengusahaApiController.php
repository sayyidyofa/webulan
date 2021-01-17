<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePengusahaRequest;
use App\Http\Requests\UpdatePengusahaRequest;
use App\Http\Resources\Admin\PengusahaResource;
use App\Models\Pengusaha;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengusahaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pengusaha_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengusahaResource(Pengusaha::with(['user'])->get());
    }

    public function store(StorePengusahaRequest $request)
    {
        $pengusaha = Pengusaha::create($request->all());

        return (new PengusahaResource($pengusaha))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pengusaha $pengusaha)
    {
        abort_if(Gate::denies('pengusaha_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PengusahaResource($pengusaha->load(['user']));
    }

    public function update(UpdatePengusahaRequest $request, Pengusaha $pengusaha)
    {
        $pengusaha->update($request->all());

        return (new PengusahaResource($pengusaha))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pengusaha $pengusaha)
    {
        abort_if(Gate::denies('pengusaha_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengusaha->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
