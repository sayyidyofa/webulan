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
            <div class="card">
                <div class="card-header">Detail Usaha</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.usaha.fields.id') }}
                            </th>
                            <td>
                                {{ $usaha->nib }}
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
                                {{ trans('cruds.usaha.fields.alamat') }}
                            </th>
                            <td>
                                {{ $usaha->alamat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.usaha.fields.maps') }}
                            </th>
                            <td>
                                {{ $usaha->maps }}
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
                </div>
            </div>
            <div class="card">
                <div class="card-header">Produk Unggulan Usaha</div>
                <div class="card-body">
                    @foreach($usaha->usahaProdukUnggulans as $produkUnggulan)
                        <div class="card">
                            <div class="card-header">Produk #{{ $loop->iteration }}</div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.produkUnggulan.fields.nama') }}</th>
                                            <td>{{ $produkUnggulan->nama ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.produkUnggulan.fields.deskripsi') }}</th>
                                            <td>{{ $produkUnggulan->deskripsi ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('global.actions') }}</th>
                                            <td>
                                                @can('produk_unggulan_show')
                                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.produk-unggulans.show', $produkUnggulan->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                                @can('produk_unggulan_edit')
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.produk-unggulans.edit', $produkUnggulan->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
                                                @endcan

                                                @can('produk_unggulan_delete')
                                                    <form action="{{ route('admin.produk-unggulans.destroy', $produkUnggulan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @foreach($produkUnggulan->produkUnggulanFotoProduks as $fotoProduk)
                                    <div class="card">
                                        <div class="card-header">Foto Produk #{{ $loop->parent->iteration }}</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                @foreach($fotoProduk->foto as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                        <img src="{{ $media->getUrl('thumb') }}">
                                                    </a>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                @can('foto_produk_show')
                                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.foto-produks.show', $fotoProduk->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                                @can('foto_produk_edit')
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.foto-produks.edit', $fotoProduk->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
                                                @endcan

                                                @can('foto_produk_delete')
                                                    <form action="{{ route('admin.foto-produks.destroy', $fotoProduk->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                    </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">Media Sosial Usaha</div>
                <div class="card-body">
                    @foreach($usaha->usahaMediaSosials as $mediaSosial)
                        <div class="card">
                            <div class="card-header">Media Sosial #{{ $loop->iteration }}</div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.mediaSosial.fields.link_accname') }}</th>
                                            <td>{{ $mediaSosial->link_accname ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.mediaSosial.fields.vendor') }}</th>
                                            <td>{{ App\Models\MediaSosial::VENDOR_RADIO[$mediaSosial->vendor] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('global.actions') }}</th>
                                            <td>
                                                @can('media_sosial_show')
                                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.media-sosials.show', $mediaSosial->id) }}">
                                                        {{ trans('global.view') }}
                                                    </a>
                                                @endcan

                                                @can('media_sosial_edit')
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.media-sosials.edit', $mediaSosial->id) }}">
                                                        {{ trans('global.edit') }}
                                                    </a>
                                                @endcan

                                                @can('media_sosial_delete')
                                                    <form action="{{ route('admin.media-sosials.destroy', $mediaSosial->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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