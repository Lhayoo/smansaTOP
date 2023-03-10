<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMANSA | TOP</title>
    <link rel="icon" href="<?= base_url('/assets/images/logo/logo-sma1_32x32.png'); ?>" sizes="32x32" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/plugins/toastr/toastr.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/assets/theme/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('/assets/images/logo/logo-sma1_192x192.png'); ?>" alt="Logo Company">
                <h1 class="m-0 p-0"><b class="text-danger">SMANSA</b>TOP</h1>
                <p class="m-0"></p>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <!-- <h5><i class="icon fas fa-ban"></i> Error!</h5> -->
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form autocomplete="off" action="<?= base_url('/Auth/handleLogin'); ?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="username" autocomplete="off" min_length="4" max_length="50" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control password" placeholder="Password" autocomplete="off" min_length="4" max_length="100" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span toggle="#password-field" class="fas fa-eye fa-fw toggle-password"></span>
                            </div>
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <!-- /.col -->
                        <div class="col-12 col-md-12">
                            <button type="submit" id="login" class="btn btn-primary btn-block"><span id="proses_login"></span> Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('/assets/theme/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Toastr -->
    <!-- <script src="/assets/theme/plugins/toastr/toastr.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?= base_url('/assets/theme/dist/js/adminlte.min.js'); ?>"></script>
    <script src="<?= base_url('/assets/custom.js'); ?>"></script>


</body>

</html>