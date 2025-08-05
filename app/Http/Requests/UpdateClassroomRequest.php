<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClassroomRequest extends FormRequest
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
        // dd($this->route('classroom'));
    return [
        'name' => [
            'required',
            Rule::unique('classrooms', 'name')->ignore($this->route('classroom')), // تجاهل الصف الحالي
        ],
        'grade_id' => 'required|exists:grades,id',
    ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الرجاء إدخال اسم الصف.',
            'name.unique' => 'اسم الصف موجود بالفعل.',
        ];
    }
}
