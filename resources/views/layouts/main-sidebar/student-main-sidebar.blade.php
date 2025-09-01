<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/student/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">الرئيسية</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">القائمة </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">المواد الدراسية</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('subject.index')}}">قائمة المواد</a> </li>

            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">المكتبة</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('library.index')}}">قائمة الكتب</a> </li>
            </ul>
        </li>
        <!-- Onlinec lasses-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">حصص اونلاين</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('online_class.index')}}"> Zoom حصص اونلاين مع </a> </li>
            </ul>
        </li>

        <!-- الامتحانات-->
        <li>
            <a href="{{route('exams.index')}} "><i class="fas fa-book-open"></i><span
                    class="right-nav-text">الامتحانات</span></a>
        </li>


        <!-- Settings-->
        <li>
            <a href=" {{route('profile.student')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">الملف الشخصي</span></a>
        </li>

    </ul>
</div>
