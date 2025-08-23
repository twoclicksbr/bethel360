<div id="navi" class="topnav">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <div class="logo-bethel">
            <a href="{{ route('site') }}">
                <img src="{{ asset('avo/img/logo-h-white-green.svg') }}" alt="" width="200">
            </a>
        </div>

        <div class="d-flex align-items-center menu-group-right">

            @if (session()->has('authToken'))
                <div class="menu-extra-right menu-icon">
                    <a href="{{ route('dashboard') }}" class="login-text">
                        <i class="bi bi-box-arrow-in-right me-1" style="vertical-align: middle;"></i>
                        {{ session('authNameFirst') }}
                    </a>
                </div>
            @else
                <div class="menu-extra-right">
                    <a href="{{ route('auth.login.post') }}" class="login-text">
                        <i class="bi bi-box-arrow-in-right me-1" style="vertical-align: middle;"></i>
                        Entrar
                    </a>
                </div>
            @endif

            <div class="menu-icon">
                <span class="icon">
                    <i></i>
                    <i></i>
                </span>
                <span class="text" data-splitting>Menu</span>
            </div>

        </div>

        <style>
            .menu-group-right {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .menu-icon,
            .menu-extra-right {
                display: inline-block;
                vertical-align: middle;
            }

            .login-text {
                font-weight: 600;
                color: #fff;
                font-size: 14px;
                cursor: pointer;
                transition: 0.3s;
            }

            .login-text i {
                margin-right: 5px;
                vertical-align: middle;
            }


            .login-text:hover {
                color: #00f08c;
            }
        </style>

    </div>
</div>


<div class="hamenu">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="menu-links">
                    <ul class="main-menu">

                        <li>
                            <div class="o-hidden">
                                <a href="{{ route('site') }}" class="link"><span class="nm">01.</span>Home</a>
                            </div>
                        </li>

                        <li>
                            <div class="o-hidden">
                                <span class="link dmenu"><span class="nm">01.</span>Home <i
                                        class="fas fa-angle-right"></i></span>
                            </div>
                            <div class="sub-menu">
                                <ul>
                                    <li>
                                        <div class="o-hidden">
                                            <span class="sub-link back"><i class="pe-7s-angle-left"></i> Go
                                                Back</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="index.html" class="sub-link"><span class="nm">01.</span>Main
                                                Home</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="index2.html" class="sub-link"><span
                                                    class="nm">02.</span>Creative Studio</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="index3.html" class="sub-link"><span
                                                    class="nm">03.</span>Business Startup</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="index4.html" class="sub-link"><span class="nm">04.</span>One
                                                Page</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="index5.html" class="sub-link"><span
                                                    class="nm">05.</span>Freelancer</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="o-hidden">
                                <span class="link dmenu"><span class="nm">03.</span>Portfolio <i
                                        class="fas fa-angle-right"></i></span>
                            </div>
                            <div class="sub-menu">
                                <ul>
                                    <li>
                                        <div class="o-hidden">
                                            <span class="sub-link back"><i class="pe-7s-angle-left"></i> Go
                                                Back</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="works.html" class="sub-link"><span class="nm">01.</span>Mouse
                                                Info</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="works2.html" class="sub-link"><span
                                                    class="nm">02.</span>Masonry 3 Columns</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="works3.html" class="sub-link"><span
                                                    class="nm">03.</span>Masonry 2 Columns</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="works4.html" class="sub-link"><span
                                                    class="nm">04.</span>Pinterest List</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="o-hidden">
                                <span class="link dmenu"><span class="nm">04.</span>Showcases <i
                                        class="fas fa-angle-right"></i></span>
                            </div>
                            <div class="sub-menu">
                                <ul>
                                    <li>
                                        <div class="o-hidden">
                                            <span class="sub-link back"><i class="pe-7s-angle-left"></i> Go
                                                Back</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="showcase.html" class="sub-link"><span class="nm">01.</span>Full
                                                Screen</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="showcase2.html" class="sub-link"><span
                                                    class="nm">02.</span>Creative Carousel</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="showcase3.html" class="sub-link"><span
                                                    class="nm">03.</span>Radius Carousel</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="o-hidden">
                                            <a href="showcase4.html" class="sub-link"><span
                                                    class="nm">04.</span>Columns Carousel</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="o-hidden">
                                <a href="contact.html" class="link"><span class="nm">05.</span>Contato</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="cont-info">
                    <div class="item">
                        <h6>Telefone e Whatsapp :</h6>
                        <p>
                            <a href="https://wa.me/5512997698040?text=Quero%20saber%20mais%20sobre%20o%20Bethel360°"
                                target="_blank">
                                (12) 99769-8040
                            </a>
                        </p>

                    </div>
                    <div class="item">
                        <h6>Endereço :</h6>
                        <p>
                            <a href="https://maps.app.goo.gl/fMS3Zvie1jzLxNs6A" target="_blank">
                                Rua Jussara, 5 - Jardim Topazio <br>
                                São José dos Campos / SP <br>
                                CEP : 12216-470 </br>
                            </a>
                        </p>
                    </div>
                    <div class="item">
                        <h6>Email :</h6>
                        <p>
                            <a href="mailto:alex@bethel360.com.br?subject=Quero saber mais sobre o Bethel360°">
                                alex@bethel360.com.br
                            </a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
