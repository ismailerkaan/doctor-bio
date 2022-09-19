<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'city_id' => 'required',
            'district_id' => 'required',
            'licance_start' => 'required',
            'licance_end' => 'required',
            'department_id' => 'required',
            'phone_number' => 'required'
        ];
    }
}
