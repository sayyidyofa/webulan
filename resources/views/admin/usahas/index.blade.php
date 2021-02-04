@extends('layouts.admin')
@section('content')
@can('usaha_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.usahas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.usaha.title_singular') }}
            </a>
            <a href="{{ asset('UsahaImportTemplate(UbahIsinya).xlsx') }}" class="btn btn-info">
                Download Template Import Excel
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.usahas.importComplete') }}" enctype="multipart/form-data" method="post">
                @csrf
                <label for="file">Upload File Excel Data UMKM (Harus sesuai format template)</label>
                <input type="file" name="file" required>
                <button type="submit" class="btn btn-dark">Upload</button>
            </form>
        </div>
    </div>
@endcan
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
                            {{ trans('cruds.usaha.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('global.actions') }}
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
                                {{ $usaha->nib ?? '' }}
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
                                {{ $usaha->alamat ?? '' }}
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



@endsection
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
  let table = $('.datatable-Usaha:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection