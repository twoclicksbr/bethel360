<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
{{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script> --}}

<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>

<!--end::Custom Javascript-->
<!--end::Javascript-->

{{-- Campo dt range da pesquisa --}}
<script>
    $("#kt_datepicker_7").flatpickr({
        altInput: true,
        altFormat: "d/M/y", // dois dígitos no ano
        dateFormat: "Y-m-d", // valor enviado ao backend
        mode: "range",
        locale: {
            ...flatpickr.l10ns.pt,
            rangeSeparator: " a " // 👈 separador personalizado
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const path = window.location.pathname;
        const pathKey = path.replaceAll('/', '_');
        const stateKey = 'searchPanelState_' + path;
        const urlKey = 'grid_full_url_' + pathKey;
        const exceptPaths = ['/admin', '/admin/dashboard']; // ⛔ páginas que NÃO devem restaurar localStorage

        const searchPanel = document.getElementById('searchPanel');
        const btnToggle = document.getElementById('btn-toggle-search');
        const btnClose = document.getElementById('btn-close-search');
        const btnClear = document.getElementById('btn-clear');
        const form = document.getElementById('searchForm');
        const btnSearch = form?.querySelector('button[type="submit"]');

        const url = new URL(window.location.href);
        const hasParams = url.search.length > 0;

        // 🔁 Aplica estado salvo (painel aberto/fechado)
        if (localStorage.getItem(stateKey) === 'show') {
            new bootstrap.Collapse(searchPanel, {
                toggle: false
            }).show();
        }

        // 🟢 Botão abrir/fechar painel
        btnToggle?.addEventListener('click', () => {
            setTimeout(() => {
                const isVisible = searchPanel.classList.contains('show');
                localStorage.setItem(stateKey, isVisible ? 'show' : 'hide');
            }, 200);
        });

        // 🟢 Botão fechar com "X"
        btnClose?.addEventListener('click', () => {
            const panel = bootstrap.Collapse.getOrCreateInstance(searchPanel);
            panel.hide();
            localStorage.setItem(stateKey, 'hide');
        });

        // 🟢 Botão "Limpar"
        btnClear?.addEventListener('click', () => {
            form.querySelectorAll('input, select').forEach(el => {
                if (el.tagName === 'SELECT') el.selectedIndex = 0;
                else el.value = '';
            });
            localStorage.removeItem(urlKey);
            form.submit();
        });

        // ✅ Salva URL completa ao enviar o form
        form?.addEventListener('submit', () => {
            const formUrl = new URL(window.location.origin + path);
            form.querySelectorAll('input, select').forEach(el => {
                const val = $(el).val();
                if (el.name && val) {
                    formUrl.searchParams.set(el.name, val);
                }
            });
            localStorage.setItem(urlKey, formUrl.toString());
        });

        // 🔁 Restaura URL salva, exceto se estiver nas páginas de exceção
        if (!hasParams && !exceptPaths.includes(path)) {
            const savedUrl = localStorage.getItem(urlKey);
            if (savedUrl) {
                window.location.href = savedUrl;
                return;
            }
            url.searchParams.set('sort', 'name');
            url.searchParams.set('direction', 'asc');
            window.location.href = url.toString();
        }

        // 🟢 Links de ordenação
        setTimeout(() => {
            document.querySelectorAll('a[href*="sort="]').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const url = new URL(link.href);

                    if (url.pathname === path) {
                        localStorage.setItem(urlKey, url.toString());
                        window.location.href = url.toString();
                    } else {
                        window.location.href = url.toString();
                    }
                });
            });
        }, 300);
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('btn-print-global');
        if (!btn) return;

        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const currentPath = window.location.pathname;
            const base = currentPath.replace(/\/$/, '') + '/print';
            const query = new URLSearchParams(window.location.search);
            query.set('paginate', 'all');

            const finalUrl = base + '?' + query.toString();
            const win = window.open(finalUrl, '_blank');

            if (!win || win.closed || typeof win.closed === 'undefined') {
                alert('Por favor, permita pop-ups no seu navegador.');
            }
        });
    });
</script>
