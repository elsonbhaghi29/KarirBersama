<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | Karir Bersama</title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/img/ELSON.png') ?>">



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
            <img src="<?= base_url('assets/img/ELSON.png') ?>" width="100px">
        </div>

        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?= base_url('pelamar/dashboard') ?>">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-house') ?>"></use>
                    </svg> Dashboard</a>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                    </svg> Master Data</a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('lowongan/kedua') ?>">
                            <svg class="nav-icon">
                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-briefcase') ?>"></use>
                            </svg>
                            <span class="nav-icon"></span> Input Lowongan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg class="nav-icon">
                                <use xlink:href="<?= base_url('assets/vendors/@coreui/icons/svg/free.svg#cil-spreadsheet') ?>"></use>
                            </svg>
                            <span class="nav-icon"></span>Daftar Lowongan</a>
                    </li>
                </ul>
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
                        <div class="col">
                            <div class="form-check form-switch d-flex align-items-center">
                                <label class="form-check-label fs-3" for="profileSettings">Profile Settings</label>
                                <input class="form-check-input ms-2" type="checkbox" id="profileSettings">
                            </div>
                        </div>
                        <form method="POST" action="<?= base_url('/edit/profile/proses/kedua/' . $user['username']); ?>">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Nama Perusahaan</label>
                                    <input type="text" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $detail['nama_perusahaan']; ?>" name="nama_perusahaan">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Pemilik</label>
                                    <input type="text" class="form-control" value="<?php echo $detail['pemilik']; ?>" placeholder="Pemilik" name="pemilik">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Nomor Handphone</label>
                                    <input type="text" class="form-control" placeholder="Nomor HP" value="<?php echo '+62' . $detail['phone_number']; ?>" name="phone_number">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Alamat</label>
                                    <input type="text" class="form-control" placeholder="Alamat" value="<?php echo $detail['address']; ?>" name="address">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" value="<?php echo $detail['email']; ?>" name="email">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Jenis Perusahaan</label>
                                    <select class="form-control" name="jenis_perusahaan">
                                        <?php
                                        $jenis_perusahaan = $detail['jenis_perusahaan'];
                                        $Swasta = ($jenis_perusahaan == 1) ? 'selected' : '';
                                        $Negeri = ($jenis_perusahaan == 2) ? 'selected' : '';
                                        ?>
                                        <option value="1" <?php echo $Swasta; ?>>Swasta</option>
                                        <option value="2" <?php echo $Negeri; ?>>Negeri</option>
                                    </select>
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary profile-button" type="submit" id="saveProfile">Save Profile</button>
                                </div>
                            </div>
                        </form>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkbox = document.getElementById('profileSettings');
            const inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');
            const saveButton = document.getElementById('saveProfile');

            function toggleInputs() {
                inputs.forEach(input => {
                    input.disabled = !checkbox.checked;
                });
                saveButton.disabled = !checkbox.checked;
            }

            checkbox.addEventListener('change', toggleInputs);

            saveButton.addEventListener('click', function() {
                // Lakukan aksi simpan profil di sini (contohnya: kirim data ke server)
                // Jangan lupa untuk menambahkan logika penyimpanan profil yang sesuai di sini
                console.log('Profil disimpan!'); // Contoh: Tampilkan pesan di console
            });

            toggleInputs();
        });
    </script>
</body>

</html>