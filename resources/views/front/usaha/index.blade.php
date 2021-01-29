@extends('front.welcome')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.list') }} {{ trans('cruds.usaha.title_singular') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Usaha">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            NIB
                        </th>
                        <th>
                            {{ trans('cruds.usaha.fields.brand') }}
                        </th>
                        <th>
                            {{ trans('cruds.usaha.fields.pengusaha') }}
                        </th>
                        <th>
                            {{ trans('cruds.usaha.fields.kategori') }}
                        </th>
                        <th>
                            {{ trans('cruds.usaha.fields.alamat_maps') }}
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usahas as $key => $usaha)
                        <tr data-entry-id="{{ $usaha->id }}">
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $usaha->id ?? '' }}
                            </td>
                            <td>
                                {{ $usaha->brand ?? '' }}
                            </td>
                            <td>
                                {{ $usaha->pengusaha->nama ?? '' }}
                            </td>
                            <td>
                                {{ $usaha->kategori ?? '' }}
                            </td>
                            <td>
                                {{ $usaha->alamat_maps ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('front.usaha.show', $usaha->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
