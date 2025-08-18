@extends('layouts.master')
@section('css')
    @section('title')
        قائمة الحضور والغياب للطلاب
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        قائمة الحضور والغياب للطلاب
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif



    <h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
    <form method="post" action="{{ route('attendence.store') }}">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">اسم الطالب</th>
                <th class="alert-success">البريد الاكتروني</th>
                <th class="alert-success">النوع</th>
                <th class="alert-success">المرحلة الدراسية</th>
                <th class="alert-success">الصف الدراسي</th>
                <th class="alert-success">القسم</th>
                <th class="alert-success">عمليات</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name_ar }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender  }}</td>
                    <td>{{ $student->grade->name }}</td>
                    <td>{{ $student->classroom->name  }}</td>
                    <td>{{ $student->section->name }}</td>
                    <td>

                        @if(isset($student->attendence()->where('attendence_date',date('Y-m-d'))->first()->student_id))

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendence()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 1 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="presence">
                                <span class="text-success">حضور</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendence()->where('attendence_date', date('Y-m-d'))->first()->attendence_status == 0 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="absent">
                                <span class="text-danger">غياب</span>
                            </label>

                        @else

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="presence">
                                <span class="text-success">حضور</span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="absent">
                                <span class="text-danger">غياب</span>
                            </label>

                        @endif

                        <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">تاكيد</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection
@section('js')

@endsection
