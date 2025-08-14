<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
            'Grade_id_new' => 'required',
            'Classroom_id_new' => 'required',
            'section_id_new' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'Grade_id.required' => '  الصف الدراسي الحالي مطلوب.',
            'Classroom_id.required' => '  الفصل الدراسي الحالي مطلوب.',
            'section_id.required' => '  القسم الحالي مطلوب.',
            'Grade_id_new.required' => '  الصف الدراسي الجديد مطلوب.',
            'Classroom_id_new.required' => '  الفصل الدراسي الجديد مطلوب.',
            'section_id_new.required' => '  القسم الجديد مطلوب.',
        ];
    }








}
