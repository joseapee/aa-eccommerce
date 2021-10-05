<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Register || aisha Abubakr</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">

        <!-- Custom box css -->
        <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />
        <link href="/assets/css/custom.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="/" class="logo mb-2">
                                <img src="/assets/images/aa-logo.jpg" alt="" height="60" class="logo-light mx-auto">
                               <img src="/assets/images/aa-logo.jpg" alt="" height="60" class="logo-dark mx-auto">
                            </a>
                            <!-- <h1 class="mt-2 mb-4">Aisha Abubakr</h1> -->
                        </div>
                        <div class="card">
                                <div class="card-body p-4">
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <h4 class="header-title mb-3 text-center">Registration Form</h4>

                                    <form action="<?= route_to('register') ?>" method="post" id="signup">
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label" for="name"> First name</label>
                                            <input name="firstname" value="<?= old('firstname') ?>" class="form-control input-field" type="text" id="fullname" placeholder="first Name" required>
                                            <span id="firstname_error" class="text-danger"></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label" for="surname"> Last name</label>
                                            <input name="lastname" class="form-control input-field" type="text" id="fullname" placeholder="last name" required value="<?= old('lastname') ?>">
                                            <span id="surname_error" class="text-danger"></span>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label" for="email"><?=lang('Auth.email')?></label>
                                            <input name="email" class="form-control input-field  <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"  type="email" id="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label" for="email">Phone No</label>
                                            <input name="phone" value="<?= old('phone') ?>" class="form-control input-field" type="text" id="phone" required placeholder="Enter your phone number">
                                            <span id="phone_error" class="text-danger"></span>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="col-md-3 col-form-label" for="email"><?=lang('Auth.password')?></label>
                                            <input name="password" class="form-control input-field <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" required id="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                            <span id="password_error" class="text-danger"></span>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="col-form-label" for="email">Confirm Password</label>
                                            <input name="pass_confirm" class="form-control input-field <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" type="password" required id="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                            <span id="r_password_error" class="text-danger"></span>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input input-field" id="checkbox-signup">
                                                <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                            <button name="submit" class="btn btn-primary btn-block" type="submit"><?=lang('Auth.register')?></button>
                                        </div>

                                        <div id="loading" class="hidden spinner-border text-info m-2" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div><br>
                                        <span id="error_message" class="text-danger"></span>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-dark">Already have account? <a href="<?= route_to('login') ?>" class="text-primary ml-1"><b>Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    

        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

        <!-- Modal-Effect -->
        <script src="/assets/libs/custombox/custombox.min.js"></script>

        <!-- Init js-->
        <script src="assets/js/pages/form-wizard.init.js"></script>

        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>

        <!-- Paystack api -->
        <script src="https://js.paystack.co/v1/inline.js"></script>

    </body>
</html>