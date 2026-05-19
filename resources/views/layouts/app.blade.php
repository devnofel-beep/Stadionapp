<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>StadionApp</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
<!-- 🔥 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-lg sticky-top custom-navbar">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold d-flex align-items-center"
           href="{{ url('/') }}">

            <span class="logo-circle me-2">
                ⚽
            </span>

            StadionApp

        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <!-- HOME -->
                <li class="nav-item">

                    <a class="nav-link nav-hover"
                       href="{{ url('/') }}">

                        🏠 Home

                    </a>

                </li>

                <!-- EVENT -->
                <li class="nav-item">

                    <a class="nav-link nav-hover"
                       href="{{ url('/event') }}">

                        🎫 Event

                    </a>

                </li>

                <!-- MERCH -->
                <li class="nav-item">

                    <a class="nav-link nav-hover"
                       href="{{ url('/produk') }}">

                        🛍️ Merchandise

                    </a>

                </li>

                <!-- 🔐 LOGIN BUTTON -->
                @guest

                <li class="nav-item ms-lg-2">

                    <a href="/login"
                    class="btn btn-login-nav px-4 py-2 rounded-pill fw-semibold">

                        <i class="bi bi-box-arrow-in-right me-2"></i>

                        Login

                    </a>

                </li>

                @endguest



                <!-- 👤 USER LOGIN -->
                @auth

                <!-- ADMIN MENU -->
                @if(Auth::user()->role == 'admin')

                <li class="nav-item">

                    <a class="nav-link nav-hover"
                    href="/admin/dashboard">

                        📊 Dashboard

                    </a>

                </li>

                @endif



                <!-- USER DROPDOWN -->
                <li class="nav-item dropdown ms-lg-2">

                    <a class="nav-link dropdown-toggle d-flex align-items-center user-dropdown"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                        <!-- AVATAR -->
                        <div class="user-avatar me-2">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                        <!-- USERNAME -->
                        <span class="fw-semibold">

                            {{ Auth::user()->name }}

                        </span>

                    </a>


                    <!-- DROPDOWN MENU -->
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 p-2 user-menu">

                        <!-- PROFILE -->
                        <li>

                            <a class="dropdown-item rounded-3 py-2"
                            href="#">

                                👤 Profile

                            </a>

                        </li>


                        <!-- TICKET -->
                        <li>

                            <a class="dropdown-item rounded-3 py-2"
                            href="#">

                                🎟️ Tiket Saya

                            </a>

                        </li>


                        <!-- HISTORY -->
                        <li>

                            <a class="dropdown-item rounded-3 py-2"
                            href="#">

                                🧾 Riwayat Transaksi

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <!-- LOGOUT -->
                        <li>

                            <form action="/logout"
                                method="POST">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item text-danger rounded-3 py-2 logout-btn">

                                    🚪 Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>


<!-- 🔥 STYLE -->
<style>

.custom-navbar{

    background: linear-gradient(
        90deg,
        #007bff,
        #00a6ff
    );

    padding-top: 15px;
    padding-bottom: 15px;

}


.logo-circle{

    width: 40px;
    height: 40px;

    background: white;
    color: #0d6efd;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 18px;
    font-weight: bold;

}


.navbar-brand{

    font-size: 24px;

}


.nav-link{

    color: white !important;

    font-weight: 500;

    position: relative;

    transition: 0.3s;

}


.nav-hover:hover{

    transform: translateY(-2px);

    color: #ffe082 !important;

}


.nav-hover::after{

    content: '';

    position: absolute;

    left: 0;
    bottom: -4px;

    width: 0%;
    height: 2px;

    background: white;

    transition: 0.3s;

}


.nav-hover:hover::after{

    width: 100%;

}


.user-avatar{

    width: 35px;
    height: 35px;

    background: white;

    color: #0d6efd;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-weight: bold;

}


.dropdown-menu{

    min-width: 220px;

}


.dropdown-item{

    transition: 0.2s;

}


.dropdown-item:hover{

    background: #f1f5ff;

    transform: translateX(5px);

}


/* =========================
LOGIN BUTTON
========================= */

.btn-login-nav{

    background: white;

    color: #0d6efd;

    transition: 0.3s;

    border: none;

    box-shadow:
        0 4px 10px rgba(0,0,0,0.1);

}


.btn-login-nav:hover{

    background: #ffe082;

    color: black;

    transform: translateY(-2px);

}



/* =========================
USER AVATAR
========================= */

.user-avatar{

    width: 38px;
    height: 38px;

    border-radius: 50%;

    background: white;

    color: #0d6efd;

    display: flex;
    align-items: center;
    justify-content: center;

    font-weight: bold;

    box-shadow:
        0 4px 10px rgba(0,0,0,0.15);

}



/* =========================
USER DROPDOWN
========================= */

.user-dropdown{

    color: white !important;

    transition: 0.3s;

}


.user-dropdown:hover{

    color: #ffe082 !important;

}



/* =========================
DROPDOWN MENU
========================= */

.user-menu{

    min-width: 240px;

    backdrop-filter: blur(10px);

}



/* =========================
DROPDOWN ITEM
========================= */

.dropdown-item{

    transition: 0.2s;

}


.dropdown-item:hover{

    background: #f1f5ff;

    transform: translateX(4px);

}



/* =========================
LOGOUT BUTTON
========================= */

.logout-btn:hover{

    background: #ffe5e5 !important;

}



/* =========================
NAV HOVER
========================= */

.nav-hover{

    transition: 0.3s;

}


.nav-hover:hover{

    color: #ffe082 !important;

    transform: translateY(-2px);

}



</style>





