<div class="m-3">
    @can('usaha_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.usahas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.usaha.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.usaha.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-pengusahaUsahas">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.brand') }}
                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.nama') }}
                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.pengusaha') }}
                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.deskripsi') }}
                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.kategori') }}
                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.kontak') }}
                            </th>
                            <th>
                                {{ trans('cruds.usaha.fields.alamat_maps') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usahas as $key => $usaha)
                            <tr data-entry-id="{{ $usaha->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $usaha->id ?? '' }}
                                </td>
                                <td>
                                    {{ $usaha->brand ?? '' }}
                                </td>
                                <td>
                                    {{ $usaha->nama ?? '' }}
                                </td>
                                <td>
                                    {{ $usaha->pengusaha->nama ?? '' }}
                                </td>
                                <td>
                                    {{ $usaha->deskripsi ?? '' }}
                                </td>
                                <td>
                                    {{ $usaha->kategori ?? '' }}
                                </td>
                                <td>
                                    {{ $usaha->kontak ?? '' }}
                                </td>
                                <td>
                                    {{ $usaha->alamat_maps ?? '' }}
                                </td>
                                <td>
                                    @can('usaha_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.usahas.show', $usaha->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('usaha_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.usahas.edit', $usaha->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('usaha_delete')
                                        <form action="{{ route('admin.usahas.destroy', $usaha->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('usaha_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.usahas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-pengusahaUsahas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection