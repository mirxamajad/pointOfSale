@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.show') }} {{ trans('cruds.category.title') }}
</h6>
<div class="mT-30">
    <div class="mb-2">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    {{ trans('cruds.category.fields.id') }}
                </th>
                <td>
                    {{ $category->id }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.category.fields.name') }}
                </th>
                <td>
                    {{ $category->name }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.category.fields.description') }}
                </th>
                <td>
                    {{ $category->description }}
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
