@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('global.create') }} {{ trans('cruds.accessories.title_singular') }}
</h6>
<div class="mT-30">
    <form action="{{ route("admin.accessories.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row"> 
            <div class="col-lg-12">
                <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                    <label for="brand">{{ trans('cruds.accessories.fields.brand') }}
                        <span ></span>
                        <span ></span></label>
                    <select name="brand" id="brand" class="form-control select2" >
                        <option  selected disabled hidden >Select Brand</option>
                        @foreach($brands as $id => $brand)
                            <option value="{{ $id }}" {{ (in_array($id, old('brands', [])) || isset($accessories) && $accessories->brand->contains($id)) ? 'selected' : '' }} requried>{{ $brand }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('brand'))
                        <em class="invalid-feedback">
                            {{ $errors->first('brand') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.brand_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.accessories.fields.title') }}*</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($accessories) ? $accessories->title : '') }}" required>
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.title_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                    <label for="model">{{ trans('cruds.accessories.fields.model') }}*</label>
                    <input type="text" id="model" name="model" class="form-control" value="{{ old('model', isset($accessories) ? $accessories->model : '') }}" required>
                    @if($errors->has('model'))
                        <em class="invalid-feedback">
                            {{ $errors->first('model') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.model_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label for="price">{{ trans('cruds.accessories.fields.price') }}*</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price', isset($accessories) ? $accessories->price : '') }}" required>
                    @if($errors->has('price'))
                        <em class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.price_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('sku') ? 'has-error' : '' }}">
                    <label for="sku">{{ trans('cruds.accessories.fields.sku') }}*</label>
                    <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku', isset($accessories) ? $accessories->sku : '') }}" required>
                    @if($errors->has('sku'))
                        <em class="invalid-feedback">
                            {{ $errors->first('sku') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.sku_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity">{{ trans('cruds.accessories.fields.quantity') }}*</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', isset($accessories) ? $accessories->quantity : '') }}" required>
                    @if($errors->has('quantity'))
                        <em class="invalid-feedback">
                            {{ $errors->first('quantity') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.quantity_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('warranty') ? 'has-error' : '' }}">
                    <label for="warranty">{{ trans('cruds.accessories.fields.warranty') }}*</label>
                    {{-- <input type="text" id="warranty" name="warranty" class="form-control" value="{{ old('warranty', isset($accessories) ? $accessories->warranty : '') }}" required> --}}
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
                        {{ trans('cruds.accessories.fields.warranty_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('spacification') ? 'has-error' : '' }}">
                    <label for="spacification">{{ trans('cruds.accessories.fields.spacification') }}*</label>
                    <input type="text" id="spacification" name="spacification" class="form-control" value="{{ old('spacification', isset($accessories) ? $accessories->spacification : '') }}" required>
                    @if($errors->has('spacification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('spacification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.spacification_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="image">{{ trans('cruds.accessories.fields.image') }}*</label>
                    <input type="file" id="imageUpload" name="image[]" multiple class="form-control" value="{{ old('image', isset($accessories) ? $accessories->image : '') }}" required>
                    @if($errors->has('image'))
                        <em class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.image_helper') }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">{{ trans('cruds.accessories.fields.description') }}*</label>
                    {{-- <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($accessories) ? $accessories->description : '') }}" required> --}}
                    <textarea id="description" name="description" class="form-control" value="{{ old('description', isset($accessories) ? $accessories->description : '') }}"></textarea>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.accessories.fields.description_helper') }}
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