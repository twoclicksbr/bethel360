@extends('admin.layouts.app')

@section('title', 'Central de Vidas | ' . config('app.title'))

@php
    $pageTitle = 'Central de Vidas > Novo Registro'; // para o breadcrumb
    $pageHeading = ''; // para o título da página
    $pageDescription = ''; // para o título da página
    $module = 'person';
@endphp


@section('content')

    <div id="kt_app_content" class="app-content flex-column-fluid">

        <div id="panel_{{ $module }}_form" class="form d-flex flex-column flex-lg-row">

            {{-- Esquerda --}}
            

            {{-- Direita --}}
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#panel_{{ $module }}_dados">
                            Dados
                        </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="panel_{{ $module }}_dados" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">


                            <form action="{{ route('person.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="active" value="1" />

                                <div class="card card-flush py-4">

                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Dados</h2>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0 pb-0">

                                        @include('admin.person.partials.form-fields')

                                        @include('admin.layouts.partials.form-btn-footer', [
                                            'routeCancel' => route('person.index'),
                                        ])

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
