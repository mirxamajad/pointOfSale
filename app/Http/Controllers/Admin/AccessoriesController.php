<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAccessoriesRequest;
use App\Http\Requests\StoreAccessoriesRequest;
use App\Http\Requests\UpdateAccessoriesRequest;
use App\Accessories;
// use App\Color;
use App\Brand;
use App\Size;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('accessories_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $accessories = Accessories::all();
        $accessories = array( );
        return view('admin.accessories.index', compact('accessories'));
    }
    public function create()
    {
        abort_if(Gate::denies('accessories_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $colors = Color::all()->pluck('title', 'id');
        $sizes = Size::all()->pluck('title', 'id');
        $brands = Brand::all()->pluck('name', 'id');
        return view('admin.accessories.create', compact('sizes','brands'));
    }
}
