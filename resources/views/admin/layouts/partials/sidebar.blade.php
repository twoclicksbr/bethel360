{{-- resources/views/layouts/partials/sidebar.blade.php --}}
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar py-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
        <!--begin::Toolbar container-->
        <div class="d-flex flex-column flex-row-fluid">
            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-center pt-1">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white fw-bold lh-1">
                        <a href="index.html" class="text-white text-hover-primary">
                            <i class="ki-outline ki-home text-gray-700 fs-6"></i>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white fw-bold lh-1">{{ $pageTitle ?? '' }}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar wrapper=-->
            <!--begin::Toolbar wrapper=-->
            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-13 pb-6">
                <!--begin::Page title-->
                <div class="page-title me-5">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-white fw-bold fs-2 flex-column justify-content-center my-0">
                        {{ $pageHeading ?? '' }}
                        <!--begin::Description-->
                        <span class="page-desc text-gray-600 fw-semibold fs-6 pt-3">
                            {!! $pageDescription ?? '' !!}
                        </span>
                        <!--end::Description-->
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Stats-->
                
                {{-- <div class="d-flex align-self-center flex-center flex-shrink-0">
                    <a href="#" class="btn btn-flex btn-sm btn-outline btn-active-color-primary btn-custom px-4"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                        <i class="ki-outline ki-plus-square fs-4 me-2"></i>Invite</a>
                    <a href="#" class="btn btn-sm btn-active-color-primary btn-outline btn-custom ms-3 px-4"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Set Your
                        Target</a>
                </div> --}}

                <!--end::Stats-->
            </div>
            <!--end::Toolbar wrapper=-->
        </div>
        <!--end::Toolbar container=-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->

<!--begin::Wrapper container-->
<div class="app-container container-xxl">
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->

            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
        <!--begin::Footer-->
        <div id="kt_app_footer"
            class="app-footer d-flex flex-column flex-md-row align-items-center flex-center flex-md-stack py-2 py-lg-4">
            <!--begin::Copyright-->
            <div class="text-gray-900 order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2025&copy;</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item">
                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                </li>
                <li class="menu-item">
                    <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                </li>
                <li class="menu-item">
                    <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?irgwc=1&clickid=Qb1XFm3dIxyIUCez3ZXf1X0mUks0kb3cC2sEUQ0&iradid=275988&irpid=1330466&iradtype=ONLINE_TRACKING_LINK&irmptype=mediapartner&mp_value1=&utm_campaign=af_impact_radius_1330466&utm_medium=affiliate&utm_source=impact_radius"
                        target="_blank" class="menu-link px-2">Purchase</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end:::Main-->
</div>
<!--end::Wrapper container-->
