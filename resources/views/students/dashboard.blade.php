<!DOCTYPE html>
<html lang="en">
@section('title')
لوحه تحكم الطالب@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
preloader -->

    @include('layouts.main-header')

    @include('layouts.main-sidebar')

    <!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title" >
            <div class="row">
                <div class="col-sm-6" >
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">لوحة تحكم الطالب : {{auth()->user()->name}}</h4>
                </div><br><br>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        @php
            use App\Models\Student;
            $son =  auth()->guard('student')->user() @endphp
        <div class="d-flex justify-content-center mt-4">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="">
                    <div class="card text-black shadow-sm" style="border-radius: 12px;">
                        <img src="{{URL::asset('assets/images/my_son.png')}}" class="card-img-top" style="max-height:150px; object-fit:contain;"/>
                        <div class="card-body">
                            <div class="text-center">
                                <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{$son->name}}</h5>
                                <p class="text-muted mb-4">معلومات الطالب</p>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <span>المرحلة</span><span>{{$son->grade->name}}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>الصف</span><span>{{$son->classroom->name}}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>القسم</span><span>{{$son->section->name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <br>
        <div class="calendar-main mb-30">
            <livewire:calendar  />
        </div>
        <!--=================================
wrapper -->

        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>
<!--=================================
footer -->

@include('layouts.footer-scripts')
@livewireScripts
@stack('scripts')
</body>

</html>
