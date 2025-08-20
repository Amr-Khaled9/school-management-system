<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlineClassStoreRequest extends FormRequest
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
            "Grade_id" =>  'required|numeric',
            "Classroom_id" =>  'required|numeric',
            "section_id" => 'required|numeric',
            "topic" =>  'required|string',
            "start_time" => 'required',
            "duration" => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            "Grade_id.required" => "المرحلة مطلوبة",
            "Grade_id.numeric"  => "المرحلة يجب أن تكون رقم",

            "Classroom_id.required" => "الفصل مطلوب",
            "Classroom_id.numeric"  => "الفصل يجب أن يكون رقم",

            "section_id.required" => "القسم مطلوب",
            "section_id.numeric"  => "القسم يجب أن يكون رقم",

            "topic.required" => "عنوان الاجتماع مطلوب",
            "topic.string"   => "عنوان الاجتماع يجب أن يكون نص",

            "start_time.required" => "ميعاد بداية الاجتماع مطلوب",

            "duration.required" => "مدة الاجتماع مطلوبة",
            "duration.numeric"  => "مدة الاجتماع يجب أن تكون رقم",
        ];
    }

}
