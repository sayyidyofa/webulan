@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.produkUnggulan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.produk-unggulans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.produkUnggulan.fields.id') }}
                        </th>
                        <td>
                            {{ $produkUnggulan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produkUnggulan.fields.nama') }}
                        </th>
                        <td>
                            {{ $produkUnggulan->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produkUnggulan.fields.deskripsi') }}
                        </th>
                        <td>
                            {{ $produkUnggulan->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produkUnggulan.fields.usaha') }}
                        </th>
                        <td>
                            {{ $produkUnggulan->usaha->brand ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.produk-unggulans.index') }}">
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
            <a class="nav-link" href="#produk_unggulan_foto_produks" role="tab" data-toggle="tab">
                {{ trans('cruds.fotoProduk.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="produk_unggulan_foto_produks">
            @includeIf('admin.produkUnggulans.relationships.produkUnggulanFotoProduks', ['fotoProduks' => $produkUnggulan->produkUnggulanFotoProduks])
        </div>
    </div>
</div>

@endsection