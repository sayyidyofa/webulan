<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMediaSosialRequest;
use App\Http\Requests\StoreMediaSosialRequest;
use App\Http\Requests\UpdateMediaSosialRequest;
use App\Models\MediaSosial;
use App\Models\Usaha;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MediaSosialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('media_sosial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaSosials = MediaSosial::with(['usaha'])->get();

        $usahas = Usaha::get();

        return view('admin.mediaSosials.index', compact('mediaSosials', 'usahas'));
    }

    public function create()
    {
        abort_if(Gate::denies('media_sosial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usahas = Usaha::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mediaSosials.create', compact('usahas'));
    }

    public function store(StoreMediaSosialRequest $request)
    {
        $mediaSosial = MediaSosial::create($request->all());

        return redirect()->route('admin.media-sosials.index');
    }

    public function edit(MediaSosial $mediaSosial)
    {
        abort_if(Gate::denies('media_sosial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usahas = Usaha::all()->pluck('brand', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mediaSosial->load('usaha');

        return view('admin.mediaSosials.edit', compact('usahas', 'mediaSosial'));
    }

    public function update(UpdateMediaSosialRequest $request, MediaSosial $mediaSosial)
    {
        $mediaSosial->update($request->all());

        return redirect()->route('admin.media-sosials.index');
    }

    public function show(MediaSosial $mediaSosial)
    {
        abort_if(Gate::denies('media_sosial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaSosial->load('usaha');

        return view('admin.mediaSosials.show', compact('mediaSosial'));
    }

    public function destroy(MediaSosial $mediaSosial)
    {
        abort_if(Gate::denies('media_sosial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaSosial->delete();

        return back();
    }

    public function massDestroy(MassDestroyMediaSosialRequest $request)
    {
        MediaSosial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
