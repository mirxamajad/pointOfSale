<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBrandRequest;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Brand;
use App\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        abort_if(Gate::denies('brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.brand.create',compact('categories'));
    }
    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->all());
        $brand->category()->sync($request->input('category', []));
        return redirect()->route('admin.brand.index');
    }
    public function edit(Brand $brand)
    {
        abort_if(Gate::denies('brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = Category::all()->pluck('name', 'id');
        $brand->load('category');
        return view('admin.brand.edit', compact('brand','category'));
    }
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());
        $brand->category()->sync($request->input('category', []));
        return redirect()->route('admin.brand.index');
    }
    public function show(Brand $brand)
    {
        abort_if(Gate::denies('brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.brand.show', compact('brand'));
    }
    public function destroy(Brand $brand)
    {
        abort_if(Gate::denies('brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $brand->delete();
        return back();

    }

    public function massDestroy(MassDestroyBrandRequest $request)
    {
        Brand::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
