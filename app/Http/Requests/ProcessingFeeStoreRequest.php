<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessingFeeStoreRequest extends FormRequest
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
            "Debit" => 'required',
            "student_id" => 'required',
            "final_balance" => 'required',
            "description" => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            "Debit.required" => "حقل المبلغ مطلوب.",
            "student_id.required" => "يجب اختيار الطالب.",
            "final_balance.required" => "حقل الرصيد النهائي مطلوب.",
            "description.nullable" => "حقل الوصف مطلوب.",
        ];
    }

}
