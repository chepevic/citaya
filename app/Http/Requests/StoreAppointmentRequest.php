<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
        return [
            'client_id'=>'required',
            'professional_id'=>'required',
            'service_id'=>'required',
            'starts_at'=>'required',
            'ends_at'=>'required',
            'status'=>'string',
            'notes'=>'nullable|string|max:1000'

        ];
    }
}
