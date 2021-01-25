@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.usaha.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.usahas.storeComplete") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id">NIB</label>
                <input class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" type="text" name="id" id="id" required>
                @if($errors->has('id'))
                    <span class="text-danger">{{ $errors->first('id') }}</span>
                @endif
                <span class="help-block">Nomor Induk Berusaha</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.usaha.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brand">{{ trans('cruds.usaha.fields.brand') }}</label>
                <input class="form-control {{ $errors->has('brand') ? 'is-invalid' : '' }}" type="text" name="brand" id="brand" value="{{ old('brand', '') }}" required>
                @if($errors->has('brand'))
                    <span class="text-danger">{{ $errors->first('brand') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pengusaha_id">{{ trans('cruds.usaha.fields.pengusaha') }}</label>
                <select class="form-control select2 {{ $errors->has('pengusaha') ? 'is-invalid' : '' }}" name="pengusaha_id" id="pengusaha_id" required>
                    @foreach($pengusahas as $id => $pengusaha)
                        <option value="{{ $id }}" {{ old('pengusaha_id') == $id ? 'selected' : '' }}>{{ $pengusaha }}</option>
                    @endforeach
                </select>
                @if($errors->has('pengusaha'))
                    <span class="text-danger">{{ $errors->first('pengusaha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.pengusaha_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deskripsi">{{ trans('cruds.usaha.fields.deskripsi') }}</label>
                <input class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', '') }}" required>
                @if($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.deskripsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kategori">{{ trans('cruds.usaha.fields.kategori') }}</label>
                <input class="form-control {{ $errors->has('kategori') ? 'is-invalid' : '' }}" type="text" name="kategori" id="kategori" value="{{ old('kategori', '') }}" required>
                @if($errors->has('kategori'))
                    <span class="text-danger">{{ $errors->first('kategori') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.kategori_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kontak">{{ trans('cruds.usaha.fields.kontak') }}</label>
                <input class="form-control {{ $errors->has('kontak') ? 'is-invalid' : '' }}" type="text" name="kontak" id="kontak" value="{{ old('kontak', '') }}" required>
                @if($errors->has('kontak'))
                    <span class="text-danger">{{ $errors->first('kontak') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.kontak_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat_maps">{{ trans('cruds.usaha.fields.alamat_maps') }}</label>
                <input class="form-control {{ $errors->has('alamat_maps') ? 'is-invalid' : '' }}" type="text" name="alamat_maps" id="alamat_maps" value="{{ old('alamat_maps', '') }}" required>
                @if($errors->has('alamat_maps'))
                    <span class="text-danger">{{ $errors->first('alamat_maps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.alamat_maps_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kegiatan">{{ trans('cruds.usaha.fields.kegiatan') }}</label>
                <input class="form-control {{ $errors->has('kegiatan') ? 'is-invalid' : '' }}" type="text" name="kegiatan" id="kegiatan" value="{{ old('kegiatan', '') }}">
                @if($errors->has('kegiatan'))
                    <span class="text-danger">{{ $errors->first('kegiatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.usaha.fields.kegiatan_helper') }}</span>
            </div>
            <div class="card">
                <div class="card-header">
                    Sosial Media/Website
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            Akun/Link #1
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="sosmed_acc_1">Link Akun/Nama Akun</label>
                                <input class="form-control" type="text" name="sosmed_acc[0]" id="sosmed_acc_1">
                            </div>
                            <div class="form-group">
                                @foreach(App\Models\MediaSosial::VENDOR_RADIO as $key => $label)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="vendor_1_{{ $key }}" name="vendor[0]" value="{{ $key }}" required>
                                        <label class="form-check-label" for="vendor_1_{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="tambahan_sosmed"></div>
                    <div id="tambahsosmed">
                        <div class="btn btn-info addsosmed">Tambah Sosmed</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Produk Unggulan
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            Produk #1
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required" for="produk_nama_1">Nama Produk</label>
                                <input class="form-control" type="text" name="produk_nama[0]" id="produk_nama_1" required>
                            </div>
                            <div class="form-group">
                                <label for="produk_deskripsi_1">Deskripsi Produk</label>
                                <input class="form-control" type="text" name="produk_deskripsi[0]" id="produk_deskripsi_1">
                                <span class="help-block">Opsional</span>
                            </div>
                            <div class="form-group">
                                <label for="foto_dropzone_1" class="required">Upload Foto</label>
                                <div class="needsclick dropzone" id="foto_dropzone_1"></div>
                            </div>
                        </div>
                    </div>
                    <div id="tambahan_produk"></div>
                    <div id="tambahproduk">
                        <div class="btn btn-info addproduk">Tambah Produk</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        // Sosmed dynamic input
        let sosmed_counter = 2;
        let sosmedVendorTemplate = (id) => `
        @foreach(App\Models\MediaSosial::VENDOR_RADIO as $key => $label)
        <div class="form-check">
            <input class="form-check-input" type="radio" id="vendor_${id}_{{ $key }}" name="vendor[${id-1}]" value="{{ $key }}" required>
            <label class="form-check-label" for="vendor_${id}_{{ $key }}">{{ $label }}</label>
        </div>
        @endforeach`;
        let sosmedTemplate = (id, vendor) => `
<div class="card">
    <div class="card-header">
        Akun/Link #${id}
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="sosmed_acc_${id}">Link Akun/Nama Akun</label>
            <input class="form-control" type="text" name="sosmed_acc[${id-1}]" id="sosmed_acc_${id}">
        </div>
        <div class="form-group">
            ${vendor}
        </div>
        <div class="form-group">
            <div class="btn btn-danger" onclick="$(this).closest('.card').remove()">Cancel</div>
        </div>
    </div>
</div>`;
        $('.addsosmed').on('click', (e) => {
            $('#tambahan_sosmed').append(
                sosmedTemplate(sosmed_counter, sosmedVendorTemplate(sosmed_counter))
            );
            sosmed_counter = sosmed_counter + 1;
        });


        // Produk dynamic input
        let produk_counter = 2;
        let removeCalonProductFotos = (id) => {
            let deletedInputs = $('form').find(`input[name='foto_${id-1}[]']`);
            [... new Set(deletedInputs.map((_, {value}) => value).toArray())].forEach((filename) => {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.foto-produks.quickDelete') }}',
                    data: `_token={{ csrf_token() }}&filename=${filename}`,
                    success: (jqObj) => {console.dir([`deleted ${filename}`, jqObj])},
                    error: console.dir
                });
            });
            deletedInputs.remove();
        }
        let produkTemplate = (id) => {
            return `
        <div class="card">
            <div class="card-header">
                Produk #${id}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="required" for="produk_nama_${id}">Nama Produk</label>
                    <input class="form-control" type="text" name="produk_nama[${id - 1}]" id="produk_nama_${id}" required>
                </div>
                <div class="form-group">
                    <label for="produk_deskripsi_${id}">Deskripsi Produk</label>
                    <input class="form-control" type="text" name="produk_deskripsi[${id - 1}]" id="produk_deskripsi_${id}">
                    <span class="help-block">Opsional</span>
                </div>
                <div class="form-group">
                    <label for="foto_dropzone_${id}" class="required">Upload Foto</label>
                    <div class="needsclick dropzone" id="foto_dropzone_${id}"></div>
                </div>
                <div class="form-group">
                    <div class="btn btn-danger" onclick="
                    removeCalonProductFotos(${id});
                    dropzones = dropzones.filter((_, index) => index !== ${id});
                    $(this).closest('.card').remove()
                    ">Cancel</div>
                </div>
            </div>
        </div>
        `};

        let dropzones = [];
        let uploadedFotoArray = [];
        $('.addproduk').on('click', (e) => {
            $('#tambahan_produk').append(produkTemplate(produk_counter));
            dropzones[produk_counter] = new Dropzone(`#foto_dropzone_${produk_counter}`, {
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
                    $('form').append(`<input type="hidden" name="foto_${produk_counter-2}[]" value="${response.name}">`);
                    let tempObj = {};
                    tempObj[file.name] = response.name;
                    uploadedFotoArray[produk_counter] = tempObj;
                },
                removedfile: function (file) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.foto-produks.quickDelete') }}',
                        data: `_token={{ csrf_token() }}&filename=${uploadedFotoArray[produk_counter][file.name]}`
                        //success: () => {console.log(`deleted one of foto calon produk #${produk_counter}`)}
                    });
                    file.previewElement.remove()
                    let name;
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedFotoArray[produk_counter][file.name];
                    }
                    $('form').find(`input[name="foto_${produk_counter-1}[]"][value="${name}"]`).remove()
                    uploadedFotoArray = uploadedFotoArray.filter((_, index) => index !== produk_counter);
                },
                error: function (file, response) {
                    let message = $.type(response) === 'string'
                        ? response
                        : response.errors.file;
                    file.previewElement.classList.add('dz-error')
                    let _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                    let _results = []
                    for (let _i = 0, _len = _ref.length; _i < _len; _i++) {
                        let node = _ref[_i]
                        _results.push(node.textContent = message)
                    }

                    return _results
            });
            // Dropzone.options[dropzones[produk_counter]] = fotoDropzoneOption(produk_counter);
            produk_counter = produk_counter + 1;
        });

        let uploadedFotoMap = {};
        Dropzone.options[`fotoDropzone${1}`] = {
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
                $('form').append('<input type="hidden" name="foto_0[]" value="' + response.name + '">')
                uploadedFotoMap[file.name] = response.name
            },
            removedfile: function (file) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.foto-produks.quickDelete') }}',
                    data: `_token={{ csrf_token() }}&filename=${uploadedFotoMap[file.name]}`
                    //success: console.dir
                });
                file.previewElement.remove()
                let name;
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFotoMap[file.name];
                }
                $('form').find('input[name="foto_0[]"][value="' + name + '"]').remove()
                delete uploadedFotoMap[file.name]
            },
            error: function (file, response) {
                let message = $.type(response) === 'string'
                    ? response
                    : response.errors.file;
                file.previewElement.classList.add('dz-error')
                let _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                let _results = []
                for (let _i = 0, _len = _ref.length; _i < _len; _i++) {
                    let node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection