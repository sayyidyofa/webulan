@extends('layouts.admin')
@section('content')
@can('dokumentasi_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('admin.dokumentasis.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.dokumentasi.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.list') }} {{ trans('cruds.dokumentasi.title_singular') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pengusaha">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            {{ trans('cruds.dokumentasi.fields.kegiatan') }}
                        </th>
                        <th>
                            Foto
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokumentasis as $key => $dokumentasi)
                    <tr data-entry-id="{{ $dokumentasi->id }}">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $dokumentasi->kegiatan ?? '' }}
                        </td>
                        <td>
                            <a href="{{url('/storage/tmp/kegiatan/'.$dokumentasi->file_name)}}" target="_blank" style="display: inline-block">
                                <img src="{{url('/storage/tmp/kegiatan/'.$dokumentasi->file_name)}}" class="img-thumbnail" width="75">
                            </a>
                        </td>
                        <td>
                            @can('dokumentasi_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.dokumentasis.edit', $dokumentasi->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('dokumentasi_delete')
                            <form action="{{ route('admin.dokumentasis.destroy', $dokumentasi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection