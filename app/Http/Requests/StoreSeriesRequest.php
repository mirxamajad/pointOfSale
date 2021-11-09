<?php

namespace App\Http\Requests;

use App\Series;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreSeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('series_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
            'model' => [
                'required',
            ],
            'sku' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'quantity' => [
                'required',
            ],
            'warranty' => [
                'required',
            ],
        ];
    }
}
