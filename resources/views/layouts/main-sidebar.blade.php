<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">لوحة التحكم</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">القائمة</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">المراحل
                                    الدراسية</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grade.index') }}">قائمة المراحل الدراسية</a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">الاقسام</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('section.index') }}">الاقسام الدراسة</a> </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span class="right-nav-text">الفصول</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('classroom.index') }}">الفصول الدراسية</a> </li>
                        </ul>
                    </li>

                    <!-- menu font icon-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">اولياء
                                    الامور</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ url('add_perent') }}">قائمة اولياء الامور</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">المعلمين</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('teacher.index') }}">قائمة المعلمين</a> </li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">الطلاب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('student.create')}}">اضافة طالب</a> </li>
                            <li> <a href="{{route('student.index')}}">قائمة الطلاب</a> </li>
                            <li> <a href="{{route('promotion.index')}}">ترقية الطلاب</a> </li>
                            <li> <a href="{{route('promotion.create')}}">ادارة ترقية الطلاب</a> </li>
                            <li> <a href="{{route('graduated.create')}}">اضافة خريج</a> </li>
                            <li> <a href="{{route('graduated.index')}}">الطلاب المتخرجين</a> </li>
                        </ul>
                    </li>
                     <!-- menu item Custom pages-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">حسابات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.index')}}">الرسوم الدراسية</a> </li>
                            <li> <a href="{{route('fees_invoice.index')}}">الفواتير</a> </li>
                            <li> <a href="{{route('receipt_student.index')}}">سندات القبض</a> </li>
                            <li> <a href="{{route('processing_fee.index')}}">استبعاد رسوم</a> </li>
                         </ul>
                    </li>
                    <!-- menu item Authentication-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">الحضور و الغياب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('attendence.index')}}">قائمة الطلاب</a></li>

                        </ul>
                    </li>
                    <!-- menu item maps-->
                    <li>
                        <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li>
                    <!-- menu item timeline-->
                    <li>
                        <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li>
                    <!-- menu item Multi level-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                                    level Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#login">Level
                                            item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                    data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                            class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li> <a href="#">level item 2.1</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
