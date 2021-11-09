@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.series.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('series_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.series.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.series.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-Series">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.series.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.series.fields.title') }}
                </th>
                <th>
                    {{ trans('cruds.series.fields.model') }}
                </th>
                <th>
                    {{ trans('cruds.series.fields.brand') }}
                </th>
                <th>
                    {{ trans('cruds.series.fields.color') }}
                </th>
                <th>
                    {{ trans('cruds.series.fields.size') }}
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($series as $key => $series)
                <tr data-entry-id="{{ $series->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $series->id ?? '' }}
                    </td>
                    <td>
                        {{ $series->title ?? '' }}
                    </td>
                    <td>
                        {{ $series->model ?? '' }}
                    </td>
                    <td>
                        @foreach($series->brand as $key => $item)
                        <span class="badge badge-info">{{ $item->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($series->color as $key => $item)
                            <span class="badge badge-info">{{ $item->title }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($series->size as $key => $item)
                            <span class="badge badge-info">{{ $item->title }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('series_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.series.show', $series->id) }}">
                                {{ trans('global.view') }}
                            </a>
                        @endcan

                        @can('series_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.series.edit', $series->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan

                        @can('series_delete')
                            <form action="{{ route('admin.series.destroy', $series->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('series_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.series.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Series:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
