@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.category.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.category.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($category) ? $category->name : '') }}" required>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.category.fields.name_helper') }}
            </p>
        </div>
        
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">{{ trans('cruds.category.fields.description') }}*</label>
            <textarea  id="description" name="description" class="form-control" value="{{ old('description', isset($category) ? $category->description : '') }}" required></textarea>
            @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.category.fields.description_helper') }}
            </p>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
