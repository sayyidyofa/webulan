@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dokumentasi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dokumentasis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="kegiatan">{{ trans('cruds.dokumentasi.fields.kegiatan') }}</label>
                <input class="form-control {{ $errors->has('kegiatan') ? 'is-invalid' : '' }}" type="text" name="kegiatan" id="kegiatan" value="{{ old('kegiatan', '') }}" required>
                @if($errors->has('kegiatan'))
                <span class="text-danger">{{ $errors->first('kegiatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dokumentasi.fields.kegiatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="foto">{{ trans('cruds.dokumentasi.fields.foto') }}</label><br>
                <input type="file" id="foto" name="foto" accept="image/*">
                <br><span class="help-block">{{ trans('cruds.dokumentasi.fields.foto_helper') }}</span>
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