<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--=============== BOXICONS ===============-->
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/libraries/swiper-bundle.min.css') }}" />

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
        @stack('style-alt')
        <title> Fraksi Gerindra</title>
        <link rel="icon" href="{{ asset('images/logo_gerindra.png') }}" type="image/png">
        <style>
            /* Warna default merah untuk semua link */
            .nav__link {
                color: #b22222; /* Merah */
                text-decoration: none; /* Hilangkan garis bawah */
                transition: color 0.3s ease; /* Efek transisi halus */
            }

            /* Warna merah lebih gelap saat hover */
            .nav__link:hover {
                color: #8b0000; /* Merah tua */
            }

            /* Warna biru untuk link aktif */
            .active-link {
                color: #8b0000 !important; /* Biru (gunakan !important untuk prioritas lebih tinggi) */
                font-weight: bold; /* Opsional: buat teks aktif lebih tebal */
            }
        </style>


    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="{{ route('homepage') }}" class="nav__logo"
                    ><img src="{{ asset('frontend/assets/img/logo_gerindra.png') }}" alt="Fraksi Gerindra" style="width: 140px; height: 45px;"></a>

                <div class="nav__menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="{{ route('homepage') }}" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                                <i class="bx bx-home-alt"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('anggota.index') }}" class="nav__link {{ request()->is('anggotas') || request()->is('anggotas/*')  ? ' active-link' : '' }}">
                                <i class="bx bx-user"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('blog.index') }}" class="nav__link {{ request()->is('blogs') || request()->is('blogs/*')  ? ' active-link' : '' }}">
                                <i class="bx bx-news"></i>
                                <span>Berita</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('aspirasi') }}" class="nav__link {{ request()->is('aspirasi') ? ' active-link' : '' }}">
                                <i class="bx bx-message"></i>
                                <span>Aspirasi</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="{{ route('galeri') }}" class="nav__link {{ request()->is('galeri') ? ' active-link' : '' }}">
                                <i class="bx bx-photo-album"></i>
                                <span>Galeri</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- theme -->
                <i class="bx bx-moon change-theme" id="theme-button"></i>

                
            </nav>
        </header>

        <!--==================== MAIN ====================-->
        <main class="main">
            @yield('content')
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div>
                    <a href="{{ route('homepage') }}" class="footer__logo">
                    <img src="{{ asset('frontend/assets/img/logo_gerindra.png') }}" alt="Fraksi Gerindra"  style="width: 140px; height: 45px;">
                    </a>
                    <p class="footer__description">
                    Kalau bukan kita, siapa lagi? Kalau <br /> bukan sekarang, kapan lagi? <br /> <br />
                    Mari bergabung bersama Gerindra <br /> untuk #SelamatkanIndonesia.

                    </p>
                </div>

                <div class="footer__content">
                    <div>
                        <h3 class="footer__title">Quick Links</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">Tentang Fraksi Gerindra</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Privacy & Policy</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">Term & Conditions</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="footer__title">Hubungi Kami</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="#" class="footer__link">
                                    Email: ppid@gerindra.id</a>
                            </li>
                            <li>
                                <a href="#" class="footer__link"
                                    >Phone: (021) 7892377, 7801396
                                </a>
                            </li>
                            <li>
                                <a href="#" class="footer__link">
                                    Address: Jl. Harsono RM no. 54,<br /> Ragunan, Pasar Minggu,<br /> Jakarta Selatan 12160</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Follow us</h3>

                        <ul class="footer__social">
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-facebook-circle"></i>
                            </a>
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-instagram-alt"></i>
                            </a>
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-youtube"></i>
                            </a>
                            <a href="#" class="footer__social-link">
                                <i class="bx bxl-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__info container">
                <span class="footer__copy">
                    &#169; All rigths reserved
                </span>
                <div class="footer__privacy">
                    <a href="#">Dikelola Oleh Intern USM</a>
                </div>
            </div>
        </footer>

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="bx bx-chevrons-up"></i>
        </a>

        <!--=============== SCROLLREVEAL ===============-->
        <script src="{{ asset('frontend/assets/libraries/scrollreveal.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <!--=============== SWIPER JS ===============-->
        <script src="{{ asset('frontend/assets/libraries/swiper-bundle.min.js') }}"></script>

        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        @stack('script-alt')
    </body>
</html>
