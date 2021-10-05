<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

        <!-- Bootstrap Css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url('assets/css/app.min.css') ?>" id="app-stylesheet" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="index.html" class="logo">
                                <img src="<?= base_url('assets/images/logo.png') ?>" alt="" height="60" class="logo-light mx-auto">
                               <img src="<?= base_url('assets/images/logo.png') ?>" alt="" height="60" class="logo-dark mx-auto">
                            </a>
                            <p class="text-muted mt-2 mb-4"><?= $title ?></p>
                        </div>
                        <div class="card text-center">

                            <div class="card-body p-4">
                                
                                <div class="mb-4">
                                    <h4 class="text-uppercase mt-0">Congratulation <?= $firstname.", ".$surname ?>!!!</h4>
                                </div>
                                <img src="<?= base_url('assets/images/mail_confirm.png') ?>" alt="img" width="86" class="mx-auto d-block" />

                                <p class="text-muted font-14 mt-2">Your School-ID is <b><?= $school_id ?></b>.<br><strong>Note!</strong>You will need your school ID, email and password to login to your dashboard<br>An email containing your school ID and other login details has been sent to <b><?= $email ?></b>.
                                    Please check your email inbox or spam folder </p>

                                <a href="<?= base_url('login') ?>" class="btn btn-block btn-primary waves-effect waves-light mt-3">Go to Easyschool Login</a>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>