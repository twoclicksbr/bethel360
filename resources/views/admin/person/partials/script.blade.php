<script>
    const authIdPerson = {{ session('authIdPerson') }};
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('avatarInput');
        const form = document.getElementById('avatarForm');
        const wrapper = document.querySelector('.image-input-wrapper');
        const btnRemove = document.querySelector('[data-kt-image-input-action="remove"]');
        const btnCancel = document.querySelector('[data-kt-image-input-action="cancel"]');
        const personId = '{{ $person['id'] }}';

        // Buscar avatar atual
        fetch(`{{ config('app.url_api') }}/admin/person/${personId}/avatar`, {
                headers: {
                    'token': '{{ session('authToken') }}'
                }
            })
            .then(async res => {
                const isJson = res.headers.get('content-type')?.includes('application/json');
                const data = isJson ? await res.json() : await res.text();

                if (res.ok && data.avatar_url) {
                    wrapper.style.backgroundImage = `url(${data.avatar_url})`;
                    if (btnRemove) btnRemove.style.display = 'inline-block';
                } else {
                    wrapper.style.backgroundImage = 'url(/assets/media/svg/files/blank-image.svg)';
                    if (btnRemove) btnRemove.style.display = 'none';
                }
            });

        // Upload de avatar
        if (input && form) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                if (!file) return;

                if (file.size > 3 * 1024 * 1024) {
                    alert('A imagem não pode ter mais que 3MB.');
                    this.value = '';
                    return;
                }

                const formData = new FormData(form);
                formData.append('avatar', file);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'token': '{{ session('authToken') }}'
                        },
                        body: formData
                    })
                    .then(async res => {
                        const isJson = res.headers.get('content-type')?.includes(
                            'application/json');
                        const data = isJson ? await res.json() : await res.text();

                        if (!res.ok) {
                            console.error('Erro HTTP:', res.status, data);
                            alert('Erro ao enviar avatar.');
                            return;
                        }

                        if (data.avatar_url) {
                            const avatarUrl = data.avatar_url + '?t=' + new Date().getTime();
                            wrapper.style.backgroundImage = `url(${avatarUrl})`;
                            if (btnRemove) btnRemove.style.display = 'inline-block';

                            if (parseInt(personId) === parseInt(authIdPerson)) {
                                // TOPO
                                const topo = document.querySelector(
                                    '#kt_header_user_menu_toggle > div.symbol');
                                if (topo) {
                                    topo.innerHTML = '';
                                    const img = document.createElement('img');
                                    img.className =
                                        'symbol symbol-circle symbol-35px symbol-md-40px';
                                    img.src = avatarUrl;
                                    img.alt = 'user';
                                    topo.appendChild(img);
                                }

                                // DROPDOWN
                                const dropdown = document.querySelector('.symbol-50px');
                                if (dropdown) {
                                    dropdown.innerHTML = '';
                                    const img = document.createElement('img');
                                    img.src = avatarUrl;
                                    img.alt = 'avatar';
                                    dropdown.appendChild(img);
                                }

                                fetch('/admin/person/avatar/refresh')
                                    .then(() => console.log('Avatar atualizado na sessão.'));
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Erro no envio:', error);
                        alert('Erro ao enviar avatar.');
                    });
            });
        }

        // Remoção de avatar
        if (btnRemove) {
            btnRemove.addEventListener('click', function() {
                if (!confirm('Tem certeza que deseja remover o avatar?')) return;

                fetch(`{{ config('app.url_api') }}/admin/person/${personId}/avatar`, {
                        method: 'DELETE',
                        headers: {
                            'token': '{{ session('authToken') }}'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status) {
                            wrapper.style.backgroundImage =
                                'url(/assets/media/svg/files/blank-image.svg)';
                            if (btnRemove) btnRemove.style.display = 'none';

                            if (parseInt(personId) === parseInt(authIdPerson)) {
                                document.querySelectorAll('img[src*="avatar"]').forEach(img => img
                                    .remove());

                                const letra =
                                    '{{ strtoupper(substr(session('authNameFirst'), 0, 1)) }}';
                                const cor =
                                    '{{ match (session('authIdGender')) {
                                        1 => 'primary',
                                        2 => 'danger',
                                        default => 'info',
                                    } }}';

                                const alvoTopo = document.querySelector(
                                    '#kt_header_user_menu_toggle > div.symbol');
                                if (alvoTopo) {
                                    alvoTopo.innerHTML = '';
                                    const span = document.createElement('span');
                                    span.className =
                                        `symbol-label symbol-circle symbol-35px symbol-md-40px bg-light-${cor} text-${cor} fw-bold`;
                                    span.textContent = letra;
                                    alvoTopo.appendChild(span);
                                }

                                const dropdown = document.querySelector('.symbol-50px');
                                if (dropdown) {
                                    dropdown.innerHTML = '';
                                    const spanDropdown = document.createElement('span');
                                    spanDropdown.className =
                                        `symbol-label bg-light-${cor} text-${cor} fw-bold`;
                                    spanDropdown.textContent = letra;
                                    dropdown.appendChild(spanDropdown);
                                }

                                fetch('/admin/person/avatar/refresh')
                                    .then(() => console.log('Avatar removido da sessão.'));
                            }
                        } else {
                            alert(data.message || 'Erro ao remover avatar.');
                        }
                    });
            });
        }

        // Cancelar upload de avatar (restaura visual atual)
        if (btnCancel) {
            btnCancel.addEventListener('click', function() {
                setTimeout(() => {
                    fetch(`{{ config('app.url_api') }}/admin/person/${personId}/avatar`, {
                            headers: {
                                'token': '{{ session('authToken') }}'
                            }
                        })
                        .then(async res => {
                            const isJson = res.headers.get('content-type')?.includes(
                                'application/json');
                            const data = isJson ? await res.json() : await res.text();

                            if (res.ok && data.avatar_url) {
                                wrapper.style.backgroundImage =
                                    `url(${data.avatar_url}?t=${new Date().getTime()})`;
                                if (btnRemove) btnRemove.style.display = 'inline-block';
                            } else {
                                wrapper.style.backgroundImage =
                                    'url(/assets/media/svg/files/blank-image.svg)';
                                if (btnRemove) btnRemove.style.display = 'none';
                            }
                        });
                }, 300);
            });
        }
    });
</script>
