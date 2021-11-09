@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.edit') }} {{ trans('cruds.brand.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.brand.update", [$brand->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.brand.fields.name') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($brand) ? $brand->name : '') }}" required>
            @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.brand.fields.name_helper') }}
            </p>
        </div>
        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
            <label for="category">{{ trans('cruds.brand.fields.category') }}*
                <span></span>
                <span></span></label>
            <select name="category" id="category" class="form-control select2"  required>
                @foreach($category as $id => $category)
                    <option value="{{ $id }}" {{ (in_array($id, old('category', [])) || isset($brand) && $brand->category->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
            @if($errors->has('category'))
                <em class="invalid-feedback">
                    {{ $errors->first('category') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.brand.fields.category_helper') }}
            </p>
        </div>
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">{{ trans('cruds.brand.fields.description') }}*</label>
            <textarea  id="description" name="description" class="form-control" required>
                {{ old('description', isset($brand) ? $brand->description : '') }}
            </textarea>
            @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.brand.fields.description_helper') }}
            </p>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
