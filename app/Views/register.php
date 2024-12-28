<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center login-wrapper">
        <div class="login-container bg-light shadow rounded p-5">
            <div class="d-flex justify-content-center mb-3">
                <h2>Daftar</h2>
            </div>
            <form action="<?= base_url('registering') ?>" method="post">
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Masukkan email">
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp"
                        placeholder="Masukkan nama">
                </div>
                <div class="form-group mb-3">
                    <label for="password1">Password</label>
                    <input type="password" name="password" class="form-control" id="password1"
                        placeholder="Masukkan Password">
                </div>
                <div class="form-group mb-3">
                    <label for="password2">Ulangi Password</label>
                    <input type="password" class="form-control" id="password2" placeholder="Ulangi Password"
                        aria-describedby="passValidation">
                    <div id="passValidation" class="invalid-feedback">
                        Password Tidak Sama
                    </div>
                </div>
                <div class="form-group mb-3">
                    <span>Kembali ke halaman </span>&nbsp;<a href="<?= base_url('/') ?>">Login</a>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Alert success -->
    <?php
    if (session()->has('success')) : ?>
        <script>
            Swal.fire({
                title: 'Berhasil Mendaftar!',
                text: '<?= session('success') ?>',
                icon: 'success',
            })
        </script>
    <?php endif; ?>

    <!-- Alert error -->
    <?php
    if (session()->has('error')) : ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: '<?= session('error') ?>',
                icon: 'error',
            })
        </script>
    <?php endif; ?>

    <!-- Password Validation -->
    <script>
        $('#password2').keyup(function() {
            var pw1 = $('#password1').val();
            var pw2 = $(this).val();
            if (pw1 != pw2) {
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        })
    </script>
</body>

</html>