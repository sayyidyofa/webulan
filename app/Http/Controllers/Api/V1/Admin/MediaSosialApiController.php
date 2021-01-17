<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaSosialRequest;
use App\Http\Requests\UpdateMediaSosialRequest;
use App\Http\Resources\Admin\MediaSosialResource;
use App\Models\MediaSosial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MediaSosialApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('media_sosial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MediaSosialResource(MediaSosial::with(['usaha'])->get());
    }

    public function store(StoreMediaSosialRequest $request)
    {
        $mediaSosial = MediaSosial::create($request->all());

        return (new MediaSosialResource($mediaSosial))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MediaSosial $mediaSosial)
    {
        abort_if(Gate::denies('media_sosial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MediaSosialResource($mediaSosial->load(['usaha']));
    }

    public function update(UpdateMediaSosialRequest $request, MediaSosial $mediaSosial)
    {
        $mediaSosial->update($request->all());

        return (new MediaSosialResource($mediaSosial))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MediaSosial $mediaSosial)
    {
        abort_if(Gate::denies('media_sosial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaSosial->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
