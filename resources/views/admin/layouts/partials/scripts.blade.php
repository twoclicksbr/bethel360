<!-- Define a URL base para os assets -->
<script>
    var hostUrl = "assets/";
</script>

<!-- Importa o JS global obrigatório do Metronic -->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

<!-- Importa bibliotecas específicas usadas apenas nessa página -->
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

<!-- Scripts personalizados usados apenas nesta página -->
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

<!-- Tradução do Flatpickr para português -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>


<!-- Define variáveis globais com base no backend -->
<script>
    const APP_URL_API = "{{ env('APP_URL_API') }}";
    const authToken = "{{ session('authToken') }}";
</script>

<!-- Inicializa o campo de intervalo de datas (flatpickr) com formatação brasileira -->
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

<!-- Script para controle do painel de filtros (abrir, fechar, limpar, restaurar, salvar URL etc) -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rawPath = window.location.pathname.replace(/\/$/, '');
        const pathKey = rawPath.replaceAll('/', '_');
        const urlKey = 'grid_full_url_' + pathKey;
        const stateKey = 'searchPanelState_' + rawPath;
        const exceptPaths = ['/admin', '/admin/dashboard'];

        const form = document.getElementById('searchForm');
        const filterPanel = document.getElementById('searchPanel');
        const btnToggleSearch = document.getElementById('btn-toggle-search');
        const btnCloseSearch = document.getElementById('btn-close-search');
        const btnClear = document.getElementById('btn-clear');

        const hasParams = window.location.search.length > 0;
        const collapse = new bootstrap.Collapse(filterPanel, {
            toggle: false
        });

        // Aplicar estado salvo do painel
        const savedState = localStorage.getItem(stateKey);
        if (savedState === 'show') collapse.show();
        else collapse.hide();

        // Botão de abrir/fechar painel
        btnToggleSearch?.addEventListener('click', () => {
            const isOpen = filterPanel.classList.contains('show');

            if (isOpen) {
                localStorage.setItem(stateKey, 'hide'); // 👈 grava antes de esconder
                collapse.hide();
            } else {
                localStorage.setItem(stateKey, 'show'); // 👈 grava antes de mostrar
                collapse.show();
            }
        });


        // Botão ❌ fecha painel
        btnCloseSearch?.addEventListener('click', () => {
            collapse.hide();
            localStorage.setItem(stateKey, 'hide');
        });

        // Botão limpar filtros
        btnClear?.addEventListener('click', (e) => {
            e.preventDefault();
            form?.querySelectorAll('input, select').forEach(el => {
                if (el.type === 'checkbox') el.checked = false;
                else if (el.tagName === 'SELECT') el.selectedIndex = 0;
                else el.value = '';
            });

            const defaultParams = '?sort=name&direction=asc&paginate=10';
            localStorage.setItem(urlKey, defaultParams);
            localStorage.setItem(stateKey, 'hide');
            window.location.href = window.location.pathname + defaultParams;
        });

        // Submeter filtro
        form?.addEventListener('submit', () => {
            const formUrl = new URL(window.location.origin + rawPath);
            let hasFilters = false;

            form.querySelectorAll('input, select').forEach(el => {
                const name = el.name;
                if (!name) return;
                const isCheckbox = el.type === 'checkbox';
                const val = isCheckbox ? (el.checked ? 1 : '') : el.value;

                if (val !== '') {
                    formUrl.searchParams.set(name, val);
                    hasFilters = true;
                } else {
                    formUrl.searchParams.delete(name);
                }
            });

            if (hasFilters) {
                localStorage.setItem(urlKey, formUrl.search);
            } else {
                localStorage.removeItem(urlKey);
            }

            // Importante: grava estado como aberto
            const isOpen = filterPanel.classList.contains('show');


        });

        // Preencher filtros com base na URL
        if (hasParams) {
            const params = new URLSearchParams(window.location.search);
            form?.querySelectorAll('input, select').forEach(el => {
                const name = el.name;
                if (!name) return;
                const val = params.get(name);
                if (val !== null) {
                    if (el.type === 'checkbox') el.checked = val === '1';
                    else el.value = val;
                }
            });
        }

        // Redirecionar com filtros salvos (caso esteja limpo)
        if (!hasParams && !exceptPaths.includes(rawPath)) {
            const savedUrl = localStorage.getItem(urlKey);
            const current = new URL(window.location.href);
            let finalUrl;

            if (savedUrl) {
                const parsed = new URL(
                    savedUrl.startsWith('?') ?
                    window.location.origin + rawPath + savedUrl :
                    savedUrl
                );
                parsed.searchParams.set('paginate', '10');
                finalUrl = parsed.toString();
            } else {
                finalUrl = `${window.location.origin + rawPath}?sort=name&direction=asc&paginate=10`;
            }

            const target = new URL(finalUrl);
            const currentParams = new URLSearchParams(current.search);
            const targetParams = new URLSearchParams(target.search);

            const isSame = current.pathname === target.pathname && [...targetParams.entries()].every(([k, v]) =>
                currentParams.get(k) === v);

            if (!isSame) {
                window.location.href = finalUrl;
            }
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form[data-sc360-filter-form]');
        if (!form) return;

        form.querySelectorAll('select, input').forEach(field => {
            const name = field.name;
            const type = field.type;

            if (['search_id', 'search_name', 'search_date_type'].includes(name)) return;

            const submitForm = () => form.submit();

            if (field.dataset.control === 'select2') {
                // evento especial para select2
                $(field).on('select2:select', submitForm);
            } else if (['checkbox', 'radio'].includes(type)) {
                field.addEventListener('click', submitForm);
            } else {
                field.addEventListener('change', submitForm);
            }
        });
    });
