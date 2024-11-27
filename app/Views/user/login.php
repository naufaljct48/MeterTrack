<style>
    .text-red {
        color: #c62828;
    }
</style>
<div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="#" class="app-brand auth-cover-brand">
        <span class="app-brand-logo">
            <img src="<?= base_url() ?>assets/img/pgn_logo.png" class="img-fluid" style="max-height: 50px;" alt="Logo PGN" />
        </span>
    </a>

    <!-- /Logo -->
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-8 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="<?= base_url() ?>assets/img/undraw_qa_engineers_dg-5-p.svg" alt="auth-login-cover" class="my-5 auth-illustration" data-app-light-img="undraw_qa_engineers_dg-5-p.svg" data-app-dark-img="undraw_qa_engineers_dg-5-p.svg">
            </div>
        </div>
        <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
            <div class="w-px-400 mx-auto mt-12 pt-5">
                <h4 class="mb-1">Selamat Datang 👋</h4>
                <p class="mb-6 text-red">Login MeterTrack</p>

                <form class="mb-6" id="formAuthentication">
                    <?= csrf_field() ?>
                    <div class="mb-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username Anda" autocomplete="off">
                    </div>
                    <div class="mb-6 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>

                    <div class="my-8">
                        <div class="d-flex justify-content-between">
                            <div class="form-check mb-0 ms-2">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me">
                                    Remember Me
                                </label>
                            </div>
                            <a href="forgot.html">
                                <p class="mb-0">Forgot Password?</p>
                            </a>
                        </div>
                    </div>

                    <button type="button" class="btn btn-info d-flex align-items-center justify-content-center gap-2 w-100 btn-login">
                        Masuk <i class="fa-solid fa-right-to-bracket"></i>
                    </button>
                </form>


                <div class="divider my-6">
                    <div class="divider-text">atau</div>
                </div>

                <button class="btn btn-primary d-flex align-items-center justify-content-center gap-2 w-100" onclick="window.location.href='<?= base_url() ?>User/register'">
                    <span>Daftar</span>
                    <i class="fa-solid fa-user-plus"></i>
                </button>

            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
<script>
    $(document).ready(function() {
        function handleLogin() {
            var csrfName = '<?= csrf_token() ?>';
            var csrfHash = $('input[name="' + csrfName + '"]').val();
            var username = $('#username').val();
            var password = $('#password').val();

            $.ajax({
                url: '<?= base_url('User/login') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    username: username,
                    password: password,
                    [csrfName]: csrfHash
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Berhasil!',
                            text: 'Anda akan diarahkan dalam 2 Detik',
                            timer: 2000,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = response.redirect_url;
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Maaf',
                            text: response.message,
                        });

                        if (response.csrf_token) {
                            $('input[name="' + csrfName + '"]').val(response.csrf_token);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: 'Gagal mengirim data: ' + xhr.responseText
                    });
                }
            });
        }

        $('#formAuthentication').on('submit', function(e) {
            e.preventDefault();
            handleLogin();
        });

        $('.btn-login').click(function(e) {
            e.preventDefault();
            handleLogin();
        });

        $("#username, #password").keypress(function(event) {
            if (event.which == 13) {
                event.preventDefault();
                handleLogin();
            }
        });
    });
</script>