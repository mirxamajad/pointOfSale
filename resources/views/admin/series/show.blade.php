@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.show') }} {{ trans('cruds.role.title') }}
</h6>
<div class="mT-30">
    <div class="mb-2">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.id') }}
                </th>
                <td>
                    {{ $series->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.title') }}
                </th>
                <td>
                    {{ $series->title }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.brand') }}
                </th>
                <td>
                    @foreach($series->brand as $id => $brand)
                        <span class="label label-info label-many">{{ $brand->name }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.model') }}
                </th>
                <td>
                    {{ $series->model }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.price') }}
                </th>
                <td>
                    {{ $series->price }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.sku') }}
                </th>
                <td>
                    {{ $series->sku }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.quantity') }}
                </th>
                <td>
                    {{ $series->quantity }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.color') }}
                </th>
                <td>
                    @foreach($series->color as $id => $color)
                    <span class="label label-info label-many">{{ $color->title }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.size') }}
                </th>
                <td>
                    @foreach($series->size as $id => $size)
                    <span class="label label-info label-many">{{ $size->title }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.series.fields.description') }}
                </th>
                <td>
                    {{ $series->description }}
                </td>
            </tr>
            </tbody>
        </table>
        <a style="margin-top:20px;" class="btn btn-primary" href="{{ url()->previous() }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>
</div>
@endsection
