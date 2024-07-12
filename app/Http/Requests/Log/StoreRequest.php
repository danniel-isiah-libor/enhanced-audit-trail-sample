<?php

namespace App\Http\Requests\Log;

use App\Http\Requests\FormRequest;

class StoreRequest extends FormRequest
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
            'service' => [
                'required',
                'string'
            ],
            'merchant_uuid' => [
                'nullable',
                'uuid'
            ],
            'user_uuid' => [
                'nullable',
                'uuid'
            ],
            'user_type' => [
                'nullable',
                'string'
            ],
            'ip' => [
                'required',
                'string'
            ],
            'host' => [
                'required',
                'string'
            ],
            'path' => [
                'required',
                'string'
            ],
            'method' => [
                'required',
                'string'
            ],
            'headers' => [
                'required',
                'json'
            ],
            'payload' => [
                'nullable',
                'json'
            ],
            'response_time' => [
                'required',
                'numeric'
            ],
            'memory_usage' => [
                'required',
                'numeric'
            ],
            'memory_peak_usage' => [
                'required',
                'numeric'
            ],
            'status' => [
                'required',
                'numeric'
            ],
            'response' => [
                'nullable',
                'json'
            ],
            'exception' => [
                'nullable',
                'array'
            ],
            'exception.message' => [
                'nullable',
                'string'
            ],
            'exception.file' => [
                'nullable',
                'string'
            ],
            'exception.line' => [
                'nullable',
                'numeric'
            ],
            'exception.trace' => [
                'nullable',
                'string'
            ],
            'queries' => [
                'nullable',
                'array'
            ],
            'queries.*.query' => [
                'required',
                'string'
            ],
            'queries.*.time' => [
                'required',
                'numeric'
            ]
        ];
    }
}
