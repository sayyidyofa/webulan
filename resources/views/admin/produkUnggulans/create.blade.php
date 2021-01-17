@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.produkUnggulan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.produk-unggulans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.produkUnggulan.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.produkUnggulan.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deskripsi">{{ trans('cruds.produkUnggulan.fields.deskripsi') }}</label>
                <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', '') }}">
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.produkUnggulan.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="usaha_id">{{ trans('cruds.produkUnggulan.fields.usaha') }}</label>
                <select class="form-control select2 {{ $errors->has('usaha') ? 'is-invalid' : '' }}" name="usaha_id" id="usaha_id" required>
                    @foreach($usahas as $id => $usaha)
                        <option value="{{ $id }}" {{ old('usaha_id') == $id ? 'selected' : '' }}>{{ $usaha }}</option>
                    @endforeach
                </select>
                @if($errors->has('usaha'))
                    <span class="text-danger">{{ $errors->first('usaha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.produkUnggulan.fields.usaha_helper') }}</span>
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