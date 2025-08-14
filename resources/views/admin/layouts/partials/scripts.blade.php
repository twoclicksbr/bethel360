<script>
    const rawPath = window.location.pathname.replace(/\/$/, '');
    const pathKey = rawPath.replaceAll('/', '_');
    const urlKey = 'grid_full_url_' + pathKey;
    const exceptPaths = ['/admin', '/admin/dashboard'];

    const hasParams = window.location.search.length > 0;
    const savedUrl = localStorage.getItem(urlKey);

    if (!hasParams && savedUrl && !exceptPaths.includes(rawPath)) {
        window.location.href = savedUrl;
    }
</script>


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

        // Estado do painel
        const savedState = localStorage.getItem(stateKey);
        savedState === 'show' ? collapse.show() : collapse.hide();

        // Botão abre/fecha
        btnToggleSearch?.addEventListener('click', () => {
            const isOpen = filterPanel.classList.contains('show');
            localStorage.setItem(stateKey, isOpen ? 'hide' : 'show');
            isOpen ? collapse.hide() : collapse.show();
        });

        // Botão fechar ❌
        btnCloseSearch?.addEventListener('click', () => {
            collapse.hide();
            localStorage.setItem(stateKey, 'hide');
        });

        // Botão limpar filtros
        btnClear?.addEventListener('click', (e) => {
            e.preventDefault();

            // Salva a URL sempre que houver mudança em qualquer filtro
            form?.querySelectorAll('input, select').forEach(el => {
                const name = el.name;
                if (!name) return;

                const saveUrl = () => {
                    const formUrl = new URL(window.location.origin + rawPath);
                    form.querySelectorAll('input, select').forEach(el2 => {
                        const name = el2.name;
                        if (!name) return;
                        const isCheckbox = el2.type === 'checkbox';
                        const val = isCheckbox ? (el2.checked ? 1 : '') : el2.value;
                        if (val !== '') {
                            formUrl.searchParams.set(name, val);
                        }
                    });

                    if (!formUrl.searchParams.has('sort')) {
                        formUrl.searchParams.set('sort', 'id');
                        formUrl.searchParams.set('direction', 'desc');
                    }

                    if (!formUrl.searchParams.has('paginate')) {
                        formUrl.searchParams.set('paginate', '10');
                    }

                    localStorage.setItem('grid_full_url_admin_person', formUrl.toString());
                };

                if (el.dataset.control === 'select2') {
                    $(el).on('select2:select', saveUrl);
                } else if (['checkbox', 'radio'].includes(el.type)) {
                    el.addEventListener('click', saveUrl);
                } else {
                    el.addEventListener('change', saveUrl);
                }
            });



            const defaultParams = '?sort=id&direction=asc&paginate=10';
            const fullDefaultUrl = window.location.origin + rawPath + defaultParams;

            localStorage.setItem(urlKey, fullDefaultUrl);
            localStorage.setItem(stateKey, 'hide');
            window.location.href = fullDefaultUrl;
        });

        // Submete o form e salva a URL completa
        form?.addEventListener('submit', (e) => {
            e.preventDefault();

            const formUrl = new URL(window.location.origin + rawPath);

            form.querySelectorAll('input, select').forEach(el => {
                const name = el.name;
                if (!name) return;
                const isCheckbox = el.type === 'checkbox';
                const val = isCheckbox ? (el.checked ? 1 : '') : el.value;

                if (val !== '') {
                    formUrl.searchParams.set(name, val);
                }
            });

            if (!formUrl.searchParams.has('paginate')) {
                formUrl.searchParams.set('paginate', '10');
            }

            localStorage.setItem(urlKey, formUrl.toString());
            window.location.href = formUrl.toString();
        });

        // Salva a URL completa ao clicar no botão Pesquisar (caso use botão)
        document.getElementById('btn-search')?.addEventListener('click', () => {
            const formUrl = new URL(window.location.origin + rawPath);

            form.querySelectorAll('input, select').forEach(el => {
                const name = el.name;
                if (!name) return;
                const isCheckbox = el.type === 'checkbox';
                const val = isCheckbox ? (el.checked ? 1 : '') : el.value;

                if (val !== '') {
                    formUrl.searchParams.set(name, val);
                }
            });

            if (!formUrl.searchParams.has('paginate')) {
                formUrl.searchParams.set('paginate', '10');
            }

            if (!formUrl.searchParams.has('sort')) {
                formUrl.searchParams.set('sort', 'id');
                formUrl.searchParams.set('direction', 'desc');
            }

            localStorage.setItem('grid_full_url_admin_person', formUrl.toString());
            window.location.href = formUrl.toString();
        });

        // Preenche os campos com a URL atual
        if (hasParams) {
            const params = new URLSearchParams(window.location.search);
            form?.querySelectorAll('select, input').forEach(el => {
                el.addEventListener('change', () => {
                    const formUrl = new URL(window.location.origin + rawPath);
                    form.querySelectorAll('input, select').forEach(el2 => {
                        const name = el2.name;
                        if (!name) return;
                        const isCheckbox = el2.type === 'checkbox';
                        const val = isCheckbox ? (el2.checked ? 1 : '') : el2.value;
                        if (val !== '') {
                            formUrl.searchParams.set(name, val);
                        }
                    });
                    localStorage.setItem('grid_full_url_admin_person', formUrl.toString());
                });
            });


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


<script>
    document.querySelectorAll('a[href*="sort="]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const finalUrl = this.href;
            localStorage.setItem('grid_full_url_admin_person', finalUrl);
            window.location.href = finalUrl;
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
{{-- <script>
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
</script> --}}



{{-- Exclui o registro do GRID --}}
<script>
    // Aguarda o carregamento completo do DOM antes de iniciar
    document.addEventListener('DOMContentLoaded', function() {

        // Seleciona todos os botões que possuem a classe .btn-delete
        document.querySelectorAll('.btn-delete').forEach(btn => {

            // Adiciona o evento de clique em cada botão de exclusão
            btn.addEventListener('click', function(e) {
                e.preventDefault(); // Impede comportamento padrão

                const id = this.dataset.id; // ID do registro a excluir
                const module = this.dataset
                    .module; // Nome do módulo (person, address, document...)
                const redirectUrl = this.dataset
                    .redirect; // URL opcional para redirecionar após excluir
                const apiUrl = "{{ env('APP_URL_API') }}"; // URL base da API definida no .env
                const authIdPerson =
                    {{ session('authIdPerson') ?? 'null' }}; // ID da pessoa logada

                // Regra: se o módulo for 'person', impedir que o usuário exclua o próprio registro
                if (module === 'person' && Number(id) === Number(authIdPerson)) {
                    alert('Você não pode excluir o seu próprio registro.');
                    return; // Interrompe a execução
                }

                // Exibe mensagem de confirmação antes de excluir
                if (!confirm('Tem certeza que deseja excluir este registro?')) return;

                // Faz requisição DELETE para o endpoint correspondente
                fetch(`${apiUrl}/admin/${module}/${id}`, {
                        method: 'DELETE', // Método HTTP DELETE
                        headers: {
                            'token': '{{ session('authToken') }}'
                        }, // Token de autenticação
                    })
                    .then(res => res.json()) // Converte resposta em JSON
                    .then(data => {
                        // Mostra mensagem de retorno da API ou mensagem padrão
                        alert(data.message || 'Registro excluído com sucesso.');
                        if (redirectUrl) {
                            window.location.href =
                                redirectUrl; // Redireciona se houver URL definida
                        } else {
                            location.reload(); // Recarrega a página se não houver redirect
                        }
                    })
                    .catch(() => {
                        // Caso haja erro na requisição, exibe mensagem
                        alert('Erro ao excluir o registro.');
                    });
            });

        });
    });
</script>








<script>
    // Espera o DOM ficar pronto
    document.addEventListener('DOMContentLoaded', function() {

        // Seleciona todos os botões de restaurar
        document.querySelectorAll('.btn-restore').forEach(btn => {

            // Adiciona o handler de clique por botão
            btn.addEventListener('click', function(e) {
                // Evita navegação padrão do elemento
                e.preventDefault();

                if (!confirm('Tem certeza que deseja restaurar este registro?'))
                    return; // Confirma a ação

                // ID do registro (vem do data-id do botão)
                const id = this.dataset.id;
                // Nome do módulo (data-module), ex.: person
                const module = this.dataset.module;

                // Chama a rota RESTORE da API
                fetch(`${APP_URL_API}/admin/${module}/${id}/restore`, {
                        // Método HTTP (restore via POST)
                        method: 'POST',
                        // Cabeçalhos da requisição
                        headers: {
                            // Tipo do corpo (não há body, mas é inofensivo)
                            'Content-Type': 'application/json',
                            // Token de autenticação da sessão
                            'token': '{{ session('authToken') }}'
                        }
                    })
                    // Converte a resposta em JSON
                    .then(res => res.json())
                    // Trata sucesso
                    .then(data => {
                        alert(data.message ||
                            'Registro restaurado com sucesso.'
                        ); // Mensagem da API ou padrão
                        // Recarrega a página para refletir a mudança
                        location.reload();
                    })
                    .catch(() => alert(
                        'Erro ao tentar restaurar.')); // Trata erro de requisição
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Aguarda todo o DOM ser carregado antes de executar o script.

        const activeTab = '{{ $tab ?? 'dados' }}';
        // Pega da variável Blade $tab qual aba deve ser ativada.
        // Se não existir, usa 'dados' como padrão.

        document.querySelectorAll('.tab-pane').forEach(p => {
            p.classList.remove('show', 'active');
        });
        // Remove as classes 'show' e 'active' de todas as abas de conteúdo,
        // garantindo que nenhuma fique aberta inicialmente.

        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
        });
        // Remove a classe 'active' de todos os links do menu de abas.

        const pane = document.querySelector('#panel_{{ $module }}_' + activeTab);
        // Monta o seletor do painel usando o módulo e a aba ativa
        // Exemplo: #panel_person_dados

        const link = document.querySelector('[href="#panel_{{ $module }}_' + activeTab + '"]');
        // Seleciona o link que aponta para o painel calculado acima.

        if (pane && link) {
            pane.classList.add('show', 'active');
            link.classList.add('active');
        }
        // Se encontrou o painel e o link correspondente,
        // adiciona as classes para exibir o conteúdo e marcar a aba como ativa.
    });
</script>


{{-- Consulta de CEP --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Aguarda o carregamento completo do DOM antes de executar.

        const cepInput = document.querySelector('[name="zipcode"]');
        // Seleciona o campo de input com o name="zipcode" (CEP).

        if (cepInput) {
            // Só continua se o campo de CEP existir na página.

            cepInput.addEventListener('blur', function() {
                // Adiciona evento para quando o campo perde o foco (blur).

                const cep = this.value.replace(/\D/g, '');
                // Remove qualquer caractere que não seja número do valor digitado.

                if (cep.length !== 8) {
                    // Se não tiver exatamente 8 dígitos, o CEP é inválido.
                    erroCep();
                    return;
                }

                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    // Faz uma requisição GET à API ViaCEP usando o CEP informado.
                    .then(res => res.json())
                    // Converte a resposta em JSON.
                    .then(data => {
                        if (data.erro) {
                            // Se o objeto retornado tiver a chave 'erro', o CEP não foi encontrado.
                            erroCep();
                        } else {
                            // Preenche automaticamente os campos de endereço com os dados da API.
                            document.querySelector('[name="street"]').value = data.logradouro || '';
                            document.querySelector('[name="neighborhood"]').value = data.bairro ||
                                '';
                            document.querySelector('[name="city"]').value = data.localidade || '';
                            document.querySelector('[name="state"]').value = data.uf || '';
                            document.querySelector('[name="country"]').value = 'Brasil';

                            // Limpa os campos de número e complemento, pois são preenchidos manualmente.
                            document.querySelector('[name="number"]').value = '';
                            document.querySelector('[name="complement"]').value = '';
                        }
                    })
                    .catch(() => erroCep());
                // Em caso de erro na requisição, chama erroCep().
            });
        }

        function erroCep() {
            // Função chamada quando o CEP é inválido ou não encontrado.
            alert('CEP inválido. Verifique e tente novamente.');
            limparCampos();
            // Foca novamente no campo de CEP após pequeno delay.
            setTimeout(() => {
                document.querySelector('[name="zipcode"]').focus();
            }, 10);
        }

        function limparCampos() {
            // Função que limpa todos os campos relacionados ao endereço.
            document.querySelector('[name="zipcode"]').value = '';
            document.querySelector('[name="street"]').value = '';
            document.querySelector('[name="neighborhood"]').value = '';
            document.querySelector('[name="city"]').value = '';
            document.querySelector('[name="state"]').value = '';
            document.querySelector('[name="country"]').value = '';
            document.querySelector('[name="number"]').value = '';
            document.querySelector('[name="complement"]').value = '';
        }
    });
</script>




{{-- Mascara de Campo --}}
<script>
    Inputmask({
        mask: "99999-999"
    }).mask("#input-zipcode");
</script>


{{-- Pula do campo zipcode para o campo number --}}
<script>
    Inputmask({
        mask: "99999-999"
    }).mask("#input-zipcode");

    document.getElementById('input-zipcode').addEventListener('blur', function() {
        document.getElementById('input-number').focus();
    });
</script>

{{-- Muda a label do campo active (genérico por container) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.form-check.form-switch').forEach(function(box) {
            const cb = box.querySelector('input.form-check-input[name="active"]');
            const lbl = box.querySelector('label.form-check-label');
            if (!cb || !lbl) return;

            // Atualiza o texto conforme o estado
            const update = () => {
                lbl.textContent = cb.checked ? 'Público' : 'Inativo';
            };
            cb.addEventListener('change', update);
            update();

            // Garante que clicar no texto alterna o switch, mesmo sem for/id corretos
            lbl.addEventListener('click', function(e) {
                e.preventDefault();
                cb.checked = !cb.checked;
                cb.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sel = document.getElementById('id_type_document');
        const input = document.getElementById('input-document-value');

        const isDigit = c => c === '9' || c === '#' || c === '0';

        function onlyDigits(s) {
            return (s || '').toString().replace(/\D/g, '');
        }

        function formatByMask(value, mask) {
            if (!mask) return value;
            const digits = onlyDigits(value);
            let out = '',
                di = 0;
            for (let i = 0; i < mask.length; i++) {
                const m = mask[i];
                if (isDigit(m)) {
                    if (di < digits.length) out += digits[di++];
                    else break;
                } else {
                    out += m;
                }
            }
            return out;
        }

        function applyMask({
            fromChange
        } = {
            fromChange: false
        }) {
            const opt = sel.selectedOptions[0];
            const mask = (opt && opt.dataset.mask || '').trim();

            // configurações visuais
            input.dataset.mask = mask;
            input.placeholder = mask || '';
            input.maxLength = mask ? mask.length : 524288;

            // NÃO limpar o campo; apenas reformatar o que já existe
            input.value = formatByMask(input.value, mask);
        }

        sel.addEventListener('change', () => applyMask({
            fromChange: true
        }));

        input.addEventListener('input', () => {
            const m = input.dataset.mask;
            if (m) input.value = formatByMask(input.value, m);
        });

        // Fallback para Select2
        if (window.jQuery && jQuery(sel).data('select2')) {
            jQuery(sel).on('select2:select select2:clear', () => sel.dispatchEvent(new Event('change')));
        }

        // init: preserva o valor vindo do Blade
        applyMask({
            fromChange: false
        });
    });
</script>
