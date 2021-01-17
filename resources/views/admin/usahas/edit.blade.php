@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.usaha.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.usahas.update", [$usaha->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.usaha.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $usaha->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brand">{{ trans('cruds.usaha.fields.brand') }}</label>
                <input class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" type="text" name="brand" id="brand" value="{{ old('brand', $usaha->brand) }}" required>
                @if($errors->has('brand'))
                    <span class="text-danger">{{ $errors->first('brand') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pengusaha_id">{{ trans('cruds.usaha.fields.pengusaha') }}</label>
                <select class="form-control select2 {{ $errors->has('pengusaha') ? 'is-invalid' : '' }}" name="pengusaha_id" id="pengusaha_id" required>
                    @foreach($pengusahas as $id => $pengusaha)
                        <option value="{{ $id }}" {{ (old('pengusaha_id') ? old('pengusaha_id') : $usaha->pengusaha->id ?? '') == $id ? 'selected' : '' }}>{{ $pengusaha }}</option>
                    @endforeach
                </select>
                @if($errors->has('pengusaha'))
                    <span class="text-danger">{{ $errors->first('pengusaha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.pengusaha_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">{{ trans('cruds.usaha.fields.deskripsi') }}</label>
                <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $usaha->deskripsi) }}" required>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kategori">{{ trans('cruds.usaha.fields.kategori') }}</label>
                <input class="form-control {{ $errors->has('kategori') ? 'is-invalid' : '' }}" type="text" name="kategori" id="kategori" value="{{ old('kategori', $usaha->kategori) }}" required>
                @if($errors->has('kategori'))
                    <span class="text-danger">{{ $errors->first('kategori') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.kategori_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kontak">{{ trans('cruds.usaha.fields.kontak') }}</label>
                <input class="form-control {{ $errors->has('kontak') ? 'is-invalid' : '' }}" type="text" name="kontak" id="kontak" value="{{ old('kontak', $usaha->kontak) }}" required>
                @if($errors->has('kontak'))
                    <span class="text-danger">{{ $errors->first('kontak') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.kontak_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat_maps">{{ trans('cruds.usaha.fields.alamat_maps') }}</label>
                <input class="form-control {{ $errors->has('alamat_maps') ? 'is-invalid' : '' }}" type="text" name="alamat_maps" id="alamat_maps" value="{{ old('alamat_maps', $usaha->alamat_maps) }}" required>
                @if($errors->has('alamat_maps'))
                    <span class="text-danger">{{ $errors->first('alamat_maps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.alamat_maps_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kegiatan">{{ trans('cruds.usaha.fields.kegiatan') }}</label>
                <input class="form-control {{ $errors->has('kegiatan') ? 'is-invalid' : '' }}" type="text" name="kegiatan" id="kegiatan" value="{{ old('kegiatan', $usaha->kegiatan) }}">
                @if($errors->has('kegiatan'))
                    <span class="text-danger">{{ $errors->first('kegiatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.kegiatan_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection