<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'min: 2',
                'max: 50',
                'alpha',
            ],
            'second_name' => [
                'required',
                'string',
                'min: 2',
                'max: 50',
                'alpha',
            ],
            'third_name' => [
                'required',
                'string',
                'min: 2',
                'max: 50',
                'alpha',
            ],
            'birth_date' => [
                'required',
                'date',
                'before:today'
            ],
        ];
    }
}
