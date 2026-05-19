<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - StadionApp</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>

<!-- 🔥 BACKGROUND -->
<div class="bg-login">

    <!-- OVERLAY -->
    <div class="overlay"></div>

    <!-- LOGIN CARD -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 position-relative">

        <div class="login-card">

            <!-- LOGO -->
            <div class="text-center mb-4">

                <div class="logo-circle mx-auto mb-3">
                    ⚽
                </div>

                <h2 class="fw-bold text-white">
                    StadionApp
                </h2>

                <p class="text-light opacity-75">
                    Login ke akun anda
                </p>

            </div>

            <!-- ERROR -->
            @if(session('error'))

            <div class="alert alert-danger rounded-3">

                {{ session('error') }}

            </div>

            @endif

            <!-- FORM -->
            <form method="POST"
                  action="/login"
                  id="loginForm">

                @csrf

                <!-- EMAIL -->
                <div class="mb-3">

                    <label class="form-label text-white">
                        Email
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-envelope-fill"></i>
                        </span>

                        <input type="email"
                               name="email"
                               class="form-control border-0"
                               placeholder="Masukkan email"
                               required>

                    </div>

                </div>

                <!-- PASSWORD -->
                <div class="mb-3">

                    <label class="form-label text-white">
                        Password
                    </label>

                    <div class="input-group">

                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-lock-fill"></i>
                        </span>

                        <input type="password"
                               name="password"
                               id="passwordInput"
                               class="form-control border-0"
                               placeholder="Masukkan password"
                               required>

                        <button type="button"
                                class="btn btn-light border-0"
                                id="togglePassword">

                            <i class="bi bi-eye-fill"></i>

                        </button>

                    </div>

                </div>

                <!-- REMEMBER -->
                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div class="form-check">

                        <input class="form-check-input"
                               type="checkbox">

                        <label class="form-check-label text-light">

                            Ingat Saya

                        </label>

                    </div>

                    <a href="#"
                       class="text-warning text-decoration-none">

                        Lupa Password?

                    </a>

                </div>

                <!-- BUTTON -->
                <button class="btn btn-login w-100 py-2 fw-semibold"
                        id="loginBtn">

                    Login

                </button>

            </form>

            <!-- REGISTER -->
            <div class="text-center mt-4 text-light">

                Belum punya akun?

                <a href="/register"
                   class="text-warning fw-semibold text-decoration-none">

                    Daftar

                </a>

            </div>

        </div>

    </div>

</div>


<!-- 🔥 STYLE -->
<style>

body{

    margin: 0;
    padding: 0;

    font-family: Arial, sans-serif;

}


/* BACKGROUND */
.bg-login{

    min-height: 100vh;

    background:
        linear-gradient(
            135deg,
            #007bff,
            #00a6ff
        );

    position: relative;

    overflow: hidden;

}


/* OVERLAY */
.overlay{

    position: absolute;

    width: 100%;
    height: 100%;

    background:
        rgba(0,0,0,0.25);

}


/* CARD */
.login-card{

    width: 400px;

    background:
        rgba(255,255,255,0.12);

    backdrop-filter: blur(15px);

    border-radius: 25px;

    padding: 40px;

    box-shadow:
        0 10px 30px rgba(0,0,0,0.25);

    z-index: 10;

    animation: fadeIn 1s ease;

}


/* LOGO */
.logo-circle{

    width: 80px;
    height: 80px;

    border-radius: 50%;

    background: white;

    color: #0d6efd;

    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 35px;

    font-weight: bold;

    box-shadow:
        0 5px 20px rgba(255,255,255,0.4);

}


/* INPUT */
.form-control{

    height: 50px;

    border-radius: 0 12px 12px 0 !important;

}


.input-group-text{

    border-radius: 12px 0 0 12px !important;

}


/* BUTTON */
.btn-login{

    background: white;

    color: #0d6efd;

    border-radius: 12px;

    transition: 0.3s;

}


.btn-login:hover{

    background: #ffe082;

    color: black;

    transform: translateY(-2px);

}


/* ANIMATION */
@keyframes fadeIn{

    from{

        opacity: 0;
        transform: translateY(20px);

    }

    to{

        opacity: 1;
        transform: translateY(0);

    }

}

</style>



<!-- 🔥 JAVASCRIPT -->
<script>

// =======================
// SHOW PASSWORD
// =======================

const togglePassword =
    document.getElementById('togglePassword');

const passwordInput =
    document.getElementById('passwordInput');

togglePassword.addEventListener('click', function(){

    if(passwordInput.type === 'password'){

        passwordInput.type = 'text';

        this.innerHTML =
            '<i class="bi bi-eye-slash-fill"></i>';

    }
    else{

        passwordInput.type = 'password';

        this.innerHTML =
            '<i class="bi bi-eye-fill"></i>';

    }

});



// =======================
// BUTTON LOADING
// =======================

const loginForm =
    document.getElementById('loginForm');

const loginBtn =
    document.getElementById('loginBtn');

loginForm.addEventListener('submit', function(){

    loginBtn.innerHTML =
        'Loading...';

    loginBtn.disabled = true;

});



// =======================
// CARD HOVER EFFECT
// =======================

const card =
    document.querySelector('.login-card');

card.addEventListener('mouseenter', () => {

    card.style.transform =
        'scale(1.02)';

    card.style.transition =
        '0.3s';

});

card.addEventListener('mouseleave', () => {

    card.style.transform =
        'scale(1)';

});

</script>

</body>
</html>