{{-- resources/views/admin/layouts/partials/head.blade.php --}}

<head>
    <title>@yield('title', config('app.title'))</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Painel administrativo do Bethel360° com visão completa da igreja, membros, eventos e ministérios." />
    <meta name="keywords"
        content="igreja, bethel360, sistema, gestão, eventos, ministérios, discipulado, cursos, dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Bethel360° - Visão completa da sua Igreja" />
    <meta property="og:url" content="https://bethel360.test" />
    <meta property="og:site_name" content="Bethel360" />
    <link rel="canonical" href="https://bethel360.test" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.svg') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <!-- Vendor Stylesheets -->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Global Stylesheets -->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        if (window.top !== window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>


    
    
</head>
