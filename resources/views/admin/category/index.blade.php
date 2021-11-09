@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.category.title_singular') }} {{ trans('global.list') }}
</h6>
<div class="mT-30">
    @can('category_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.category.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.category.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="table-responsive">
        <table class=" table table-bordered table-striped table-hover datatable datatable-Category">
            <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.category.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.category.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.category.fields.description') }}
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $category)
                <tr data-entry-id="{{ $category->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $category->id ?? '' }}
                    </td>
                    <td>
                        {{ $category->name ?? '' }}
                    </td>
                    <td>
                        {{ $category->description ?? '' }}
                    </td>
                    <td>
                        @can('category_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.category.show', $category->id) }}">
                                {{ trans('global.view') }}
                            </a>
                        @endcan

                        @can('category_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.category.edit', $category->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                        @endcan

                        @can('category_delete')
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.category.massDestroy') }}",
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
  $('.datatable-Category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