</script>






<!-- Abre a impressão em nova aba com todos os dados -->
<script>
    // Aguarda o carregamento completo do DOM
    document.addEventListener('DOMContentLoaded', function() {
        // Busca o botão de impressão global
        const btn = document.getElementById('btn-print-global');

        // Se não encontrar o botão, encerra o script
        if (!btn) return;

        // Ao clicar no botão...
        btn.addEventListener('click', function(e) {
            e.preventDefault(); // Impede comportamento padrão do link ou botão

            // Captura o caminho atual da URL (ex: /admin/person)
            const currentPath = window.location.pathname;

            // Remove a barra final (se existir) e adiciona /print no final
            const base = currentPath.replace(/\/$/, '') + '/print';

            // Captura os parâmetros da URL atual (ex: ?sort=name)
            const query = new URLSearchParams(window.location.search);

            // Força a exibição de todos os registros na impressão
            query.set('paginate', 'all');

            // Monta a URL final de impressão com todos os filtros
            const finalUrl = base + '?' + query.toString();

            // Abre nova aba com a URL de impressão
            const win = window.open(finalUrl, '_blank');

            // Se o navegador bloqueou o pop-up, mostra alerta
            if (!win || win.closed || typeof win.closed === 'undefined') {
                alert('Por favor, permita pop-ups no seu navegador.');
            }
        });
    });
</script>



<!-- Exibe botão de ação em massa quando houver checkboxes marcados -->
<script>
    // Aguarda o carregamento do DOM
    document.addEventListener('DOMContentLoaded', function() {
        // Referência ao badge que mostra a contagem dos itens selecionados
        const badge = document.getElementById('badge-mass-count');

        // Botão que ativa as ações em massa
        const button = document.getElementById('btn-mass-actions');

        // Todos os checkboxes com atributo personalizado para seleção em massa
        const checkboxes = document.querySelectorAll('input[type="checkbox"][data-sc360-check]');

        // Checkbox do cabeçalho (seleciona todos)
        const checkAll = document.querySelector('input[data-kt-check="true"]');

        // Função que atualiza o estado visual do botão de ações em massa
        function updateMassButton() {
            // Conta quantos checkboxes estão marcados
            const total = Array.from(checkboxes).filter(cb => cb.checked).length;

            if (total > 0) {
                // Mostra o número de itens selecionados
                badge.textContent = total;
                badge.style.display = 'inline-block';

                // Torna o botão visível e interativo
                button.classList.add('d-inline-flex');
                button.classList.remove('opacity-0');
                button.style.pointerEvents = 'auto'; // ✅ permite clique e hover
            } else {
                // Esconde o badge
                badge.style.display = 'none';

                // Oculta o botão e desativa interações
                button.classList.add('opacity-0');
                button.style.pointerEvents = 'none'; // ✅ bloqueia clique e hover

                // Aguarda 200ms antes de remover o botão visualmente
                setTimeout(() => {
                    button.classList.remove('d-inline-flex');
                }, 200);
            }
        }

        // Atualiza o botão sempre que um checkbox for alterado
        checkboxes.forEach(cb => cb.addEventListener('change', updateMassButton));

        // Quando o checkbox do header for alterado...
        checkAll?.addEventListener('change', () => {
            // Seleciona todos os checkboxes filhos (linhas da tabela)
            const targets = document.querySelectorAll(checkAll.getAttribute('data-kt-check-target'));

            // Marca ou desmarca todos conforme o estado do header
            targets.forEach(cb => {
                cb.checked = checkAll.checked;
                cb.dispatchEvent(new Event('change')); // Força chamada do evento de atualização
            });
        });

        // Aplica a atualização no carregamento da página
        updateMassButton();
    });
</script>


