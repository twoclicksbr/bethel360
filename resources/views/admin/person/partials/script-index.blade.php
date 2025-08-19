<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sel = document.getElementById('typeDocument');
        const wrapper = document.getElementById('valueDocumentWrapper');
        const input = document.getElementById('valueDocument');
        if (!sel || !wrapper || !input) return;

        const isDigit = c => c === '9' || c === '#' || c === '0';
        const onlyDigits = s => (s || '').toString().replace(/\D/g, '');
        const formatByMask = (value, mask) => {
            if (!mask) return value;
            const digits = onlyDigits(value);
            let out = '', di = 0;
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
        };

        function applyMask() {
            const mask = (input.dataset.mask || '').trim();
            if (mask) input.value = formatByMask(input.value, mask);
        }

        function toggleValueDoc({ fromChange = false } = {}) {
            const opt = sel.selectedOptions[0];
            const mask = (opt && opt.dataset.mask || '').trim();

            if (sel.value) {
                wrapper.style.display = 'block';

                // só limpa se for mudança de tipo, não no load inicial
                if (fromChange) {
                    input.value = '';
                }

                input.dataset.mask = mask;
                input.placeholder = mask || 'Número';
                input.maxLength = mask ? mask.length : 524288;

                // aplica máscara ao valor atual
                applyMask();
            } else {
                wrapper.style.display = 'none';
                input.value = '';
                input.dataset.mask = '';
                input.placeholder = 'Número';
            }
        }

        input.addEventListener('input', applyMask);

        sel.addEventListener('change', () => toggleValueDoc({ fromChange: true }));

        if (window.jQuery && jQuery(sel).data('select2')) {
            jQuery(sel).on('select2:select select2:clear', () => toggleValueDoc({ fromChange: true }));
        }

        // load inicial → não limpa o valor vindo da URL
        toggleValueDoc({ fromChange: false });
    });
</script>