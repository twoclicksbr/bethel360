{{-- resources/views/admin/layouts/app.blade.php --}}

<script>
    (function () {
        const path = window.location.pathname;
        const pathKey = path.replaceAll('/', '_');
        const urlKey = 'grid_full_url_' + pathKey;
        const exceptPaths = ['/admin', '/admin/dashboard'];
        const url = new URL(window.location.href);
        const hasParams = url.search.length > 0;

        if (!hasParams && !exceptPaths.includes(path)) {
            const savedUrl = localStorage.getItem(urlKey);
            if (savedUrl) {
                window.location.replace(savedUrl);
            } else {
                url.searchParams.set('sort', 'name');
                url.searchParams.set('direction', 'asc');
                window.location.replace(url.toString());
            }
        }
    })();
</script>

<!DOCTYPE html>
<html lang="pt-br">
<!--begin::Head-->
@include('admin.layouts.partials.head')
<!--end::Head-->

<body id="kt_body" class="app-default">

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">

        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            <!--begin::Header-->
            @include('admin.layouts.partials.header')
            <!--end::Header-->

            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                <!--begin::Sidebar-->
                @include('admin.layouts.partials.sidebar')
                <!--end::Sidebar-->

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div class="app-container container-xxl">
                                @yield('content')
                            </div>
                        </div>

                        @include('admin.layouts.partials.footer')
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->

                </div>
                <!--end::Main-->
            </div>
            <!--end::Wrapper-->

        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    {{-- Modais padrão --}}
    @include('admin.layouts.partials.modals.upgrade-plan')
    @include('admin.layouts.partials.modals.invite-friends')
    @include('admin.layouts.partials.modals.new-target')
    @include('admin.layouts.partials.modals.create-app')
    @include('admin.layouts.partials.drawers.chat')

    {{-- Scrolltop --}}
    @include('admin.layouts.partials.scrolltop')

    {{-- Scripts --}}
    @include('admin.layouts.partials.scripts')

</body>
</html>
