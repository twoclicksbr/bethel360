<div class="card-toolbar">
    @php
        $routeBase = explode('.', Route::currentRouteName())[0];
    @endphp

    <a href="{{ route($routeBase . '.create') }}" class="btn btn-sm btn-light-danger btn-active-danger me-2">
        <i class="ki-duotone ki-plus fs-1"></i>
        Novo Registro
    </a>

    <a id="btn-toggle-search" class="btn btn-sm btn-light-primary btn-active-primary me-2" data-bs-toggle="collapse"
        href="#searchPanel" role="button" aria-expanded="false" aria-controls="searchPanel">
        <i class="ki-duotone ki-search-list fs-1">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
        </i>
        Pesquisar
    </a>

    <a href="#" id="btn-print-global" class="btn btn-sm btn-icon btn-light-primary me-2">
        <i class="fas fa-print"></i>
    </a>

    {{-- Botão de ações em massa --}}
    <div class="ms-1">

        {{-- Botão principal com badge --}}
        <button id="btn-mass-actions" type="button"
            class="btn btn-sm btn-icon btn-light-danger btn-active-danger position-relative border-0 me-n3 me-2 opacity-0 transition"
            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="tooltip"
            data-bs-placement="right" title="Ações em massa">

            <i class="ki-outline ki-category fs-6"></i>

            <span id="badge-mass-count"
                class="position-absolute top-0 start-100 translate-middle bg-danger text-white fs-8 fw-bold rounded-circle d-flex align-items-center justify-content-center"
                style="width: 18px; height: 18px;">
                0
            </span>
        </button>

        {{-- Dropdown de ações --}}
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
            data-kt-menu="true">

            <div class="menu-item px-3">
                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Ações em massa</div>
            </div>

            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                <a href="#" class="menu-link px-3">
                    <span class="menu-title">Status</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="menu-sub menu-sub-dropdown w-175px py-4">

                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-sc360-action="public">
                            <i class="ki-duotone ki-eye me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            Tornar Público
                        </a>
                    </div>

                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-sc360-action="inactive">
                            <i class="ki-duotone ki-eye-slash me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                            Tornar Inativo
                        </a>
                    </div>

                </div>
            </div>

            <div class="separator my-2"></div>

            <div class="menu-item px-3 my-1">
                <a href="#" class="menu-link px-3 bg-light-danger text-danger" data-sc360-action="delete">
                    <i class="ki-outline ki-trash fs-2 me-2 text-danger"></i>
                    Excluir
                </a>
            </div>
        </div>
    </div>

</div>
