<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:1',
            'grade_id'=>'required|integer',
            'classroom_id'=>'required|integer'
        ];
    }
     public function messages(): array{
        return [
            'name.required' => 'اسم القسم مطلوب',
            'name.unique'=> 'هذا القسم موجود مسبقا',
            'classroom_id.required'=>'اسم الصف مطلوب',
            'grade_id.required'=>'اسم المرحلة مطلوب'
        ];
    }
}
