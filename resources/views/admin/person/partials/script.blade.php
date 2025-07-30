<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('avatarInput');
        const form = document.getElementById('avatarForm');
        const wrapper = document.querySelector('.image-input-wrapper');
        const btnRemove = document.querySelector('[data-kt-image-input-action="remove"]');
        const personId = '{{ $person['id'] }}';

        // Buscar avatar atual
        fetch(`{{ env('APP_URL_API') }}/admin/person/${personId}/avatar`, {
                headers: {
                    'token': '{{ session('authToken') }}'
                }
            })
            .then(async res => {
                const isJson = res.headers.get('content-type')?.includes('application/json');
                const data = isJson ? await res.json() : await res.text();

                if (res.ok && data.avatar_url) {
                    wrapper.style.backgroundImage = `url(${data.avatar_url})`;
                }
            });

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
                            wrapper.style.backgroundImage = `url(${data.avatar_url})`;
                        }

                        console.log('Avatar enviado com sucesso:', data);
                    })
                    .catch(error => {
                        console.error('Erro no envio:', error);
                        alert('Erro ao enviar avatar.');
                    });
            });
        }

        if (btnRemove) {
            btnRemove.addEventListener('click', function() {
                if (!confirm('Tem certeza que deseja remover o avatar?')) return;

                fetch(`{{ env('APP_URL_API') }}/admin/person/${personId}/avatar`, {
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
                        } else {
                            alert(data.message || 'Erro ao remover avatar.');
                        }
                    });
            });
        }
    });
</script>
