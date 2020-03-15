<?php

namespace App\Http\Requests;

class StorePostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'published_at' => 'date|required',
            'photo' => 'image|required'
        ];
    }
}
