<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
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

    <style>
        .form-control.error {
            border-color: #dc3545;
        }
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url('/'); ?>assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <?= $this->include('components/show_notifications') ?>

                                    <form action="<?= base_url('login'); ?>" method="POST" class="row g-3">
                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?= old('username'); ?>">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

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