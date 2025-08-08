@extends('admin.layouts.app')

@section('title', 'Central de Vidas | ' . config('app.title'))

@php
    $pageTitle = "Central de Vidas <i class='ki-duotone ki-right'></i> Alterar Registro"; // para o breadcrumb
    $pageHeading = ''; // para o título da página
    $pageDescription = ''; // para o título da página
    $module = 'person';
@endphp


@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="panel_{{ $module }}_form" class="form d-flex flex-column flex-lg-row">

            <div class="row">

                {{-- Esquerda --}}


                <div class="col-12 col-md-3 d-flex flex-column gap-7 gap-lg-10 mb-7 me-lg-10">

                    {{-- Avatar --}}
                    @include('admin.person.partials.form-avatar')

                    {{-- Status --}}
                    @include('admin.person.partials.form-status')


                </div>


                {{-- Direita --}}

                <div class="col-12 col-md-8 d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $tab === 'dados' ? 'active' : '' }}"
                                data-bs-toggle="tab" href="#panel_{{ $module }}_dados">
                                Dados
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $tab === 'address' ? 'active' : '' }}"
                                data-bs-toggle="tab" href="#panel_{{ $module }}_address">
                                Endereços
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        @include('admin.person.partials.panel-dados')

                        @include('admin.person.partials.panel-address')

                    </div>



                </div>

            </div>



        </div>
    </div>

@endsection

@include('admin.person.partials.script')
