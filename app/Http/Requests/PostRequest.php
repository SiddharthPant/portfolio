<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'body' => ['required'],
            'html' => ['required'],
            'published_at' => ['nullable', 'date'],
            'likes_count' => ['required', 'integer'],
            'dislikes_count' => ['required', 'integer'],
            'user_id' => ['required', 'exists:users'], //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
