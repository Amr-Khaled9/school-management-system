@extends('layouts.master')
@section('css')
@section('title')
    تعديل الطالب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    تعديل الطالب
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

                <form action="{{ route('student.update', $student->id) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        معلومات شخصية</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم الطالب باللغة العربية: <span
                                        class="text-danger">*</span></label>
                                <input value="{{ $student->name_ar }}" type="text" name="name_ar"
                                    class="form-control">
                                <input type="hidden" name="id" value="{{ $student->id }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم الطالب باللغة الانجليزية : <span
                                        class="text-danger">*</span></label>
                                <input value="{{ $student->name_en }}" class="form-control" name="name_en"
                                    type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>البريد الكتروني : </label>
                                <input type="email" value="{{ $student->email }}" name="email" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>كلمة المرور :</label>
                                <input value="{{ $student->password }}" type="password" name="password"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">النوع : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender">
                                    <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                                    <option {{ old('gender') == 'ذكر' ? 'selected' : '' }} value="ذكر">ذكر</option>
                                    <option {{ old('gender') == 'انثي' ? 'selected' : '' }} value="انثي">انثي
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">الجنسية : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationalitie_id">
                                    <option selected disabled>اختار...</option>
                                    @foreach ($nationals as $nal)
                                        <option value="{{ $nal->id }}"
                                            {{ $nal->id == $student->nationalitie_id ? 'selected' : '' }}>
                                            {{ $nal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">فصيلة الدم : </label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected disabled>اختار...</option>
                                    @foreach ($bloods as $bg)
                                        <option value="{{ $bg->id }}"
                                            {{ $bg->id == $student->blood_id ? 'selected' : '' }}>{{ $bg->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>تاريخ الميلاد :</label>
                                <input class="form-control" type="text" value="{{ $student->date_birth }}"
                                    id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>

                    </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        معلومات الطالب</h6><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Grade_id">المرحلةالدراسية : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option {{$student->grade->name}}>اختار...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}"
                                            {{ $Grade->id == $student->grade_id ? 'selected' : '' }}>
                                            {{ $Grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Classroom_id">الفصل الدراسي : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id">
                                    <option value="{{ $student->classroom_id }}">
                                        {{ $student->classroom->name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">القسم : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{ $student->section_id }}"> {{ $student->section->name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">والده : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    <option selected disabled>اختار...</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}"
                                            {{ $parent->id == $student->parent_id ? 'selected' : '' }}>
                                            {{ $parent->name_father }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">سنه القبول : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>اختار...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}"
                                            {{ $year == $student->academic_year ? 'selected' : ' ' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">تعديل</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

<script>
    $(document).ready(function() {
        $('select[name="grade_id"]').on('change', function() {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Classroom_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Classroom_id"]').append(
                                '<option selected disabled >اختار...</option>'
                                );
                            $('select[name="Classroom_id"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('select[name="classroom_id"]').on('change', function() {
            var classroom_id = $(this).val();
            if (classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="section_id"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
