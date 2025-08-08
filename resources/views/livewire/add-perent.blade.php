<div class="container my-4">

    {{-- رسالة النجاح --}}
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    {{-- بيانات الأب --}}
    <form wire:submit.prevent="submitForm">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white">
                بيانات الاب
            </div>
            <div class="card-body">

                <div class="form-row">
                    <div class="col">
                        <label for="title">البريد الاكتروني</label>
                        <input type="email" wire:model="Email" class="form-control">
                        @error('Email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">كلمة السر</label>
                        <input type="password" wire:model="Password" class="form-control">
                        @error('Password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title">اسم الاب</label>
                        <input type="text" wire:model="Name_Father" class="form-control">
                        @error('Name_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">وظيفة الاب</label>
                        <input type="text" wire:model="Job_Father" class="form-control">
                        @error('Job_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">رقم الهوية</label>
                        <input type="text" wire:model="National_ID_Father" class="form-control">
                        @error('National_ID_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">رقم جواز السفر</label>
                        <input type="text" wire:model="Passport_ID_Father" class="form-control">
                        @error('Passport_ID_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">رقم الهاتف</label>
                        <input type="text" wire:model="Phone_Father" class="form-control">
                        @error('Phone_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>



                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">اختيار الجنسية</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                            <option selected>اختار...</option>
                            @foreach ($Nationalities as $National)
                                <option value="{{ $National->id }}">{{ $National->name }}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Mother_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">فصيلة الدم</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father_id">
                            <option selected>اختار...</option>
                            @foreach ($Type_Bloods as $Type_Blood)
                                <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->name }}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Mother_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">الديانة</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                            <option selected>اختار...</option>
                            @foreach ($Religions as $Religion)
                                <option value="{{ $Religion->id }}">{{ $Religion->name }}</option>
                            @endforeach
                        </select>
                        @error('Religion_Mother_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>عنوان الاب</label>
                    <textarea wire:model="Address_Father" class="form-control" rows="3"></textarea>
                    @error('Address_Father')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </div>

        {{-- بيانات الأم --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white">
                بيانات الام
            </div>
            <br>
            <div class="card-body">

                <div class="form-row">
                    <div class="col">
                        <label for="title">اسم الام </label>
                        <input type="text" wire:model="Name_Mother" class="form-control">
                        @error('Name_Mother')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">وظيفة الام </label>
                        <input type="text" wire:model="Job_Mother" class="form-control">
                        @error('Job_Mother')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">رقم الهوية </label>
                        <input type="text" wire:model="National_ID_Mother" class="form-control">
                        @error('National_ID_Mother')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">رقم جواز السفر </label>
                        <input type="text" wire:model="Passport_ID_Mother" class="form-control">
                        @error('Passport_ID_Mother')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">رقم الهاتف </label>
                        <input type="text" wire:model="Phone_Mother" class="form-control">
                        @error('Phone_Mother')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">الجنسية</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                            <option selected>اختار...</option>
                            @foreach ($Nationalities as $National)
                                <option value="{{ $National->id }}">{{ $National->name }}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Mother_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">فصيلة الدم </label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Mother_id">
                            <option selected>اختار...</option>
                            @foreach ($Type_Bloods as $Type_Blood)
                                <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->name }}</option>
                            @endforeach
                        </select>
                        @error('Blood_Type_Mother_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">الديانة </label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                            <option selected>اختيار...</option>
                            @foreach ($Religions as $Religion)
                                <option value="{{ $Religion->id }}">{{ $Religion->name }}</option>
                            @endforeach
                        </select>
                        @error('Religion_Mother_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">عنوان الام</label>
                    <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('Address_Mother')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        {{-- تأكيد --}}
        <div class="col-md-12"><br>
            <label style="color: red">ادخل المرفقات (اختياري)</label>
            <div class="form-group">
                <input type="file" wire:model="photos" accept="image/*" multiple>
            </div>
            <br>

            <input type="hidden" wire:model="Parent_id">
        </div>
        <button type="submit" class="btn btn-success btn-lg">إضافة</button>
    </form>
</div>
</div>
