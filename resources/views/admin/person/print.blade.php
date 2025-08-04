<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Impressão de Pessoas</title>
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.svg') }}" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">
</head>

@include('admin.layouts.partials.print-css')

<body onload="window.print();">
    <div class="table-responsive">

        @include('admin.layouts.partials.print-header', ['pageTitle' => 'Listagem de Pessoas'])

        
        <table class="table table-bordered">
            <thead>
                <tr class="">
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Gênero</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($people as $person)
                    <tr class="">
                        <td>{{ $person['id'] }} - {{ $person['name'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($person['birthdate'])->format('d/m/Y') }}</td>
                        <td>{{ $person['gender']['name'] ?? '-' }}</td>
                        <td>{{ $person['active'] ? 'Ativo' : 'Inativo' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.layouts.partials.print-footer')

</body>

</html>
