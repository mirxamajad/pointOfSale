<?php

namespace App\Http\Requests;

use App\Accessories;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAccessoriesRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('accessories_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:brand,id',
        ];

    }
}
