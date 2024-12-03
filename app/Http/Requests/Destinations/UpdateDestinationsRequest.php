<?php

namespace App\Http\Requests\Destinations;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationsRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'pricing' => 'required',
            'title' => 'required|string|max:255|unique:destinations,title,' . $id,
            'slug' => 'required|string|max:255|unique:destinations,slug,' . $id,
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'category' => 'required',
            'published_at' => 'required',
        ];
    }
}
