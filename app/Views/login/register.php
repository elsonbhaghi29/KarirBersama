<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">

    <title>Karir Bersama | Register</title>

    <link rel="manifest" href="<?= base_url('assets/favicon/manifest.json') ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/favicon/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/favicon/android-icon-192x192.png') ?>">
    <link rel="manifest" href="<?= base_url('assets/favicon/manifest.json') ?>">

    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendors/simplebar.css') ?>">

    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/css/font.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <h4>Periksa Entrian Form</h4>
                                    </hr />
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <p class="text-medium-emphasis">Create your account</p>
                            <form method="post" action="<?= base_url(); ?>/register/proses">
                                <?= csrf_field(); ?>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Username" name="username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Nama" name="nama">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Confirm password" name="confirm-password">
                                </div>
                                <label for="status">Status:</label>
                                <div class="input-group mb-4">
                                    <select class="form-select" id="status" name="status">
                                        <option value="pelamar">Pelamar</option>
                                        <option value="perusahaan">Perusahaan</option>
                                    </select>
                                </div>
                                <button class="btn btn-block btn-info" type="submit">Next</button>
                                <span><a href="<?= base_url('/login') ?>">Login</a></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/simplebar/js/simplebar.min.js') ?>"></script>

</body>

</html>