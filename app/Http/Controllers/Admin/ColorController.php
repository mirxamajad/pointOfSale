<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyColorRequest;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Color;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ColorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }
    public function create()
    {
        abort_if(Gate::denies('color_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.color.create');
    }
    public function store(StoreColorRequest $request)
    {
        $color = Color::create($request->all());
        return redirect()->route('admin.color.index');
    }
    public function edit(Color $color)
    {
        abort_if(Gate::denies('color_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.color.edit', compact('color'));
    }
    public function update(UpdateColorRequest $request, Color $color)
    {
        $color->update($request->all());
        return redirect()->route('admin.color.index');
    }
    public function show(Color $color)
    {
        abort_if(Gate::denies('color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.color.show', compact('color'));
    }
    public function destroy(Color $color)
    {
        abort_if(Gate::denies('color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $color->delete();
        return back();

    }
    public function massDestroy(MassDestroyColorRequest $request)
    {
        Color::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
