<table style="width: 100%; margin-bottom: 20px;">
    <tr>
        <td style="width: 60%;">
            <h3 style="margin: 0;">{{ $pageTitle ?? 'Impressão' }}</h3>
            <small>
                Impresso por: {{ session('authNamePerson') }} <br>
                Data: {{ now()->format('d/m/Y H:i:s') }}
            </small>
        </td>
        <td style="text-align: right;">
            <img src="{{ asset('assets/media/logos/logo-h-black.svg') }}" alt="Logo" style="height: 30px;">
        </td>
    </tr>
</table>
<hr>
