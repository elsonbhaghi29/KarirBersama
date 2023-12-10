<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashboard || Karir Bersama</title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/img/ELSON.png') ?>">


    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/simplebar/css/simplebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/vendors/simplebar.css') ?> ">

    <!-- Main styles for this application-->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/font.css') ?>" rel="stylesheet">


</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <img src="<?= base_url('assets/img/ELSON.png') ?>" width="100px">
        </div>

        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/dashboard') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-house') ?>"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/daftar/lowongan') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-briefcase') ?>"></use>
                    </svg> Lowongan Kerja</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/lowongan/daftar') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-book') ?>"></use>
                    </svg> Lamaran</a>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>

    <!-- navbar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
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

        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <!-- kotak atas -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-primary">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-3 fw-semibold">
                                        <?php echo count($lowongan) ?>
                                        <span class="fs-6 fw-normal">Pekerjaan</span>
                                    </div>
                                    <div class="mt-2 fw-bold fs-4">Lowongan Kerja</div>
                                </div>

                            </div>
                            <div class="dropdown ms-3 mt-4">
                                <a class="dropdown-item" href="<?= base_url('pelamar/lowongan/daftar') ?>">Lihat</a>
                            </div>
                            <div class="c-chart-wrapper mx-3" style="height:10px;"></div>
                        </div>
                    </div>
                </div>

                <!-- kotak bawah -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title mb-0">Daftar Lowongan Pekerjaan</h4>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Perusahaan</th>
                                        <th scope="col">Nama Pekerjaan</th>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Batas Lamaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $maxRows = 2;
                                    $appliedJobs = array_column($apply, 'id_job'); // Mengambil ID pekerjaan dari data apply
                                    $count = 0;

                                    foreach ($lowongan as $index => $item) :
                                        if (!in_array($item['id'], $appliedJobs) && $count < $maxRows) : // Memeriksa lowongan yang belum dilamar
                                            $count++;
                                    ?>
                                            <tr>
                                                <td scope="row"><?php echo (int)$index + 1; ?></td>
                                                <td>
                                                    <?php
                                                    $idPerusahaan = $item['id_perusahaan'];
                                                    $namaPerusahaan = '';
                                                    foreach ($perusahaan as $perusahaanItem) {
                                                        if ($perusahaanItem['id'] === $idPerusahaan) {
                                                            $namaPerusahaan = $perusahaanItem['nama_perusahaan'];
                                                            break;
                                                        }
                                                    }
                                                    echo $namaPerusahaan;
                                                    ?>
                                                </td>
                                                <td><?php echo $item['nama_pekerjaan']; ?></td>
                                                <td><?php echo $item['posisi']; ?></td>
                                                <td class="wrap-text"><?php echo $item['deskripsi']; ?></td>
                                                <td><?php echo $item['batas_post']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('pelamar/lowongan/apply/' . $item['id']) ?>" class="btn btn-block btn-info">Lamar</a>
                                                </td>
                                            </tr>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                    <?php if ($count >= $maxRows) : ?>
                                        <tr>
                                            <td colspan="8">
                                                <a href="<?= base_url('pelamar/daftar/lowongan') ?>" class="btn btn-link">See more</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
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