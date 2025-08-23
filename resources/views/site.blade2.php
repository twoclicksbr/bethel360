@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">

        <div class="mb-0" id="home">

            @php
                $desktop = [
                    'assets/media/banners/landing1.jpg',
                    'assets/media/banners/landing2.jpg',
                    'assets/media/banners/landing3.jpg',
                ];
                $mobile = [
                    'assets/media/banners/landing1-m.jpg',
                    'assets/media/banners/landing2-m.jpg',
                    'assets/media/banners/landing3-m.jpg',
                ];
                $d = asset($desktop[array_rand($desktop)]);
                $m = asset($mobile[array_rand($mobile)]);
            @endphp

            <style>
                .hero-landing {
                    background-image: var(--hero-bg);
                }

                @media (max-width: 576px) and (orientation: portrait) {
                    .hero-landing {
                        background-image: image-set(url("{{ $d }}") 1x, url("{{ $d }}") 2x);
                    }

                    @media (max-width:576px) and (orientation:portrait) {
                        .hero-landing {
                            background-image: image-set(url("{{ $m }}") 1x, url("{{ $m }}") 2x);
                        }
                    }

                }
            </style>

            <div class="position-relative bgi-no-repeat bgi-size-cover bgi-position-center landing-dark-bg mb-0 hero-landing min-vh-100"
                style="--hero-bg: url('{{ $d }}'); min-height: 720px;">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background:rgba(0,0,0,.35)"></div>
                <div class="position-relative">
                    @include('layouts.header')
                    @include('layouts.banner')
                </div>
            </div>

        </div>

        @include('layouts.section-about')

        {{-- @include('layouts.section-achievements') --}}

        {{-- @include('layouts.section-team') --}}

        {{-- @include('layouts.section-project') --}}

        @include('layouts.section-price')

        {{-- @include('layouts.section-testimony') --}}

        @include('layouts.footer')

    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
@endsection
