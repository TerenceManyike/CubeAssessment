<?php

namespace App\Http\Requests;

use App\Models\Variant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVariantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('variant_edit');
    }

    public function rules()
    {
        return [
            'sap_product_code' => [
                'string',
                'nullable',
            ],
            'web_product_code' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
                'unique:variants',
            ],
        ];
    }
}
