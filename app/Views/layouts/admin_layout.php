<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('/'); ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('/'); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('/'); ?>assets/vendor-niceadmin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/'); ?>assets/vendor-niceadmin/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('/'); ?>assets/vendor-niceadmin/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('/'); ?>assets/vendor-niceadmin/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('/'); ?>assets/vendor-niceadmin/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('/'); ?>assets/vendor-niceadmin/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('/'); ?>assets/vendor-niceadmin/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('/'); ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="<?= base_url('/'); ?>assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <span class="fw-bold">
                                <?= session()->get('username') ?? "USERNAME"; ?>
                            </span>
                            |
                            <span class="badge bg-success ms-2">
                                <?= strtoupper(session()->get('level')) ?? "LEVEL"; ?>
                            </span>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout'); ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- Dashboard Menu -->
            <li class="nav-item">
                <a class="nav-link <?= active_url('admin') ?>" href="<?= base_url('admin'); ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- User -->
            <li class="nav-item">
                <a class="nav-link <?= active_url('admin/user*') ?>" href="<?= base_url('admin/user'); ?>">
                    <i class="bi bi-people-fill"></i>
                    <span>Users</span>
                </a>
            </li>

            <!-- Departement -->
            <li class="nav-item">
                <a class="nav-link <?= active_url('admin/departement*') ?>" href="<?= base_url('admin/departement'); ?>">
                    <i class="bi bi-building"></i>
                    <span>Departement</span>
                </a>
            </li>

            <!-- Jenis Cuti -->
            <li class="nav-item">
                <a class="nav-link <?= active_url('admin/jenis-cuti*') ?>" href="<?= base_url('admin/jenis-cuti'); ?>">
                    <i class="bi bi-card-list"></i>
                    <span>Jenis Cuti</span>
                </a>
            </li>

            <!-- Karyawan -->
            <li class="nav-item">
                <a class="nav-link <?= active_url('admin/karyawan*') ?>" href="<?= base_url('admin/karyawan'); ?>">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Karyawan</span>
                </a>
            </li>


            <!-- Cuti -->
            <li class="nav-item">
                <a class="nav-link <?= active_url('admin/cuti*') ?>" href="<?= base_url('admin/cuti'); ?>">
                    <i class="bi bi-calendar4-week"></i>
                    <span>Cuti</span>
                </a>
            </li>
        </ul>
    </aside>

    <?= $this->renderSection('content') ?>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/chart.js/chart.umd.js"></script>
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/echarts/echarts.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/quill/quill.js"></script>
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('/'); ?>assets/vendor-niceadmin/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('/'); ?>assets/js/main.js"></script>

</body>

</html>