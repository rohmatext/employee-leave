<?php

namespace App\Http\Requests\Employee;

use App\Enums\GenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255', 'alpha'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('employees')],
            'phone_number' => ['required', 'string', 'regex:/^(\\+62|62|0)[1-9]{1}[0-9]{8,11}$/'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', Rule::in(GenderEnum::values())],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
