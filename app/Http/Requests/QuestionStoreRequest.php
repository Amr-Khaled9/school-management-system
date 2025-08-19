<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
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
            "title" => "required|string",
            "answers" => "required|string",
            "right_answer" => "required|string",
            "quizze_id" => "required|numeric",
            "score" => "required|numeric",
        ];
    }
    public function messages(): array
    {
        return [
            "title.required" => "حقل العنوان مطلوب.",
            "title.string"   => "حقل العنوان يجب أن يكون نص.",

            "answers.required" => "حقل الإجابات مطلوب.",
            "answers.string"   => "حقل الإجابات يجب أن يكون نص.",

            "right_answer.required" => "حقل الإجابة الصحيحة مطلوب.",
            "right_answer.string"   => "حقل الإجابة الصحيحة يجب أن يكون نص.",

            "quizze_id.required" => "يجب اختيار الاختبار.",
            "quizze_id.numeric"  => "حقل الاختبار يجب أن يكون رقم.",

            "score.required" => "حقل الدرجة مطلوب.",
            "score.numeric"  => "حقل الدرجة يجب أن يكون رقم.",
        ];
    }

}
