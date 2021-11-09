<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeriesRequest;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Series;
use App\Color;
use App\Brand;
use App\Size;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('series_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $series = Series::all();
        return view('admin.series.index', compact('series'));
    }
    public function create()
    {
        abort_if(Gate::denies('series_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $colors = Color::all()->pluck('title', 'id');
        $sizes = Size::all()->pluck('title', 'id');
        $brands = Brand::all()->pluck('name', 'id');
        return view('admin.series.create', compact('colors','sizes','brands'));
    }
    public function store(StoreSeriesRequest $request)
    {
        $product = Series::create($request->all());
        $product->color()->sync($request->input('color', []));
        $product->size()->sync($request->input('size', []));
        $product->brand()->sync($request->input('brand', []));
        return redirect()->route('admin.product.index');
    }
    public function edit(Series $series)
    {
        // dd($series);
        abort_if(Gate::denies('series_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $brands = Brand::all()->pluck('name','id');
        $colors = Color::all()->pluck('title', 'id');
        $sizes = Size::all()->pluck('title', 'id');
        $series->load('brand');
        $series->load('color');
        $series->load('size');
        return view('admin.series.edit', compact('series','brands','colors', 'sizes'));
    }

    public function update(UpdateSeriesRequest $request, Series $series)
    {
        $series->update($request->all());
        // $role->permissions()->sync($request->input('permissions', []));
        $series->color()->sync($request->input('color', []));
        $series->size()->sync($request->input('size', []));
        $series->brand()->sync($request->input('brand', []));
        return redirect()->route('admin.series.index');
    }
    public function show(Series $series)
    {
        abort_if(Gate::denies('series_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $series->load('brand');
        $series->load('color');
        $series->load('brand');
        return view('admin.series.show', compact('series'));
    }
    public function destroy(Series $series)
    {
        abort_if(Gate::denies('series_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $series->delete();
        return back();

    }
    public function massDestroy(MassDestroySeriesRequest $request)
    {
        Series::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
