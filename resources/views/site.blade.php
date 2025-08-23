<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="igreja, bethel, bethel360, ministérios, célula, discipulado, voluntariado" />
    <meta name="description" content="Bethel360 - Plataforma de gestão integrada para igrejas" />
    <meta name="author" content="TwoClicks" />

    <!-- Title  -->
    <title>Bethel360° - Visão completa da sua Igreja</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('avo/img/favicon.svg') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('avo/css/plugins.css') }}" />

    <link rel="stylesheet" href="{{ asset('avo/css/tooltipster.bundle.min.css') }}" />

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('avo/css/style.css') }}" />

    {{-- Icones Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>


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



    <!-- ==================== Start Navgition ==================== -->

    @include('layouts.avo-header-home')

    <!-- ==================== End Navgition ==================== -->



    <!-- ==================== Start Slider ==================== -->

    <header class="slider showcase-full">
        <div class="swiper-container parallax-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="bg-img valign" data-background="{{ asset('avo/img/portfolio/full/1.jpg') }}"
                        data-overlay-dark="4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="caption">
                                        <h1 style="font-size: 7vw">
                                            <a href="#">
                                                <div class="stroke" data-swiper-parallax="-2000">MINISTÉRIOS</div>
                                                <span data-swiper-parallax="-5000">CONECTADOS</span>
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="bg-img valign" data-background="{{ asset('avo/img/portfolio/full/2.jpg') }}"
                        data-overlay-dark="4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="caption">
                                        <h1 style="font-size: 7vw">
                                            <a href="#">
                                                <div class="stroke" data-swiper-parallax="-2000">SERVINDO</div>
                                                <span data-swiper-parallax="-5000">COM PROPÓSITO</span>
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="bg-img valign" data-background="{{ asset('avo/img/portfolio/full/3.jpg') }}"
                        data-overlay-dark="4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="caption">
                                        <h1 style="font-size: 7vw">
                                            <a href="#">
                                                <div class="stroke" data-swiper-parallax="-2000">TRANSFORMANDO</div>
                                                <span data-swiper-parallax="-5000">VIDAS</span>
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- slider setting -->
            <div class="txt-botm">
                <div class="swiper-button-next swiper-nav-ctrl next-ctrl cursor-pointer">
                    <div>
                        <span class=" custom-font">Próximo Slide</span>
                    </div>
                    <div><i class="fas fa-chevron-right"></i></div>
                </div>
                <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl cursor-pointer">
                    <div><i class="fas fa-chevron-left"></i></div>
                    <div>
                        <span class=" custom-font">Slide Anterior</span>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination steps custom-font"></div>
        </div>
    </header>

    <!-- ==================== End Slider ==================== -->




    <!-- jQuery -->
    <script src="{{ asset('avo/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('avo/js/jquery-migrate-3.0.0.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('avo/js/plugins.js') }}"></script>


    <!-- custom scripts -->
    <script src="{{ asset('avo/js/scripts.js') }}"></script>


</body>

</html>
