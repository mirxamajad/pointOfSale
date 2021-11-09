@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.create') }} {{ trans('cruds.size.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.size.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title">{{ trans('cruds.size.fields.title') }}*</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($size) ? $size->title : '') }}" required>
            @if($errors->has('title'))
                <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.size.fields.title_helper') }}
            </p>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
