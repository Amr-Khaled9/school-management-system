<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
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
            'name' => [
                'required',
             ],
            'grade_id' => 'required',
            'classroom_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الرجاء إدخال اسم القسم.',
            'name.unique' => 'اسم القسم موجود بالفعل.',
            'classroom_id.required' => 'اسم الصف مطلوب',
            'grade_id.required' => 'اسم المرحلة مطلوب'
        ];
    }
}
