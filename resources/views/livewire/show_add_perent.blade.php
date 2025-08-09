@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
@section('title')
    اولياء الامور
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@livewireStyles
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> اولياء الامور</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">#</a></li>
                <li class="breadcrumb-item active">اضافة ولي الامر</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                    <livewire:add_perent /> 
            </div>
        </div>
    </div>
</div>
  @livewireScripts
<!-- row closed -->
@endsection
@section('js')

@endsection
