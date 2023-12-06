<!DOCTYPE html>
<html lang="en">
<head>
    <title>Karir Bersama | Login</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/favicon/android-icon-192x192.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/favicon/manifest.json') ?>">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/favicon/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendors/simplebar.css') ?>">

    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
                                <form method="post" action="<?= base_url(); ?>/login/proses">
                                    <?= csrf_field(); ?>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Username" name="username">
                                    </div>
                                    <div class="input-group mb-4">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                </form>
                                <div class="col-6 text-end">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-5 text-white bg-primary py-5">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Temukan Karier Impianmu di Setiap Klik!</p>
                                <h5>Daftar Sekarang!!</h5>
                                <button class="btn btn-lg btn-outline-light mt-3" type="button" onclick="window.location.href='<?= base_url('/register') ?>'">Register Now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/simplebar/js/simplebar.min.js') ?>"></script>

</body>
</html>