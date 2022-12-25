<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'company_id' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'company_id.required' => 'Company Name is Required.',
            'f_name.required' => 'First Name is Required',
            'l_name.required' => 'Last Name is Required',
        ];
    }
  
}
