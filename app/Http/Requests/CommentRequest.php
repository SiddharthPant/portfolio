<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'body' => ['required'],
            'html' => ['required'],
            'likes_count' => ['required'],
            'dislikes_count' => ['required'],
            'user_id' => ['required', 'exists:users'],
            'post_id' => ['required', 'exists:posts'], //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
