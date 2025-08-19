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


                <div class="col-12 col-md-3 d-flex flex-column gap-7 mb-7">

                    {{-- Avatar --}}
                    @include('admin.person.partials.form-avatar')

                    {{-- Status --}}
                    @include('admin.person.partials.form-status')


                </div>


                {{-- Direita --}}

                <div class="col-12 col-md-9 d-flex flex-column gap-7">

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

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {{ $tab === 'document' ? 'active' : '' }}"
                                data-bs-toggle="tab" href="#panel_{{ $module }}_document">
                                Documentos
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content w-100">

                        @if (session('error_document_value'))
                            <div class="alert alert-danger">{{ session('error_document_value') }}</div>
                        @endif
                        @if ($errors->document->any())
                            <div class="alert alert-danger">{{ $errors->document->first() }}</div>
                        @endif

                        @include('admin.person.partials.panel-dados')

                        @include('admin.person.partials.panel-address')

                        @include('admin.person.partials.panel-document')

                    </div>



                </div>

            </div>



        </div>
    </div>

@endsection

@push('scripts')
    @include('admin.person.partials.script-edit')
@endpush
