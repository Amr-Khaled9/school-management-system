<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>School</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>

<div class="wrapper">

    <!-- Preloader -->
    <div id="pre-loader">
        <img src="images/pre-loader/loader-01.svg" alt="">
    </div>

    <!-- Login Section -->
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url(assets/images/login-bg.jpg);">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">

                <!-- Left Image / Info -->
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-color:#0d1b2a; background-image:none;">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">مرحبا بك!</h2>
                        <p class="mb-20 text-white">
                            سجل الدخول للوصول إلى لوحة التحكم الخاصة بك.
                        </p>
                        <ul class="list-unstyled pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#">شروط الاستخدام</a></li>
                            <li class="list-inline-item"><a class="text-white" href="#">سياسة الخصوصية</a></li>
                        </ul>
                    </div>
                </div>



                <!-- Login Form -->
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        @php
                            $types = [
                                'web'   => 'الادمن',
                                'student' => 'الطالب',
                                'teacher' => 'المعلم',
                                'parent'  => 'ولي الامر',
                            ];
                        @endphp

                        <h3 class="mb-30">تسجيل دخول {{ $types[$type] ?? $type }}</h3>


                        <!-- عرض الأخطاء -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="type" value="{{ $type }}">

                            <div class="section-field mb-20">
                                <label class="mb-10" for="email">البريد الإلكتروني*</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="section-field mb-20">
                                <label style="color:  #0d1b2a" class="mb-10" for="password">كلمة المرور*</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="remember" id="remember"/>
                                    <label for="remember"> تذكرني</label>
                                    <a href="#" class="float-right">هل نسيت كلمة المرور؟</a>
                                </div>
                            </div>

                            <button class="button"><span>دخول</span><i class="fa fa-check"></i></button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>
</html>
