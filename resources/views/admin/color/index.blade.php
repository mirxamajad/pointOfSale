@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.color.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('color_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.color.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.color.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-Color">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.color.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.color.fields.title') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($colors as $key => $color)
                <tr data-entry-id="{{ $color->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $color->id ?? '' }}
                    </td>
                    <td>
                        {{ $color->title ?? '' }}
                    </td>
                    <td>
                        @can('color_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.color.show', $color->id) }}">
                                {{ trans('global.view') }}
                            </a>
                        @endcan

                        @can('color_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.color.edit', $color->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan

                        @can('color_delete')
                            <form action="{{ route('admin.color.destroy', $color->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('color_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.color.massDestroy') }}",
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
  $('.datatable-Color:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
