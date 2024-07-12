<?php

namespace App\Http\Requests\Log;

use App\Http\Requests\FormRequest;

class SearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */
    public function rules()
    {
        return [
            'correlation_id' => [
                'required',
                'uuid'
            ],
            'page' => [
                'nullable',
                'numeric'
            ]
        ];
    }
}
