@extends('layouts.master')
@section('css')
@section('title')
    اضافة طالب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
اضافة طالب 
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('student.store') }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">المعلومات الشخصية</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم الطالب باللغة العربية : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اسم الطالب باللغة الانجليزية : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" value="{{old('name_en')}}"  type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البريد الاكتروني : </label>
                                    <input type="email"  name="email" value="{{old('email')}}" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>باسورد :</label>
                                    <input  type="password" name="password" value="{{old('password')}}" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">النوع : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="gender">
                                        <option selected disabled>اختار...</option>
                                            <option {{old('gender') == 'ذكر' ? 'selected' : ""}} value="ذكر">ذكر</option>
                                             <option {{old('gender') == 'انثي' ? 'selected' : ""}} value="انثي">انثي</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nal_id">الجنسية : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                        <option selected disabled>اختار...</option>
                                        @foreach($nationals as $nal)
                                            <option  value="{{ $nal->id }}">{{ $nal->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">فصيلة الدم : </label>
                                    <select class="custom-select mr-sm-2" name="blood_id">
                                        <option selected disabled>اختار...</option>
                                        @foreach($bloods as $bg)
                                            <option value="{{ $bg->id }}">{{ $bg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>تاريخ الميلاد  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">معلومات الطالب</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">مرحلة الدراسية : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>اختار...</option>
                                        @foreach($my_classes as $c)
                                            <option  value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">الصف الدراسي : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">القسم : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">ولي الامر : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>اختار...</option>
                                       @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name_father }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">السنة الدراسية : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>اختار...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ المعلومات</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var classroom_id = $(this).val();
                if (classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection