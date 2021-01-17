@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fotoProduk.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.foto-produks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="produk_unggulan_id">{{ trans('cruds.fotoProduk.fields.produk_unggulan') }}</label>
                <select class="form-control select2 {{ $errors->has('produk_unggulan') ? 'is-invalid' : '' }}" name="produk_unggulan_id" id="produk_unggulan_id" required>
                    @foreach($produk_unggulans as $id => $produk_unggulan)
                        <option value="{{ $id }}" {{ old('produk_unggulan_id') == $id ? 'selected' : '' }}>{{ $produk_unggulan }}</option>
                    @endforeach
                </select>
                @if($errors->has('produk_unggulan'))
                    <span class="text-danger">{{ $errors->first('produk_unggulan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fotoProduk.fields.produk_unggulan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="foto">{{ trans('cruds.fotoProduk.fields.foto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto') ? 'is-invalid' : '' }}" id="foto-dropzone">
                </div>
                @if($errors->has('foto'))
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.fotoProduk.fields.foto_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedFotoMap = {}
Dropzone.options.fotoDropzone = {
    url: '{{ route('admin.foto-produks.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="foto[]" value="' + response.name + '">')
      uploadedFotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFotoMap[file.name]
      }
      $('form').find('input[name="foto[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($fotoProduk) && $fotoProduk->foto)
      var files = {!! json_encode($fotoProduk->foto) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="foto[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection