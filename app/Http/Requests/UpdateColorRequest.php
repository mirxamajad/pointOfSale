<?php

namespace App\Http\Requests;

use App\Color;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateColorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('color_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
        ];

    }
}
