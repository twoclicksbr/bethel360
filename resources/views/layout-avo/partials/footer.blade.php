{{-- resources/views/layout-avo/partials/footer.blade.php --}}
<footer class="footer-half section-padding pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cont">
                    <div class="">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('avo/img/logo-h-white-green.svg') }}" alt="Bethel360"
                                style="max-width: 150px">
                        </a>
                    </div>
                    <div class="con-info custom-font">

                        <ul class="con-info custom-font">
                            <li style="display:flex; align-items:flex-start; margin-bottom:8px;">
                                <span style="min-width:90px; font-weight:bold;">Email:</span>
                                <span>contato@bethel360.com.br</span>
                            </li>

                            <li style="display:flex; align-items:flex-start; margin-bottom:8px;">
                                <span style="min-width:90px; font-weight:bold;">Endereço:</span>
                                <div style="font-weight:normal;">
                                    Rua Jussara, 5 - Jardim Topazio<br>
                                    São José dos Campos / SP<br>
                                    CEP: 12216-470
                                </div>
                            </li>

                            <li style="display:flex; align-items:flex-start; margin-bottom:8px;">
                                <span style="min-width:90px; font-weight:bold;">Telefone:</span>
                                <span style="font-weight:normal;">(12) 99769-8040</span>
                            </li>
                        </ul>

                    </div>
                    <div class="social-icon">
                        <h6 class="custom-font stit simple-btn">Siga-nos</h6>
                        <div class="social">
                            {{-- <a href="#"><i class="fab fa-facebook-f"></i></a> --}}
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            {{-- <a href="#"><i class="fab fa-youtube"></i></a> --}}
                            <a href="https://wa.me/5512997698040" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-2">
                <div class="subscribe mb-50">
                    <h6 class="custom-font stit simple-btn">Newsletter</h6>
                    <p>Assine para receber nossas novidades</p>
                    <form>
                        <div class="form-group custom-font">
                            <input type="email" name="subscribe" placeholder="Seu e-mail">
                            <button class="cursor-pointer">Assinar</button>
                        </div>
                    </form>
                </div>

                <div class="insta">
                    <h6 class="custom-font stit simple-btn">Instagram Post</h6>
                    <div class="insta-gallary">
                        <a href="#0">
                            <img src="{{ asset('avo/img/insta/1.jpg') }}" alt="">
                        </a>
                        <a href="#0">
                            <img src="{{ asset('avo/img/insta/1.jpg') }}" alt="">
                        </a>
                        <a href="#0">
                            <img src="{{ asset('avo/img/insta/1.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights d-flex justify-content-between align-items-center px-4">
            <p class="mb-0">© {{ date('Y') }}, <b>Bethel360°</b>. Todos os direitos reservados.</p>
            <p class="mb-0">
                Uma empresa do grupo
                <a href="https://twoclicks.com.br" target="_blank">
                    <img src="{{ asset('avo/img/pointer-mouse-white.svg') }}" alt="" style="max-width: 12px">
                    TwoClicks
                </a>
            </p>
        </div>

    </div>
</footer>
