@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.brand.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('brand_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.brand.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.brand.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-brand">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.brand.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.brand.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.brand.fields.description') }}
                </th>
                <th>
                    {{ trans('cruds.brand.fields.category') }}
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $key => $brand)
                <tr data-entry-id="{{ $brand->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $brand->id ?? '' }}
                    </td>
                    <td>
                        {{ $brand->name ?? '' }}
                    </td>
                    <td>
                        {{ $brand->description ?? '' }}
                    </td>
                    <td>
                        @foreach($brand->category as $key => $item)
                            {{ $item->name }}
                        @endforeach
                    </td>
                    <td>
                        @can('brand_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.brand.show', $brand->id) }}">
                                {{ trans('global.view') }}
                            </a>
                        @endcan

                        @can('brand_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.brand.edit', $brand->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan

                        @can('brand_delete')
                            <form action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('brand_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.brand.massDestroy') }}",
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
  $('.datatable-brand:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
