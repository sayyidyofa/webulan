@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dokumentasi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dokumentasis.update", [$dokumentasi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="kegiatan">{{ trans('cruds.dokumentasi.fields.kegiatan') }}</label>
                <input class="form-control {{ $errors->has('kegiatan') ? 'is-invalid' : '' }}" type="text" name="kegiatan" id="kegiatan" value="{{ old('kegiatan', $dokumentasi->kegiatan) }}" required>
                @if($errors->has('kegiatan'))
                <span class="text-danger">{{ $errors->first('kegiatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dokumentasi.fields.kegiatan_helper') }}</span>
            </div>
            <div class="form-group col-lg-5">
                <label for="foto">{{ trans('cruds.dokumentasi.fields.file_name') }}</label><br>
                <img src="{{url('/storage/tmp/kegiatan/'.$dokumentasi->file_name)}}" class="img-thumbnail" width="150" height="100">
                <input type="file" id="foto" name="foto" accept="image/*">
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