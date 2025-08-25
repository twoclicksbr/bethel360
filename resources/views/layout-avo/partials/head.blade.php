{{-- resources\views\layout-avo\partials\head.blade.php --}}

<head>

    <!-- Metadados Open Graph (WhatsApp / Facebook / Instagram) -->
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ asset('avo/img/logo-v-white-green.svg') }}" />
    <meta property="og:title" content="Bethel360° - Visão completa da sua Igreja" />
    <meta property="og:description"
        content="Bethel360° - A plataforma completa para gestão e expansão de igrejas locais e globais." />
    <meta property="og:url" content="{{ url()->current() }}" />

    <!-- Metadados HTML padrão -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords"
        content="igreja, bethel360°, bethel360, bethel ministério, célula, plataforma, sistema de igreja, discipulado, celebração">
    <meta name="description"
        content="Bethel360° - A plataforma completa para gestão e expansão de igrejas locais e globais.">
    <meta name="author" content="Bethel360°">


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

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('avo/css/style.css') }}" />

</head>
