<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Lowongan || Karir Bersama</title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/img/ELSON.png') ?>">


    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendors/simplebar.css') ?> ">

    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font.css') ?>" rel="stylesheet">


</head>

<body>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
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

        <div class="body flex-grow-1 px-3 ms-5 me-5 px-5">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-body p-4">
                            <h3>Edit Lowongan Pekerjaan</h3>
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <h4>Periksa Entrian Form</h4>
                                    </hr />
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <form method="post" action="<?= base_url('perusahaan/daftar/lowongan/kedua/edit/proses'); ?>">
                                <?= csrf_field(); ?>
                                <input class="form-control" type="text" placeholder="Nama Depan" name="id_user" value="<?php echo $detail['id']; ?>" hidden>
                                <input class="form-control" type="text" placeholder="Nama Depan" name="id" value="<?php echo $lowongan['id']; ?>" hidden>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-building') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Nama Perusahaan" value="<?php echo $detail['nama_perusahaan']; ?>" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Nama Pemilik" value="<?php echo $detail['pemilik']; ?>" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-phone') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Nomor Handphone" value="<?php echo $detail['phone_number']; ?>" readonly>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-briefcase') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Nama Pekerjaan" name="nama_pekerjaan" value="<?php echo $lowongan['nama_pekerjaan']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-user') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Posisi" name="posisi" value="<?php echo $lowongan['posisi']; ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-description') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Deskripsi Pekerjaan" name="deskripsi" value="<?php echo $lowongan['deskripsi']; ?>">
                                </div>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-calendar') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="date" placeholder="Tanggal Lahir" name="batas_post" value="<?php echo $lowongan['batas_post']; ?>">
                                </div>
                                <label class="labels">Status</label>
                                <div class="input-group mb-3">

                                    <select class="form-control" name="status">
                                        <?php
                                        $lowong = $lowongan['status'];
                                        $open = ($lowong == 1) ? 'selected' : '';
                                        $close = ($lowong == 2) ? 'selected' : '';
                                        ?>
                                        <option value="1" <?php echo $open; ?>>Open</option>
                                        <option value="2" <?php echo $close; ?>>Close</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') ?>"></use>
                                        </svg>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Konfimasi Password" name="password">
                                </div>
                                <button class="btn btn-block btn-success" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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

</body>

</html>