<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login || Aisha Abubakr</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Login</h4>
                                </div>

                                <form action="<?= route_to('login') ?>" method="post">
                                    <?= csrf_field() ?>

                        <?php if ($config->validFields === ['email']): ?>

                                    <div class="form-group mb-3">
                                        <label for="username">Email</label>
                                        <input name="login" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" type="text" id="email" required="" placeholder="enter your email or username">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                        <span id="username_error" class="text-danger"></span> 
                                    </div>

                        <?php else: ?>

                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>
                                        <input name="username" class="form-control" type="text" id="username" required="" placeholder="Username">
                                        <span id="username_error" class="text-danger"></span> 
                                    </div>

                        <?php endif; ?>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" type="password" required="" placeholder="<?=lang('Auth.password')?>">

                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                        <span id="password_error" class="text-danger"></span> 
                                    </div>

                        <?php if ($config->allowRemembering): ?>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input name="remember" type="checkbox" class="custom-control-input" id="checkbox-signin" 
                                            <?php if(old('remember')) : ?> checked <?php endif ?>>
                                            
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                        <?php endif; ?>

                                    <div class="form-group mb-0 text-center">
                                        <button id="loginbtn" class="btn btn-primary btn-block" type="submit"> Log In </button>
                                        <span id="error_message" class="text-danger"></span> 

                                        <div id="loading" class="spinner-grow text-primary m-2 hidden" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">

                <?php if ($config->activeResetter): ?>
                                <p> 
                                    <a href="<?= route_to('forgot') ?>" class="text-info ml-1">
                                    <i class="fa fa-lock mr-1"></i>Forgot your password?</a>
                                </p>
                <?php endif; ?>

                <?php if ($config->allowRegistration) : ?>

                                <p class="text-dark">Don't have an account? 
                                    <a href="<?= route_to('register') ?>" class="text-dark ml-1"><b>Register</b></a>
                                </p>
                <?php endif; ?>

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
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>

// onkeypress="validateNow()"

            // function validateNow() {

                // const regex = /^ESG-[0-9]{3}$/;

                // var school_id = document.getElementById('school_id').value;
                // const isExisting = regex.test(school_id);
                // if (!isExisting) {

                //     if (school_id) {
                //         document.getElementById("parsley-id-5").innerHTML = '<li class="parsley-required">invalid school id</li>';
                //     } else {
                //         document.getElementById("parsley-id-5").innerHTML = '';
                //     }

                // }else{
                //     document.getElementById("parsley-id-5").innerHTML = "Good";
                // }
                
            // }

            
        //    string = document.getElementById("school_id").value();


    $(document).ready(function(){

               
                //  On submit of login form
        $('#login').on('submit', function(event){

            event.preventDefault();
    
            $.ajax({

              url:"<?php echo base_url('/login'); ?>",

              method:"POST",

              data:$(this).serialize(),

              dataType:"JSON",

              beforeSend:function(){
                $('#username_error').text('');
                    $('#password_error').text('');
                    $('#school_id_error').text('');
                    $('#error_message').text('');
                $('#school_id').attr('disabled', 'disabled');
                $('#username').attr('disabled', 'disabled');
                $('#password').attr('disabled', 'disabled');
                $('#loading').css('display', 'inline-block');
                $('#loginbtn').css('display', 'none');
              }, 

              success:function(data)
              {

                if(!data.status)
                {
                    $('#school_id').attr('disabled', false);
                    $('#username').attr('disabled', false);
                    $('#password').attr('disabled', false);
                    $('#loading').css('display', 'none');
                    $('#loginbtn').css('display', 'inline-block');
                    $('#username_error').text(data.username_error);
                    $('#password_error').text(data.password_error);
                    $('#school_id_error').text(data.school_id_error);
                    $('#error_message').text(data.error_message);

                }else{

                    $('#school_id').attr('disabled', false);
                    $('#username').attr('disabled', false);
                    $('#password').attr('disabled', false);
                    $('#loading').css('display', 'none');
                    $('#loginbtn').css('display', 'inline-block');
                    // alert("Logged in");
                    window.location.replace(data.location);
                }

              }

            }); //ajax function


        }); // End of on.submit comment form block


}); //end of jquery function

</script>
        
    </body>
</html>