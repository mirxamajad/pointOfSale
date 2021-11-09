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
                    {{ trans('cruds.accessories.fields.id') }}
                </th>
                <td>
                    {{ $accessories->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.title') }}
                </th>
                <td>
                    {{ $accessories->title }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.brand') }}
                </th>
                <td>
                    @foreach($accessories->brand as $id => $brand)
                        <span class="label label-info label-many">{{ $brand->name }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.model') }}
                </th>
                <td>
                    {{ $accessories->model }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.price') }}
                </th>
                <td>
                    {{ $accessories->price }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.sku') }}
                </th>
                <td>
                    {{ $accessories->sku }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.quantity') }}
                </th>
                <td>
                    {{ $accessories->quantity }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.color') }}
                </th>
                <td>
                    @foreach($accessories->color as $id => $color)
                    <span class="label label-info label-many">{{ $color->title }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.size') }}
                </th>
                <td>
                    @foreach($accessories->size as $id => $size)
                    <span class="label label-info label-many">{{ $size->title }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.accessories.fields.description') }}
                </th>
                <td>
                    {{ $accessories->description }}
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
