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
                                <th class="">Nome</th>
                                <th class="" style="width: 10%">Data Nasc.</th>

                                <th class="" style="width: 10%">Gênero</th>
                                <th class="" style="width: 10%">Status</th>
                                <th class="" style="width: 5%">Datas</th>
                                <th class=" text-end" style="width: 5%">Ações</th>
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
                                                <img src="{{ asset('assets/media/avatars/300-14.jpg') }}" alt="" />
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
                                            data-bs-placement="top" data-bs-trigger="hover" title="{{ $tooltip }}">
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

                                            <span class="badge badge-light-{{ $person['active'] ? 'success' : 'danger' }}">
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
                                            <a href="#" class="btn btn-icon btn-light btn-active-color btn-sm me-1"
                                                data-bs-toggle="tooltip" data-bs-html="true"
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
                                            <a href="#" class="btn btn-icon btn-light-danger btn-active-color btn-sm"
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
