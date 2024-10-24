<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'name' => ['required'], //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
