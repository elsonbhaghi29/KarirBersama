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
                    <?php echo count($pelamar) ?>
                    <span class="fs-6 fw-normal">Pelamar</span>
                  </div>
                  <div class="mt-2 fw-bold fs-4">Mencari Kerja</div>
                </div>
              </div>
              <div class="c-chart-wrapper mx-3" style="height:9px;"></div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3">
            <div class="card mb-4 text-white bg-info">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-3 fw-semibold">
                    <?php echo count($usaha) ?>
                    <span class="fs-6 fw-normal">Perusahaan</span>
                  </div>
                  <div class="mt-2 fw-bold fs-5">Menawarkan Kerja</div>
                </div>
              </div>
              <div class="c-chart-wrapper mx-3" style="height:15px;"></div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3">
            <div class="card mb-4 text-white bg-warning">
              <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                  <div class="fs-3 fw-semibold">
                    <?php echo count($lowongan) ?>
                    <span class="fs-6 fw-normal">Pekerjaan</span>
                  </div>
                  <div class="mt-2 fw-bold fs-4">Lowongan Kerja</div>
                </div>
              </div>
              <div class="c-chart-wrapper mx-3" style="height:10px;"></div>
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