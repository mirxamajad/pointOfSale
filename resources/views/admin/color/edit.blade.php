@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.edit') }} {{ trans('cruds.color.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.color.update", [$color->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title">{{ trans('cruds.color.fields.title') }}*</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($color) ? $color->title : '') }}" required>
            @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.color.fields.title_helper') }}
            </p>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
