@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.usaha.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.usahas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.id') }}
                        </th>
                        <td>
                            {{ $usaha->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.brand') }}
                        </th>
                        <td>
                            {{ $usaha->brand }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.nama') }}
                        </th>
                        <td>
                            {{ $usaha->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.pengusaha') }}
                        </th>
                        <td>
                            {{ $usaha->pengusaha->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.deskripsi') }}
                        </th>
                        <td>
                            {{ $usaha->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.kategori') }}
                        </th>
                        <td>
                            {{ $usaha->kategori }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.kontak') }}
                        </th>
                        <td>
                            {{ $usaha->kontak }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.alamat_maps') }}
                        </th>
                        <td>
                            {{ $usaha->alamat_maps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.usaha.fields.kegiatan') }}
                        </th>
                        <td>
                            {{ $usaha->kegiatan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.usahas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#usaha_media_sosials" role="tab" data-toggle="tab">
                {{ trans('cruds.mediaSosial.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#usaha_produk_unggulans" role="tab" data-toggle="tab">
                {{ trans('cruds.produkUnggulan.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="usaha_media_sosials">
            @includeIf('admin.usahas.relationships.usahaMediaSosials', ['mediaSosials' => $usaha->usahaMediaSosials])
        </div>
        <div class="tab-pane" role="tabpanel" id="usaha_produk_unggulans">
            @includeIf('admin.usahas.relationships.usahaProdukUnggulans', ['produkUnggulans' => $usaha->usahaProdukUnggulans])
        </div>
    </div>
</div>

@endsection