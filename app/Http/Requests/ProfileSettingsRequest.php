<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSettingsRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'department'=>'required',
            'about'=>'required',
            'description'=>'required',
            'city'=>'required',
            'discricts'=>'required',
            'company_name'=>'required',
            'company_adress'=>'required',
        ];
    }
}
