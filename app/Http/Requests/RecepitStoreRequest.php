<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecepitStoreRequest extends FormRequest
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
            "debit" => 'required|numeric',
            "student_id" => "required",
        ];
    }
    public function messages()
    {
        return [
            "debit.required" => "  المبلغ (debit) مطلوب.",
            "debit.numeric"  => " المبلغ يجب أن يكون رقمًا.",
            "student_id.required" => "يجب اختيار الطالب.",
        ];
    }
}
