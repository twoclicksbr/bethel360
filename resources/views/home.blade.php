{{-- resources/views/home.blade.php --}}
@extends('layout-avo.app')

@section('title', 'Início')

@section('content')

    <!-- ==================== Start Feat ==================== -->
    @include('layout-avo.partials.features')
    <!-- ==================== End Feat ==================== -->

    <!-- ==================== Start Services ==================== -->
    @include('layout-avo.partials.about')
    <!-- ==================== End Services ==================== -->

    <!-- ==================== Start Works ==================== -->
    @include('layout-avo.partials.portfolio')
    <!-- ==================== End Works ==================== -->

    <!-- ==================== Start Skills Circle ==================== -->
    @include('layout-avo.partials.skills')
    <!-- ==================== End Skills Circle ==================== -->

    <!-- ==================== Start Services ==================== -->
    @include('layout-avo.partials.services')
    <!-- ==================== End Services ==================== -->

    <!-- ==================== Start Testimonials ==================== -->
    {{-- @include('layout-avo.partials.testimonials') --}}
    <!-- ==================== End Testimonials ==================== -->

    <!-- ==================== Start clients Brands ==================== -->
    {{-- @include('layout-avo.partials.clients') --}}
    <!-- ==================== End clients Brands ==================== -->

    <!-- ==================== Start Blog ==================== -->
    {{-- @include('layout-avo.partials.blog') --}}
    <!-- ==================== End Blog ==================== -->

    <!-- ==================== Start call-to-action ==================== -->
    @include('layout-avo.partials.call-to-action')
    <!-- ==================== End call-to-action ==================== -->

    <!-- ==================== Start Footer ==================== -->
    @include('layout-avo.partials.footer')
    <!-- ==================== End Footer ==================== -->

@endsection
