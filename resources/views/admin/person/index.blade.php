@extends('admin.layouts.app')

@section('title', 'Central de Vidas | ' . config('app.title'))

@php
    $pageTitle = 'Central de Vidas'; // para o breadcrumb
    $pageHeading = 'Lista de Pessoas'; // para o título da página
    $pageDescription =
        'A Central de Vidas é o módulo responsável por cadastrar, organizar e gerenciar todas as pessoas da igreja, incluindo membros, visitantes, voluntários e líderes.'; // para o título da página
@endphp

@section('content')

    <div id="kt_app_content" class="flex-column-fluid">

        <!--begin::Tables Widget 9-->
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5 d-flex justify-content-between align-items-center">

                @include('admin.layouts.partials.btn-actions')

                @include('admin.layouts.partials.pagination-summary')

            </div>

            {{-- Filtros --}}
            <div class="collapse mt-4" id="searchPanel">
                <div class="bg-light p-5 px-md-10 py-md-7 position-relative rounded">

                    {{-- Título e botão X --}}
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <p class="bg-light text-gray-600 fs-5 mb-0">Filtros Avançados</p>

                        <button type="button" class="btn btn-sm btn-icon btn-light-danger" id="btn-close-search"
                            aria-label="Fechar" data-bs-toggle="tooltip" data-bs-placement="left" title="Fechar Pesquisa">
                            <i class="ki-outline ki-cross-square fs-2"></i>
                        </button>
                    </div>

                    <form id="searchForm" method="GET">

                        <input type="hidden" name="sort" value="{{ request('sort', 'name') }}">
                        <input type="hidden" name="direction" value="{{ request('direction', 'asc') }}">

                        @include('admin.layouts.partials.filter-base')
                        @include('admin.person.partials.filter')
                        @include('admin.layouts.partials.filter-base-btn', [
                            'route_cancel' => route('person.index'),
                            'route_clear' => route('person.index'),
                        ])

                    </form>
                </div>
            </div>

            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->


                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="w-25px">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" data-kt-check="true"
                                            data-kt-check-target=".widget-9-check" />
                                    </div>
                                </th>

                                @php
                                    $allParams = request()->all();

                                    $idParams = array_merge($allParams, [
                                        'sort' => 'id',
                                        'direction' =>
                                            request('sort') === 'id' && request('direction') === 'asc' ? 'desc' : 'asc',
                                    ]);

                                    $nameParams = array_merge($allParams, [
                                        'sort' => 'name',
                                        'direction' =>
                                            request('sort') === 'name' && request('direction') === 'asc'
                                                ? 'desc'
                                                : 'asc',
                                    ]);

                                    $birthdateParams = array_merge($allParams, [
                                        'sort' => 'birthdate',
                                        'direction' =>
                                            request('sort') === 'birthdate' && request('direction') === 'asc'
                                                ? 'desc'
                                                : 'asc',
                                    ]);

                                    $genderParams = array_merge($allParams, [
                                        'sort' => 'id_gender',
                                        'direction' =>
                                            request('sort') === 'id_gender' && request('direction') === 'asc'
                                                ? 'desc'
                                                : 'asc',
                                    ]);

                                    $statusParams = array_merge($allParams, [
                                        'sort' => 'active',
                                        'direction' =>
                                            request('sort') === 'active' && request('direction') === 'asc'
                                                ? 'desc'
                                                : 'asc',
                                    ]);

                                    $createdParams = array_merge($allParams, [
                                        'sort' => 'created_at',
                                        'direction' =>
                                            request('sort') === 'created_at' && request('direction') === 'asc'
                                                ? 'desc'
                                                : 'asc',
                                    ]);
                                @endphp

                                <th>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('person.index', $idParams) }}"
                                            class="text-muted fs-7 d-flex align-items-center gap-1 {{ request('sort') === 'id' ? 'fw-bold' : '' }}">
                                            ID
                                            @if (request('sort') === 'id')
                                                <i class="ki-duotone ki-double-{{ request('direction') === 'asc' ? 'up' : 'down' }} d-inline-block"
                                                    style="font-size: 1rem;">
                                                    <span class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span>
                                                </i>
                                            @endif
                                        </a>

                                        <span>|</span>

                                        <a href="{{ route('person.index', $nameParams) }}"
                                            class="text-muted fs-7 d-flex align-items-center gap-1 {{ request('sort') === 'name' ? 'fw-bold' : '' }}">
                                            Nome
                                            @if (request('sort') === 'name')
                                                <i class="ki-duotone ki-double-{{ request('direction') === 'asc' ? 'up' : 'down' }} d-inline-block"
                                                    style="font-size: 1rem;">
                                                    <span class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span>
                                                </i>
                                            @endif
                                        </a>
                                    </div>
                                </th>

                                <th style="width: 10%">
                                    <a href="{{ route('person.index', $birthdateParams) }}"
                                        class="text-muted fs-7 d-flex align-items-center gap-1 {{ request('sort') === 'birthdate' ? 'fw-bold' : '' }}">
                                        Data Nasc.
                                        @if (request('sort') === 'birthdate')
                                            <i class="ki-duotone ki-double-{{ request('direction') === 'asc' ? 'up' : 'down' }} d-inline-block"
                                                style="font-size: 1rem;">
                                                <span class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span>
                                            </i>
                                        @endif
                                    </a>
                                </th>

                                <th style="width: 10%">
                                    <a href="{{ route('person.index', $genderParams) }}"
                                        class="text-muted fs-7 d-flex align-items-center gap-1 {{ request('sort') === 'id_gender' ? 'fw-bold' : '' }}">
                                        Gênero
                                        @if (request('sort') === 'id_gender')
                                            <i class="ki-duotone ki-double-{{ request('direction') === 'asc' ? 'up' : 'down' }} d-inline-block"
                                                style="font-size: 1rem;">
                                                <span class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span>
                                            </i>
                                        @endif
                                    </a>
                                </th>

                                <th style="width: 10%">
                                    <a href="{{ route('person.index', $statusParams) }}"
                                        class="text-muted fs-7 d-flex align-items-center gap-1 {{ request('sort') === 'active' ? 'fw-bold' : '' }}">
                                        Status
                                        @if (request('sort') === 'active')
                                            <i class="ki-duotone ki-double-{{ request('direction') === 'asc' ? 'up' : 'down' }} d-inline-block"
                                                style="font-size: 1rem;">
                                                <span class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span>
                                            </i>
                                        @endif
                                    </a>
                                </th>

                                <th style="width: 5%">
                                    <a href="{{ route('person.index', $createdParams) }}"
                                        class="text-muted fs-7 d-flex align-items-center gap-1 {{ request('sort') === 'created_at' ? 'fw-bold' : '' }}">
                                        Datas
                                        @if (request('sort') === 'created_at')
                                            <i class="ki-duotone ki-double-{{ request('direction') === 'asc' ? 'up' : 'down' }} d-inline-block"
                                                style="font-size: 1rem;">
                                                <span class="path1"></span><span class="path2"></span><span
                                                    class="path3"></span>
                                            </i>
                                        @endif
                                    </a>
                                </th>

                                <th class="text-end" style="width: 5%">Ações</th>
                            </tr>
                        </thead>






                        <tbody class="text-gray-600 fw-semibold">
                            @forelse($people as $person)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px me-5">
                                                @if (!empty($person['avatar_url']))
                                                    <img src="{{ $person['avatar_url'] }}" alt="Avatar"
                                                        class="rounded" />
                                                @else
                                                    @php
                                                        $initial = mb_substr($person['name'], 0, 1);
                                                        $genderId = $person['id_gender'] ?? null;

                                                        $bgClass = match ($genderId) {
                                                            1 => 'bg-light-primary text-primary',
                                                            2 => 'bg-light-danger text-danger',
                                                            default => 'bg-light-info text-info',
                                                        };
                                                    @endphp

                                                    <span class="symbol-label {{ $bgClass }} fw-bold">
                                                        {{ $initial }}
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="{{ route('person.edit', base64_encode($person['id'])) }}"
                                                    class="text-gray-900 fw-bold text-hover-primary fs-6">
                                                    {{ $person['id'] . ' - ' . $person['name'] }}
                                                </a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">
                                                    Endereço, 25 - Bairro - Cidade / UF
                                                </span>
                                            </div>
                                        </div>
                                    </td>



                                    {{-- <td class="text-nowrap">
                                        <span class="badge badge-light-secondary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-trigger="hover"
                                            title="{{ \Carbon\Carbon::parse($person['birthdate'])->age }} anos">
                                            {{ $person['birthdate'] ? \Carbon\Carbon::parse($person['birthdate'])->format('d/m/Y') : '' }}
                                        </span>
                                    </td> --}}

                                    @php
                                        $birth = \Carbon\Carbon::parse($person['birthdate']);
                                        $tooltip =
                                            $birth->age >= 1
                                                ? $birth->age . ' ano' . ($birth->age > 1 ? 's' : '')
                                                : intval($birth->diffInMonths()) .
                                                    ' mês' .
                                                    ($birth->diffInMonths() > 1 ? 'es' : '');
                                    @endphp

                                    <td class="text-nowrap">
                                        <span class="badge badge-light-secondary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-trigger="hover focus"
                                            title="{{ $tooltip }}" tabindex="0">
                                            {{ $birth->format('d/m/Y') }}
                                        </span>
                                    </td>


                                    <td>
                                        <div class="d-flex justify-content-start flex-shrink-0">

                                            @php
                                                $genderBadgeColor = match ($person['id_gender'] ?? null) {
                                                    1 => 'primary',
                                                    2 => 'danger',
                                                    default => 'info',
                                                };
                                            @endphp

                                            <span class="badge badge-light-{{ $genderBadgeColor }}">
                                                {{ $person['gender']['name'] ?? '' }}
                                            </span>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-start flex-shrink-0">

                                            <span
                                                class="badge badge-light-{{ $person['active'] ? 'success' : 'danger' }}">
                                                {{ $person['active'] ? 'Público' : 'Inativo' }}
                                            </span>

                                        </div>
                                    </td>



                                    @php
                                        $created = \Carbon\Carbon::createFromFormat(
                                            'Y-m-d H:i:s',
                                            $person['created_at'],
                                        )->format('d/m/Y H:i:s');
                                        $updated = \Carbon\Carbon::createFromFormat(
                                            'Y-m-d H:i:s',
                                            $person['updated_at'],
                                        )->format('d/m/Y H:i:s');
                                    @endphp

                                    <td>
                                        <div class="d-flex justify-content-start flex-shrink-0">
                                            <a class="btn btn-icon btn-light btn-active-color btn-sm me-1" role="button"
                                                tabindex="0" data-bs-toggle="tooltip" data-bs-html="true"
                                                data-bs-placement="top" data-bs-trigger="hover focus"
                                                title="
                                                    <em>Criado em: </em><br> 
                                                    <b>{{ $created }}</b> <br><br> 
                                                    <em>Alterado em: </em><br> 
                                                    <b>{{ $updated }}</b>
                                                ">
                                                <i class="ki-outline ki-calendar"></i>
                                            </a>
                                        </div>
                                    </td>





                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">

                                            <a href="{{ route('person.edit', base64_encode($person['id'])) }}"
                                                class="btn btn-icon btn-light-warning btn-active-color btn-sm me-1"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                                                title="Editar">
                                                <i class="ki-outline ki-pencil fs-2"></i>
                                            </a>
                                            <a href="#"
                                                class="btn btn-icon btn-light-danger btn-active-color btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                                                title="Deletar">
                                                <i class="ki-outline ki-trash fs-2"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-10">
                                        Nenhuma pessoa encontrada.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                        <!--end::Table body-->
                    </table>

                    @include('admin.layouts.partials.pagination')

                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 9-->
    </div>

@endsection
