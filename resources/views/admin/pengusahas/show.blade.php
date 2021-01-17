@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pengusaha.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengusahas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pengusaha.fields.id') }}
                        </th>
                        <td>
                            {{ $pengusaha->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengusaha.fields.nama') }}
                        </th>
                        <td>
                            {{ $pengusaha->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengusaha.fields.user') }}
                        </th>
                        <td>
                            {{ $pengusaha->user->email ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengusahas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#pengusaha_usahas" role="tab" data-toggle="tab">
                {{ trans('cruds.usaha.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pengusaha_usahas">
            @includeIf('admin.pengusahas.relationships.pengusahaUsahas', ['usahas' => $pengusaha->pengusahaUsahas])
        </div>
    </div>
</div>

@endsection