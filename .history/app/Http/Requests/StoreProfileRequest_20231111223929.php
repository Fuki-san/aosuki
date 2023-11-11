<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nickname' => 'required|string|max:50',
            'body' => 'required|string|max:2000',
            'image' => 'required|file|image|mimes:png,jpg',
            'hobby_name' => 'required|string|max:50',
            'dislike_name'=> 'required|string|max:100',
            'mbti_type' => 'required|string|max:50',
            'smoking_preference' => 'required|string|max:50',
            'distance_condition' => , 'geographic_condition'

        ];
    }
}
