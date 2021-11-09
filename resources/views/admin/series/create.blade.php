@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.create') }} {{ trans('cruds.series.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.series.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row"> 
            <div class="col-lg-12">
                <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                    <label for="brand">{{ trans('cruds.series.fields.brand') }}
                        <span ></span>
                        <span ></span></label>
                    <select name="brand" id="brand" class="form-control select2" >
                        <option  selected disabled hidden >Select Brand</option>
                        @foreach($brands as $id => $brand)
                            <option value="{{ $id }}" {{ (in_array($id, old('brands', [])) || isset($series) && $series->brand->contains($id)) ? 'selected' : '' }} requried>{{ $brand }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('brand'))
                        <em class="invalid-feedback">
                            {{ $errors->first('brand') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.brand_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.series.fields.title') }}*</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($series) ? $series->title : '') }}" required>
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.title_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                    <label for="model">{{ trans('cruds.series.fields.model') }}*</label>
                    <input type="text" id="model" name="model" class="form-control" value="{{ old('model', isset($series) ? $series->model : '') }}" required>
                    @if($errors->has('model'))
                        <em class="invalid-feedback">
                            {{ $errors->first('model') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.model_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">{{ trans('cruds.series.fields.price') }}*</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price', isset($series) ? $series->price : '') }}" required>
                    @if($errors->has('price'))
                        <em class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.price_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('sku') ? 'has-error' : '' }}">
                    <label for="sku">{{ trans('cruds.series.fields.sku') }}*</label>
                    <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku', isset($series) ? $series->sku : '') }}" required>
                    @if($errors->has('sku'))
                        <em class="invalid-feedback">
                            {{ $errors->first('sku') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.sku_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity">{{ trans('cruds.series.fields.quantity') }}*</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', isset($series) ? $series->quantity : '') }}" required>
                    @if($errors->has('quantity'))
                        <em class="invalid-feedback">
                            {{ $errors->first('quantity') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.quantity_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('warranty') ? 'has-error' : '' }}">
                    <label for="warranty">{{ trans('cruds.series.fields.warranty') }}*</label>
                    {{-- <input type="text" id="warranty" name="warranty" class="form-control" value="{{ old('warranty', isset($series) ? $series->warranty : '') }}" required> --}}
                    <select id="warranty" name="warranty" class="form-control select2"  required>
                            <option selected disabled hidden> Select Warranty Type</option>
                            <option value="local">Local</option>
                            <option value="international">International</option>
                    </select>
                    @if($errors->has('warranty'))
                        <em class="invalid-feedback">
                            {{ $errors->first('warranty') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.warranty_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                    <label for="color">{{ trans('cruds.series.fields.color') }}
                        <span ></span>
                        <span ></span></label>
                    <select name="color" id="color" class="form-control select2" >
                        <option selected disabled hidden>Select Color</option>
                        @foreach($colors as $id => $color)
                            <option value="{{ $id }}" {{ (in_array($id, old('colors', [])) || isset($series) && $series->color->contains($id)) ? 'selected' : '' }}>{{ $color }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('color'))
                        <em class="invalid-feedback">
                            {{ $errors->first('color') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.color_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                    <label for="size">{{ trans('cruds.series.fields.size') }}
                        <span ></span>
                        <span ></span></label>
                    <select name="size" id="size" class="form-control select2" >
                        <option selected disabled hidden> Select Size </option>
                        @foreach($sizes as $id => $size)
                            <option value="{{ $id }}" {{ (in_array($id, old('size', [])) || isset($series) && $series->size->contains($id)) ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('size'))
                        <em class="invalid-feedback">
                            {{ $errors->first('size') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.size_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.series.fields.description') }}*</label>
                    {{-- <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($series) ? $series->description : '') }}" required> --}}
                    <textarea id="description" name="description" class="form-control" value="{{ old('description', isset($series) ? $series->description : '') }}"></textarea>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.description_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="image">{{ trans('cruds.series.fields.image') }}*</label>
                    <input type="file" id="imageUpload" name="image[]" multiple class="form-control" value="{{ old('image', isset($series) ? $series->image : '') }}" required>
                    @if($errors->has('image'))
                        <em class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.series.fields.image_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <img class="imgView" src="#" alt="your image" style="width: 100px;height: 100px;"/>
            </div>
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>
</div>
@endsection
@section('scripts')
@parent   
<script>
 $(document).ready(function() {

if(window.File && window.FileList && window.FileReader) {
   $("#files").on("change",function(e) {
       var files = e.target.files ,
       filesLength = files.length ;
       for (var i = 0; i < filesLength ; i++) {
           var f = files[i]
           var fileReader = new FileReader();
           fileReader.onload = (function(e) {
               var file = e.target;
               $("<img></img>",{
                   class : "imageThumb",
                   src : e.target.result,
                   title : file.name
               }).insertAfter("#files");
          });
          fileReader.readAsDataURL(f);
      }
 });
} else { alert("Your browser doesn't support to File API") }
});

</script>
@endsection