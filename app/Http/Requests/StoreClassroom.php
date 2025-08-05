<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassroom extends FormRequest
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
            'List_Classes.*.name' => 'required',
            'List_Classes.*.grade_id' => 'required|exists:grades,id',
        ];
    }
    public function messages()
    {
        return [
            'List_Classes.*.name.required' => 'اسم الصف مطلوب',
            'List_Classes.*.grade_id.required' => 'المرحلة مطلوبة',
            'List_Classes.*.grade_id.exists' => 'المرحلة غير صحيحة',
        ];
    }
}
