<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateteacherRequest extends FormRequest
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
            "email" => [
                'required',
                'email',
                Rule::unique('teachers', 'email')->ignore($this->route('teacher')),
            ],
            "password" => 'required',
            "name" => 'required|string|min:2',
            "specialization_id" => 'required|integer',
            "gender" => 'required|string|min:2',
            "joining_date" => 'required',
            "address" => 'required'
        ];
    }
    public function messages()
    {
        return [
            "email.required" => 'البريد الاكتروني مطلوب',
            "email.email" => 'يجب عليك ادخال البريد الاكتروني بصيغته',
            "email.unique" => "البريد الاكتروني موجود بالفعل",
            'password.required' => 'كلمه السر مطلوبة',
            'name.required' => 'اسم المعلم مطلوب',
            'name.min' => 'لا يقل عن 3 احرف',
            'gender.required' => "النوع مطلوب",
            'specialization_id.required' => 'التخصص مطلوب',
            'specialization_id.integer' => 'التخصص رقم',
            "joining_date.required" => 'تاريخ الانتضمام مطلوب',
            "address.required" => 'العنوان مطلوب'
        ];
    }
}
