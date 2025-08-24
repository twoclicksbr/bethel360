{{-- resources/views/layout-avo/app.blade.php --}}
<!DOCTYPE html>
<html lang="pt-br">

@include('layout-avo.partials.head')

<body class="dark2">


    <!-- ==================== Start Loading ==================== -->

    {{-- <div id="preloader"></div> --}}

    <!-- ==================== End Loading ==================== -->



    <!-- ==================== Start progress-scroll-button ==================== -->

    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->



    <!-- ==================== Start cursor ==================== -->

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- ==================== End cursor ==================== -->



    <!-- ==================== Start Navbar ==================== -->

    @include('layout-avo.partials.navbar')

    <!-- ==================== End Navbar ==================== -->



    <!-- ==================== Start Slider ==================== -->

    @include('layout-avo.partials.header')

    <!-- ==================== End Slider ==================== -->



    <div class="main-content">

        @yield('content')

    </div>


    @include('layout-avo.partials.script')

</body>

</html>