<!-- Envia requisição de ação em massa para ativar/desativar/excluir -->
<script>
    // 🔁 Função principal que executa a ação em massa (ex: ativar, desativar, excluir)
    function sc360BatchAction({
        ids, // lista de IDs selecionados
        action, // tipo da ação: 'active', 'inactive', 'delete'
        token, // token de autenticação da API
        onSuccess // função opcional para executar após sucesso
    }) {
        // 🔒 Se faltar dados obrigatórios, não faz nada
        if (!ids.length || !action || !token) return;

        // ⚠️ Evita que o usuário altere ou exclua o próprio registro
        const authIdPerson = '{{ session('authIdPerson') }}';

        // 🧩 Descobre o módulo atual pela URL (ex: 'person', 'credential')
        const module = "{{ request()->segment(2) }}";

        // 🔗 Monta a URL da API para ação em massa
        const url = `{{ env('APP_URL_API') }}/admin/${module}/batch-status`;

        // ⛔ Se o ID logado estiver na lista, bloqueia a ação
        if (ids.includes(authIdPerson)) {
            alert('Você não pode alterar o status do seu próprio registro.');
            return;
        }

        // ✅ Exige confirmação apenas se for exclusão
        if (action === 'delete' && !confirm('Tem certeza que deseja excluir os registros selecionados?')) {
            return;
        }

        // 🚀 Envia requisição PUT para a API com os IDs e a ação
        fetch(url, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'token': token
                },
                body: JSON.stringify({
                    ids,
                    action
                })
            })
            .then(res => res.json()) // 🧾 Converte resposta para JSON
            .then(data => {
                // 👍 Se sucesso, executa função extra (se existir) ou recarrega a página
                if (data.status === true) {
                    if (typeof onSuccess === 'function') return onSuccess();
                    location.reload();
                } else {
                    // ❌ Se erro, mostra mensagem
                    alert(data.message || 'Erro ao executar ação.');
                }
            });
    }

    // 🟢 Busca todos os botões com atributo data-sc360-action
    document.querySelectorAll('[data-sc360-action]').forEach(button => {
        // ⏯ Ao clicar, coleta os IDs selecionados
        button.addEventListener('click', () => {
            const ids = Array.from(
                document.querySelectorAll('input[data-sc360-check]:checked')
            ).map(cb => cb.getAttribute('data-id'));

            // 🆔 Qual ação será executada (ex: delete, active)
            const action = button.getAttribute('data-sc360-action');

            // 🔐 Token de autenticação da sessão
            const token = '{{ session('authToken') }}';

            // 🚀 Chama a função principal
            sc360BatchAction({
                ids,
                action,
                token
            });
        });
    });
</script>

<!-- Exclui individualmente com confirmação e validação de não exclusão do próprio usuário -->
<script>
    // ⏳ Aguarda o carregamento completo da página
    document.addEventListener('DOMContentLoaded', function() {

        // 🆔 ID da pessoa logada (usado para impedir autoexclusão)
        const authIdPerson = {{ session('authIdPerson') ?? 'null' }};

        // 🔁 Seleciona todos os botões de exclusão com a classe .btn-delete
        document.querySelectorAll('.btn-delete').forEach(btn => {

            // 📌 Adiciona evento de clique para cada botão
            btn.addEventListener('click', function(e) {
                e.preventDefault(); // 🔒 Impede redirecionamento do link

                // 🎯 Pega o ID e o módulo (ex: person, credential) do botão clicado
                const id = this.dataset.id;
                const module = this.dataset.module;

                // ⛔ Impede que o usuário exclua o próprio registro
                if (parseInt(id) === authIdPerson) {
                    alert('Você não pode excluir o seu próprio registro.');
                    return;
                }

                // ⚠️ Confirmação de exclusão
                if (!confirm('Tem certeza que deseja excluir este registro?')) return;

                // 🚀 Envia requisição DELETE para a API
                fetch(`${APP_URL_API}/admin/${module}/${id}`, {
                        method: 'DELETE',
                        headers: {
                            token: '{{ session('authToken') }}' // 🔐 Token de segurança
                        },
                    })
                    .then(res => res.json()) // 📄 Converte resposta em JSON
                    .then(data => {
                        // ✅ Exibe mensagem e recarrega a página
                        alert(data.message || 'Registro excluído com sucesso.');
                        location.reload();
                    });
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-restore').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                if (!confirm('Tem certeza que deseja restaurar este registro?')) return;

                const id = this.dataset.id;
                const module = this.dataset.module;

                fetch(`${APP_URL_API}/admin/${module}/${id}/restore`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'token': '{{ session('authToken') }}'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message || 'Registro restaurado com sucesso.');
                        location.reload();
                    })
                    .catch(() => alert('Erro ao tentar restaurar.'));
            });
        });
    });
</script>
