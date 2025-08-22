<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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

         "school_name" => "required",
         "current_session" => "required",
         "school_title" => "required",
         "phone" => "required",
         "school_email" => "required|email",
         "address" => "required",
         "end_first_term" => "required",
         "end_second_term" => "required",
         "logo"=> 'nullable' ,
        ];
    }
    public function messages(): array
    {
        return [
            "school_name.required"     => "اسم المدرسة مطلوب.",
            "current_session.required" => "العام الدراسي الحالي مطلوب.",
            "school_title.required"    => "عنوان المدرسة مطلوب.",
            "phone.required"           => "رقم الهاتف مطلوب.",
            "school_email.required"    => "البريد الإلكتروني مطلوب.",
            "school_email.email"       => "يجب إدخال بريد إلكتروني صالح.",
            "address.required"         => "العنوان مطلوب.",
            "end_first_term.required"  => "تاريخ نهاية الترم الأول مطلوب.",
            "end_second_term.required" => "تاريخ نهاية الترم الثاني مطلوب.",
            "logo.nullable"            => "يمكن ترك شعار المدرسة فارغاً.",
        ];
    }

}
