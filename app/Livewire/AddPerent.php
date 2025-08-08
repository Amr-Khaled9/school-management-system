<?php

namespace App\Livewire;

use App\Models\PerentAttachment;
use Livewire\Component;
use App\Models\MyPerent;
use App\Models\Religion;
use App\Models\Type_Blood;
use App\Models\Nationalitie;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class AddPerent extends Component
{
     use WithFileUploads;
    public $Email,$successMessage='';
    public  $Password,
        $Name_Father,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // Mother_INPUTS
        $Name_Mother, 
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id ,$Parent_id,$photos;


    public function rules()
    {
        return [
            'Email' => 'required',
            'Password' => 'required',
            'Name_Father' => 'required',
            'Job_Father' => 'required',
            'National_ID_Father' => 'required',
            'Passport_ID_Father' => 'required',
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',

            'Name_Mother' => 'required',
            'National_ID_Mother' => 'required',
            'Passport_ID_Mother' => 'required',
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Email.required' => 'البريد الإلكتروني مطلوب.',
            'Email.email' => 'يجب إدخال بريد إلكتروني صالح.',
            'Password.required' => 'كلمة المرور مطلوبة.',

            // بيانات الأب
            'Name_Father.required' => 'اسم الأب مطلوب.',
            'Name_Father_en.required' => 'اسم الأب بالإنجليزية مطلوب.',
            'Job_Father.required' => 'وظيفة الأب مطلوبة.',
            'National_ID_Father.required' => 'الرقم القومي للأب مطلوب.',
            'National_ID_Father.min' => 'الرقم القومي للأب يجب أن يكون 10 أرقام.',
            'National_ID_Father.max' => 'الرقم القومي للأب يجب أن يكون 10 أرقام.',
            'National_ID_Father.regex' => 'الرقم القومي للأب يجب أن يحتوي على أرقام فقط.',
            'Passport_ID_Father.required' => 'رقم جواز السفر للأب مطلوب.',
            'Passport_ID_Father.min' => 'رقم جواز السفر للأب يجب أن يكون 10 أرقام على الأقل.',
            'Passport_ID_Father.max' => 'رقم جواز السفر للأب يجب أن يكون 10 أرقام على الأكثر.',
            'Phone_Father.required' => 'رقم هاتف الأب مطلوب.',
            'Phone_Father.regex' => 'رقم هاتف الأب غير صحيح.',
            'Phone_Father.min' => 'رقم هاتف الأب يجب أن يحتوي على 10 أرقام على الأقل.',
            'Nationality_Father_id.required' => 'الجنسية للأب مطلوبة.',
            'Blood_Type_Father_id.required' => 'فصيلة دم الأب مطلوبة.',
            'Religion_Father_id.required' => 'ديانة الأب مطلوبة.',
            'Address_Father.required' => 'عنوان الأب مطلوب.',

            // بيانات الأم
            'Name_Mother.required' => 'اسم الأم مطلوب.',
            'Name_Mother_en.required' => 'اسم الأم بالإنجليزية مطلوب.',
            'National_ID_Mother.required' => 'الرقم القومي للأم مطلوب.',
            'National_ID_Mother.min' => 'الرقم القومي للأم يجب أن يكون 10 أرقام.',
            'National_ID_Mother.max' => 'الرقم القومي للأم يجب أن يكون 10 أرقام.',
            'National_ID_Mother.regex' => 'الرقم القومي للأم يجب أن يحتوي على أرقام فقط.',
            'Passport_ID_Mother.required' => 'رقم جواز السفر للأم مطلوب.',
            'Passport_ID_Mother.min' => 'رقم جواز السفر للأم يجب أن يكون 10 أرقام على الأقل.',
            'Passport_ID_Mother.max' => 'رقم جواز السفر للأم يجب أن يكون 10 أرقام على الأكثر.',
            'Phone_Mother.required' => 'رقم هاتف الأم مطلوب.',
            'Phone_Mother.regex' => 'رقم هاتف الأم غير صحيح.',
            'Phone_Mother.min' => 'رقم هاتف الأم يجب أن يحتوي على 10 أرقام على الأقل.',
            'Job_Mother.required' => 'وظيفة الأم مطلوبة.',
            'Job_Mother_en.required' => 'وظيفة الأم بالإنجليزية مطلوبة.',
            'Nationality_Mother_id.required' => 'الجنسية للأم مطلوبة.',
            'Blood_Type_Mother_id.required' => 'فصيلة دم الأم مطلوبة.',
            'Religion_Mother_id.required' => 'ديانة الأم مطلوبة.',
            'Address_Mother.required' => 'عنوان الأم مطلوب.',
        ];
    }



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submitForm()
    {
        // dd(';slfdl;sfdmlgvmsdflgmlsdfglkrfnmgfsd');
       $this->validate();

        $My_Parent = new MyPerent();

        // بيانات الأب
        $My_Parent->Email = $this->Email;
        $My_Parent->Password = Hash::make($this->Password);
        $My_Parent->name_father = $this->Name_Father;
        $My_Parent->job_father = $this->Job_Father;
        $My_Parent->national_id_father = $this->National_ID_Father;
        $My_Parent->passport_id_father = $this->Passport_ID_Father;
        $My_Parent->phone_father = $this->Phone_Father;
        $My_Parent->nationality_father_id = $this->Nationality_Father_id;
        $My_Parent->blood_type_father_id = $this->Blood_Type_Father_id;
        $My_Parent->religion_father_id = $this->Religion_Father_id;
        $My_Parent->address_father = $this->Address_Father;

        // بيانات الأم
        $My_Parent->name_mother = $this->Name_Mother;
        $My_Parent->job_mother = $this->Job_Mother;
        $My_Parent->national_id_mother = $this->National_ID_Mother;
        $My_Parent->passport_id_mother = $this->Passport_ID_Mother;
        $My_Parent->phone_mother = $this->Phone_Mother;
        $My_Parent->nationality_mother_id = $this->Nationality_Mother_id;
        $My_Parent->blood_type_mother_id = $this->Blood_Type_Mother_id;
        $My_Parent->religion_mother_id = $this->Religion_Mother_id;
        $My_Parent->address_mother = $this->Address_Mother;

        $My_Parent->save();

        if(!empty($this->photos)){
            foreach ($this->photos as $photo) {
                 $photo->storeAs($this->National_ID_Father,$photo->getClientOriginalName(),$disk ='parent_attachments');

                 PerentAttachment::created([
                    'file_name' => $photo->getClientOriginalName(),
                    'perent_id'=> MyPerent::latest()->first()->id

                 ]);
            }
        }


        toastr()->success( 'تم حفظ البيانات بنجاح');

        
 
        $this->reset();
    }



    public function render()
    {
        return view('livewire.add-perent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all()

        ]);
    }
}
