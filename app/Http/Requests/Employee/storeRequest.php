<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            "empolyee_id" => "required",
            "name" => "required",
            "phone" => "required",
            "email" => "required",
            "nrc_number" => "required",
            "gender" => "required",
            "birthday" => "required",
            "address" => "required",
            "department_id" => "required",
            "password" => "required",
            "date_of_join" => "required",
            "is_present" => "required",
        ];
    }
}
