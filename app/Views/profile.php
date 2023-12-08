<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/favicon/android-icon-192x192.png') ?>">


    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
    <link href="<?= base_url('assets/css/font.css') ?>" rel="stylesheet">

    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendors/simplebar.css') ?> ">

    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="<?= base_url('assets/brand/coreui.svg#full') ?>"></use>
            </svg>
        </div>

        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/dashboard') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-house') ?>"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="colors.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-briefcase') ?>"></use>
                    </svg> Input Lowongan</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="typography.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-book') ?>"></use>
                    </svg> Pelamar</a>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>

    <!-- navbar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-2">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-menu') ?>"></use>
                    </svg>
                </button>

                <ul class="header-nav ms-3">
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
                            <a class="dropdown-item" href="#">
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

        <div class="container rounded bg-white">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="avatar-img" src="<?= base_url('assets/img/avatars/8.jpg') ?>">
                        <span class="font-weight-bold"><?php echo $user['username']; ?></span>
                        <span class="text-black-50"><?php echo $detail['email']; ?></span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Nama Depan</label>
                                <input type="text" class="form-control" placeholder="first name" value="<?php echo $detail['first_name']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Nama Belakang</label>
                                <input type="text" class="form-control" value="<?php echo $detail['last_name']; ?>" placeholder="surname">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Nomor Handphone</label>
                                <input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $detail['phone_number']; ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Alamat</label>
                                <input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $detail['address']; ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="country" value="<?php echo $detail['tempat_lahir']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="<?php echo $detail['tanggal_lahir']; ?>" placeholder="state">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Jenis Kelamin</label>
                                <select class="form-control" name="gender">
                                    <?php
                                    $gender = $detail['gender'];
                                    $selectedLaki = ($gender == 1) ? 'selected' : '';
                                    $selectedPerempuan = ($gender == 2) ? 'selected' : '';
                                    ?>
                                    <option value="1" <?php echo $selectedLaki; ?>>Laki-Laki</option>
                                    <option value="2" <?php echo $selectedPerempuan; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Agama</label>
                                <select class="form-control" name="gender">
                                    <?php
                                    $agama = $detail['agama'];
                                    $selectedKatolik = ($agama == 1) ? 'selected' : '';
                                    $selectedIslam = ($agama == 2) ? 'selected' : '';
                                    $selectedHindu = ($agama == 3) ? 'selected' : '';
                                    $selectedBudha = ($agama == 4) ? 'selected' : '';
                                    $selectedKonghucu = ($agama == 5) ? 'selected' : '';
                                    ?>
                                    <option value="1" <?php echo $selectedKatolik; ?>>Katolik</option>
                                    <option value="2" <?php echo $selectedIslam; ?>>Islam</option>
                                    <option value="3" <?php echo $selectedHindu; ?>>Hindu</option>
                                    <option value="4" <?php echo $selectedBudha; ?>>Budha</option>
                                    <option value="5" <?php echo $selectedKonghucu; ?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </div>
                    </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/simplebar/js/simplebar.min.js') ?> "></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url('assets/vendors/chart.js/js/chart.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/@coreui/chartjs/js/coreui-chartjs.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/@coreui/utils/js/coreui-utils.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>

</html>