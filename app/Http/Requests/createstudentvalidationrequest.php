<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class createstudentvalidationrequest extends FormRequest
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
            'name'=>'required',
            'country_id'=>'required',
            'nutionalID'=>'required',
            'phones'=>'required',

            'active'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'حقل الاسم مطلوب',
            'country_id.required'=>'حقل الدولة مطلوب',
            'nutionalID.required'=>'حقل الرقم القومي مطلوب',
            'phones.required'=>'حقل الهاتف مطلوب',
            'active.required'=>'حقل الحالة مطلوب'
        ];
    }
}
