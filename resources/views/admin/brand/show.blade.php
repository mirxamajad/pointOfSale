@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.show') }} {{ trans('cruds.brand.title') }}
</h6>
<div class="mT-30">
    <div class="mb-2">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    {{ trans('cruds.brand.fields.id') }}
                </th>
                <td>
                    {{ $brand->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.brand.fields.name') }}
                </th>
                <td>
                    {{ $brand->name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.brand.fields.description') }}
                </th>
                <td>
                    {{ $brand->description }}
                </td>
            </tr>
            <tr>
                <th>
                    Category
                </th>
                <td>
                    @foreach($brand->category as $id => $item)
                        <span class="label label-info label-many">{{ $item->name }}</span>
                    @endforeach
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
