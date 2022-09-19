<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|',
            'email' => 'required|email|unique:App\Models\Doctor,email',
            'phone_number' => 'required',
            'company_adress' => 'required|max:255',
            'company_name' => 'required',
            'department_id' => 'required',
            'district_id' => 'required',
            'city_id' => 'required',
            'password' => 'required|min:6',

        ];
    }
}
