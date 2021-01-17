@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mediaSosial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.media-sosials.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="link_accname">{{ trans('cruds.mediaSosial.fields.link_accname') }}</label>
                <input class="form-control {{ $errors->has('link_accname') ? 'is-invalid' : '' }}" type="text" name="link_accname" id="link_accname" value="{{ old('link_accname', '') }}" required>
                @if($errors->has('link_accname'))
                    <span class="text-danger">{{ $errors->first('link_accname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mediaSosial.fields.link_accname_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.mediaSosial.fields.vendor') }}</label>
                @foreach(App\Models\MediaSosial::VENDOR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('vendor') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="vendor_{{ $key }}" name="vendor" value="{{ $key }}" {{ old('vendor', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="vendor_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('vendor'))
                    <span class="text-danger">{{ $errors->first('vendor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mediaSosial.fields.vendor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="usaha_id">{{ trans('cruds.mediaSosial.fields.usaha') }}</label>
                <select class="form-control select2 {{ $errors->has('usaha') ? 'is-invalid' : '' }}" name="usaha_id" id="usaha_id" required>
                    @foreach($usahas as $id => $usaha)
                        <option value="{{ $id }}" {{ old('usaha_id') == $id ? 'selected' : '' }}>{{ $usaha }}</option>
                    @endforeach
                </select>
                @if($errors->has('usaha'))
                    <span class="text-danger">{{ $errors->first('usaha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.mediaSosial.fields.usaha_helper') }}</span>
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