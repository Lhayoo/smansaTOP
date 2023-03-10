<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? '_title_' ?></title>
    <link rel="icon" href="<?= base_url('/assets/images/logo/logo-sma1_32x32.png'); ?>" sizes="32x32" />

    <!-- Google Font - Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/google-fonts/source_sans_pro.css'); ?>">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/toastr/toastr.min.css'); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <!-- jQuery-Confirm -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/jquery-confirm/dist/jquery-confirm.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/dist/css/adminlte.min.css'); ?>">
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?= base_url('/assets/theme/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('/assets/theme/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
    <!-- Toastr -->
    <!-- <script src="/assets/theme/plugins/toastr/toastr.min.js"></script> -->
    <!-- InputMask -->
    <script src="<?= base_url('/assets/theme/plugins/moment/moment.min.js'); ?>"></script>
    <!-- jQuery-Confirm -->
    <script src="<?= base_url('/assets/theme/plugins/jquery-confirm/dist/jquery-confirm.min.js'); ?>"></script>
    <!-- Custom JS -->
    <script src="<?= base_url('/assets/custom.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/assets/theme/dist/js/adminlte.min.js'); ?>"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="<?= base_url('/assets/images/logo/logo-sma1_192x192.png'); ?>" alt="AdminLTELogo" height="60" width="60">
        </div><!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('/assets/images/logo/logo-sma1_32x32.png'); ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMANSA<b class="text-danger">TOP</b></span>
            </a>
            <?= $this->include('Template/sidebar2'); ?>
            <?php // view_cell('\App\Libraries\Widget::sidebar') 
            ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title ?? '_title_' ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"> - <span class="text-primary" id="timestamp"></span></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <?= $this->renderSection('content') ?>

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-block">
                <i>#vivasmansa</i>
            </div>
            <!-- Default to the left -->
            <strong>&copy; 2022 <a href="https://www.sman1pekalongan.sch.id">SMAN 1 Pekalongan</a>.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Custom JS App -->
    <script src="<?= base_url('/assets/custom.js'); ?>"></script>


</body>

</html>