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

{{-- localStorage  --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchPanel = document.getElementById('searchPanel');
        const btnToggle = document.getElementById('btn-toggle-search');
        const form = searchPanel?.querySelector('form');
        const btnSearch = form?.querySelector('button[type="submit"]');

        const pageKey = window.location.pathname;
        const stateKey = 'searchPanelState_' + pageKey;
        const formKey = 'searchPanelForm_' + pageKey;

        // Aplica estado salvo (painel aberto)
        if (localStorage.getItem(stateKey) === 'show') {
            new bootstrap.Collapse(searchPanel, {
                toggle: false
            }).show();
        }

        // Botão abre/fecha → salva estado
        btnToggle?.addEventListener('click', () => {
            setTimeout(() => {
                const isVisible = searchPanel.classList.contains('show');
                localStorage.setItem(stateKey, isVisible ? 'show' : 'hide');
            }, 200);
        });

        // Botão "Pesquisar" → salva campos e estado
        btnSearch?.addEventListener('click', () => {
            const data = {};
            form.querySelectorAll('input, select').forEach(el => {
                if (el.name) data[el.name] = $(el).val();
            });
            localStorage.setItem(formKey, JSON.stringify(data));

            const isVisible = searchPanel.classList.contains('show');
            localStorage.setItem(stateKey, isVisible ? 'show' : 'hide');
        });

        // Restaura campos salvos
        const savedData = localStorage.getItem(formKey);
        if (savedData && form) {
            const data = JSON.parse(savedData);
            Object.entries(data).forEach(([name, value]) => {
                const el = form.querySelector(`[name="${name}"]`);
                if (el) {
                    $(el).val(value).trigger('change');

                    if (name === 'search_date_range' && el._flatpickr) {
                        el._flatpickr.setDate(value.split(' a '));
                    }
                }
            });

            // ✅ Se URL está limpa, dispara submit automático
            if (!window.location.search) {
                form.submit();
            }
        }
    });
</script>




{{-- btn fechar painel --}}
<script>
    document.getElementById('btn-close-search')?.addEventListener('click', () => {
        const panel = bootstrap.Collapse.getOrCreateInstance(document.getElementById('searchPanel'));
        panel.hide();
        localStorage.setItem('searchPanelState_' + window.location.pathname, 'hide');
    });
</script>

{{-- Limpar campos localStorage --}}
<script>
    document.getElementById('btn-clear')?.addEventListener('click', () => {
        const form = document.getElementById('searchForm');
        form.querySelectorAll('input, select').forEach(el => {
            if (el.tagName === 'SELECT') el.selectedIndex = 0;
            else el.value = '';
        });

        // Limpa localStorage
        const pageKey = window.location.pathname;
        localStorage.removeItem('searchPanelForm_' + pageKey);

        // Submete o form limpo
        form.submit();
    });
</script>
