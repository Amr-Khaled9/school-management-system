<!DOCTYPE html>
<html lang="en">

<head>
    <title>لوحة التحكم</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    @livewireStyles
</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

    @include('layouts.main-header')

    @include('layouts.main-sidebar')

    <!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">    لوحة تحكم المعلم : {{ auth()->guard('teacher')->user()->name ?? 'Guest' }}

                    </h4>
                    <br>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row" >
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">عدد الطلاب</p>
                                @php
                                    use App\Models\Teacher;
                                    $ids = Teacher::findorFail(auth()->guard('teacher')->user()->id)->Sections()->pluck('section_id')
                                @endphp
                                <h4>{{\App\Models\Student::whereIn('section_id',$ids)->count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('students.index')}}" target="_blank"><span class="text-danger">عرض البيانات</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">عدد الاقسام</p>

                                <h4>
                                    {{$ids->count()}}
                                </h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('sections')}}" target="_blank"><span class="text-danger">عرض البيانات</span></a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Orders Status widgets-->

         <div class="container mt-4">
            <div class="row">
                <!-- Chart 1 -->
                <div class="col-md-6">
                    <div class="card shadow p-3">
                        <h5 class="text-center">نتائج الطلاب</h5>
                        <canvas id="studentsChart"></canvas>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow p-3 text-center">
                        <h5 class="text-center">نسبة الحضور</h5>
                        <div style="max-width:250px; margin:0 auto;">
                            <canvas id="attendanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>


<!--=================================
footer -->
@livewireScripts
@stack('scripts')
@include('layouts.footer-scripts')

</body>

</html>
