    </div> <!-- fecha kt_app_root -->

    <script>
        var hostUrl = "{{ asset('assets') }}/";
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom/authentication/sign-in/general-pt-BR.js') }}"></script> --}}

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const iconHide = document.getElementById('icon-hide');
            const iconShow = document.getElementById('icon-show');

            if (input.type === 'password') {
                input.type = 'text';
                iconHide.classList.add('d-none');
                iconShow.classList.remove('d-none');
            } else {
                input.type = 'password';
                iconHide.classList.remove('d-none');
                iconShow.classList.add('d-none');
            }
        }
    </script>

</body>
