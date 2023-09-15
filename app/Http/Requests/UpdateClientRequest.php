<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'    => 'sometimes|string|max:50',
            'last_name'     => 'sometimes|string|max:50',
            'personal_id'   => 'sometimes|integer|digits:11',
            'phone'         => 'sometimes|required|integer|digits_between:9,12',
        ];
    }
}
