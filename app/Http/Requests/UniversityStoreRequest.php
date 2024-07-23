<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversityStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'unique:universities,name',
                'string',
                'min: 2',
                'max: 50',
            ],
            'score' => [
                'required',
                'numeric',
                'max: 6',
            ],
        ];
    }
}