<!-- 🔥 JAVASCRIPT -->
<script>

// ========================
// NAVBAR SCROLL EFFECT
// ========================

window.addEventListener('scroll', function(){

    const navbar =
        document.querySelector('.custom-navbar');

    if(window.scrollY > 30){

        navbar.style.paddingTop = '8px';
        navbar.style.paddingBottom = '8px';

        navbar.style.transition = '0.3s';

        navbar.style.boxShadow =
            '0 4px 15px rgba(0,0,0,0.2)';

    }
    else{

        navbar.style.paddingTop = '15px';
        navbar.style.paddingBottom = '15px';

        navbar.style.boxShadow =
            'none';

    }

});



// ========================
// ACTIVE MENU
// ========================

const currentLocation =
    window.location.pathname;

const navLinks =
    document.querySelectorAll('.nav-link');

navLinks.forEach(link => {

    if(link.getAttribute('href') === currentLocation){

        link.classList.add('fw-bold');

        link.style.color = '#ffe082';

    }

});




// ========================
// LOGO ANIMATION
// ========================

const logo =
    document.querySelector('.navbar-brand');

logo.addEventListener('mouseenter', () => {

    logo.style.transform = 'scale(1.05)';
    logo.style.transition = '0.3s';

});

logo.addEventListener('mouseleave', () => {

    logo.style.transform = 'scale(1)';

});

</script>

            <main>
                @yield('content')
            </main>

           <!-- 🔻 FOOTER -->
<footer class="custom-footer mt-5 pt-5 pb-3">

    <div class="container">

        <div class="row g-4">

            <!-- LOGO & DESC -->
            <div class="col-md-4">

                <h3 class="fw-bold mb-3 d-flex align-items-center">

                    <span class="footer-logo me-2">
                        ⚽
                    </span>

                    StadionApp

                </h3>

                <p class="footer-text">

                    Platform pemesanan tiket stadion
                    modern, cepat, dan mudah digunakan
                    untuk berbagai event olahraga
                    maupun konser.

                </p>

            </div>
            <!-- KONTAK -->
            <div class="col-md-4">

                <h5 class="fw-bold mb-3">
                    Kontak
                </h5>

                <p class="footer-contact">

                    <i class="bi bi-envelope-fill me-2"></i>
                    stadion@email.com

                </p>

                <p class="footer-contact">

                    <i class="bi bi-telephone-fill me-2"></i>
                    0812-3456-7890

                </p>

                <p class="footer-contact">

                    <i class="bi bi-geo-alt-fill me-2"></i>
                    Papua, Indonesia

                </p>


                <!-- SOCIAL -->
                <div class="social-icons mt-3">

                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>

        </div>

        <!-- LINE -->
        <hr class="footer-line my-4">

        <!-- COPYRIGHT -->
        <div class="text-center">

            <small class="copyright">

                © 2026 StadionApp —
                All Rights Reserved

            </small>

        </div>

    </div>

</footer>



<!-- 🔥 STYLE -->
<style>

.custom-footer{

    background:
        linear-gradient(
            90deg,
            #007bff,
            #00a6ff
        );

    color: white;

    position: relative;

    overflow: hidden;

}


/* LOGO */
.footer-logo{

    width: 45px;
    height: 45px;

    border-radius: 50%;

    background: white;

    color: #0d6efd;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 22px;

    box-shadow:
        0 5px 15px rgba(255,255,255,0.3);

}


/* TEXT */
.footer-text{

    opacity: 0.9;

    line-height: 1.8;

}


/* MENU */
.footer-menu{

    list-style: none;

    padding: 0;

}


.footer-menu li{

    margin-bottom: 12px;

}


.footer-menu a{

    color: white;

    text-decoration: none;

    transition: 0.3s;

}


.footer-menu a:hover{

    color: #ffe082;

    padding-left: 5px;

}


/* KONTAK */
.footer-contact{

    opacity: 0.9;

}


/* SOCIAL */
.social-icons{

    display: flex;

    gap: 15px;

}


.social-icons a{

    width: 45px;
    height: 45px;

    border-radius: 50%;

    background: rgba(255,255,255,0.15);

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;

    font-size: 18px;

    transition: 0.3s;

    text-decoration: none;

}


.social-icons a:hover{

    background: white;

    color: #0d6efd;

    transform: translateY(-5px);

}


/* LINE */
.footer-line{

    border-color:
        rgba(255,255,255,0.3);

}


/* COPYRIGHT */
.copyright{

    opacity: 0.85;

}


/* RESPONSIVE */
@media(max-width:768px){

    .custom-footer{

        text-align: center;

    }

    .social-icons{

        justify-content: center;

    }

}

</style>



<!-- 🔥 JAVASCRIPT -->
<script>

// =========================
// FOOTER ANIMATION
// =========================

const socialIcons =
    document.querySelectorAll('.social-icons a');

socialIcons.forEach(icon => {

    icon.addEventListener('mouseenter', () => {

        icon.style.transform =
            'translateY(-5px) scale(1.1)';

    });

    icon.addEventListener('mouseleave', () => {

        icon.style.transform =
            'translateY(0px) scale(1)';

    });

});



// =========================
// FOOTER FADE IN
// =========================

window.addEventListener('scroll', () => {

    const footer =
        document.querySelector('.custom-footer');

    const footerPosition =
        footer.getBoundingClientRect().top;

    const screenPosition =
        window.innerHeight;

    if(footerPosition < screenPosition){

        footer.style.opacity = '1';

        footer.style.transform =
            'translateY(0px)';

        footer.style.transition =
            '1s';

    }

});

</script>
            @yield('scripts')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>