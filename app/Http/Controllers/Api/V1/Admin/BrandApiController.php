<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBrandRequest;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\Admin\BrandResource;
use App\Brand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new BrandResource(Brand::with(['category'])->get());
    }
    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->all());
        $brand->category()->sync($request->input('category', []));
        return (new BrandResource($brand))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
    public function show(Brand $brand)
    {
        abort_if(Gate::denies('brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new BrandResource($brand->load(['category']));
    }
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());
        $brand->category()->sync($request->input('category', []));
        return (new BrandResource($brand))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
    public function destroy(Brand $brand)
    {
        abort_if(Gate::denies('Brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $brand->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
