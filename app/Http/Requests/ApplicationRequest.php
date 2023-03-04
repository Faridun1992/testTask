<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'type' => ['required', 'integer', 'in:1,2'],
            'price_from' => ['required', 'numeric', 'min:0'],
            'price_to' => ['required', 'numeric', 'min:'.$this->input('price_from')]
        ];
    }
}
