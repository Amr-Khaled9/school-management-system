@extends('layouts.master')
@section('css')
     @livewireStyles
    @section('title')
        إجراء اختبار
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        إجراء اختبار
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <h3>إجراء اختبار</h3>

    @livewire('show-question', ['student_id' => $student_id,'quizze_id' => $quizze_id])

@endsection
@section('js')

    @livewireScripts
@endsection
