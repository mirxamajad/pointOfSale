<?php

namespace App\Http\Requests;

use App\Accessories;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAccessoriesRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('accessories_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
