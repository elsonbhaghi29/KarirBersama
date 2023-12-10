<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Daftar Lamaran || Karir Bersama</title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/img/ELSON.png') ?>">


    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendors/simplebar.css') ?> ">

    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font.css') ?>" rel="stylesheet">


</head>

<body>
    <!-- navbar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid ">

                <ul class="header-nav ms-3 ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md">
                                <img class="avatar-img" src="<?= base_url('assets/img/avatars/8.jpg') ?>">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') ?>"></use>
                                </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span>
                            </a>
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Settings</div>
                            </div>
                            <a class="dropdown-item" href="<?= base_url('profile') ?>">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                </svg> Profile</a>
                            <a class="dropdown-item" href="<?= base_url('/logout') ?>">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout') ?>"></use>
                                </svg>
                                Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <div class="container d-flex vh-100">
            <div class="body flex-grow-1 px-3">
                <div class="card ">
                    <div class="col">
                        <div class="p-3 align-items-center justify-content-center ">
                            <div class="card-body p-4">
                                <h1>Daftar Pekerjaan</h1>
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h4>Periksa Entrian Form</h4>
                                        </hr />
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <p class="text-medium-emphasis">Mohon Mengecek Data Sebelum Melamar</p>
                                <form method="post" action="<?= base_url('pelamar/lowongan/apply/proses'); ?>">
                                    <?= csrf_field(); ?>
                                    <input class="form-control" type="text" placeholder="Nama Depan" name="id_job" value="<?php echo $lowongan['id'] ?>" hidden>
                                    <input class="form-control" type="text" placeholder="Nama Depan" name="id_user" value="<?php echo $user['id'] ?>" hidden>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Nama Depan" value="<?php echo $perusahaan['nama_perusahaan'] ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Nama Belakang" value="<?php echo $lowongan['nama_pekerjaan'] ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Nama Belakang" value="<?php echo $pelamar['first_name'] . ' ' . $pelamar['last_name'] ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-phone') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Nomor Handphone" value="<?php echo $pelamar['phone_number'] ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-tablet') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Email" value="<?php echo $pelamar['email'] ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-location-pin') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="text" placeholder="Alamat" value="<?php echo $pelamar['address'] ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-calendar') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="date" placeholder="Tanggal Lahir" value="<?= date('Y-m-d'); ?>" readonly name="tanggal_apply">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') ?>"></use>
                                            </svg>
                                        </span>
                                        <input class="form-control" type="password" placeholder="Konfimasi Password" name="password">
                                    </div>
                                    <button class="btn btn-block btn-success" type="submit">Lamar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <footer class="footer">
                <div>
                    © 2023 Karir Bersama
                </div>
                <div class="ms-auto">
                    Lamar Kerja Dimana-pun, Kapan-pun
                </div>
            </footer>
        </div>



        <!-- CoreUI and necessary plugins-->
        <script src="<?= base_url('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendors/simplebar/js/simplebar.min.js') ?> "></script>
        <!-- Plugins and scripts required by this view-->
        <script src="<?= base_url('assets/vendors/chart.js/js/chart.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendors/@coreui/chartjs/js/coreui-chartjs.js') ?>"></script>
        <script src="<?= base_url('assets/vendors/@coreui/utils/js/coreui-utils.js') ?>"></script>
        <script src="<?= base_url('assets/js/main.js') ?>"></script>
        <script>
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const confirmDelete = confirm('Anda yakin ingin menghapus data ini?');

                    if (confirmDelete) {
                        window.location.href = e.target.getAttribute('href');
                    }
                });
            });
        </script>
</body>

</html>