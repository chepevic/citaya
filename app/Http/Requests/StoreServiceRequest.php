<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return[
           'name'=>'required|string|max:255|regex:/^[\p{L}\p{N}\s\-\.\(\)]+$/u|unique:services',
           'description' => 'nullable|string|max:1000',
           'duration_minutes'=>'required|integer|between:5,480',
           'price'=>'required|numeric|decimal:0,2|min:0',
           'is_active'=>'boolean'
        ];
    }
}
