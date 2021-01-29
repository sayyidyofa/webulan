@extends('front.welcome')

@section('content')
    <div class="card">
        <div class="card-header">Usaha</div>
        <div class="card-body">
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
                                {{ $usaha->id }}
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
                                    </tbody>
                                </table>
                                @foreach($produkUnggulan->produkUnggulanFotoProduks as $fotoProduk)
                                    <div class="card">
                                        <div class="card-header">Foto Produk #{{ $loop->parent->iteration }}</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                @foreach($fotoProduk->foto as $key => $media)
                                                    <img src="{{ $media->getUrl() }}" alt="media">
                                                @endforeach
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection