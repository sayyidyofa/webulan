<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsahaRequest;
use App\Http\Requests\UpdateUsahaRequest;
use App\Http\Resources\Admin\UsahaResource;
use App\Models\Usaha;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsahaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('usaha_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UsahaResource(Usaha::with(['pengusaha'])->get());
    }

    public function store(StoreUsahaRequest $request)
    {
        $usaha = Usaha::create($request->all());

        return (new UsahaResource($usaha))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Usaha $usaha)
    {
        abort_if(Gate::denies('usaha_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UsahaResource($usaha->load(['pengusaha']));
    }

    public function update(UpdateUsahaRequest $request, Usaha $usaha)
    {
        $usaha->update($request->all());

        return (new UsahaResource($usaha))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Usaha $usaha)
    {
        abort_if(Gate::denies('usaha_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usaha->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
