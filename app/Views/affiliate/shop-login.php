<!DOCTYPE html>
<html lang="en">

<head>

<?php include('header.php'); ?>
<link rel="stylesheet" href="/assets/affiliate/css/login.css">

</head>

<body>

<!-- preloader -->
<div id="preloader">
    <div class="spinner spinner-round"></div>
</div>
<!-- / preloader -->

<!-- header -->
<header>
    
    <?php include('nav-head.php'); ?>

</header>


    <!-- / header -->

    <!-- content -->

    <!-- login-register -->
   <section id="login-register" class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="place-card">
    <div class="flip-container">
      <div class="card">
                            <div id="login-form" class="face front">
                                <h3 class="log-title">Log In</h3>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        required="" data-error="*Please fill out this field">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <!-- log-line -->
                                <div class="log-line">
                                    <div class="pull-left">
                                        <div class="checkbox checkbox-primary space-bottom">
                                            <label class="hide"><input type="checkbox"></label>
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1"><span>Remember Me</span></label>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit"
                                            class="btn btn-md btn-primary-filled btn-log btn-rounded">Log In</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div><!-- / log-line -->
                                <hr>
                                <a href="#x" class="forgot-password">Lupa Password?</a> <br>
                                <a href="#" class="toggle-form-link" data-target="register">Mau Daftar Baru, klik disini.</a>
                            </div><!-- / #login-form -->

                            <!-- register form -->
                            <div id="register-form" class="face back">
                                <h3 class="log-title">Register</h3>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="register-email" placeholder="Email"
                                        required="" data-error="*Please fill out this field">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="register-username" placeholder="Username"
                                        required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="register-password" placeholder="Password"
                                        required="" data-error="*Please fill out this field">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="register-cpassword" placeholder="Confirm Password"
                                        required="">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                <label for="captchaInput">Masukkan Captcha :</label>
                                <div style="display:flex; align-items:center; gap:10px;">
                                    <div id="captchaText" style="font-weight:bold; font-size:18px; letter-spacing:2px;"></div>
                                    <button type="button" id="refreshCaptcha" class="btn btn-xs btn-default">↻</button>
                                </div>
                                <input type="text" class="form-control" id="captchaInput" placeholder="Ketik kode captcha yang kelihatan itu kesini...">
                                <small id="captchaError" style="color:red; display:none;">Captcha salah!</small>
                            </div>


                                <!-- log-line -->
                                <div class="log-line reg-form-1 no-margin">
                                    <div class="pull-left">
                                        <div class="checkbox checkbox-primary space-bottom">
                                            <label class="hide"><input type="checkbox"></label>
                                            <input id="checkbox2" type="checkbox">
                                            <label for="checkbox2"><span><a href="#" data-toggle="modal" data-target="#termsModal">Terms & Conditions</a></span></label>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" id="reg-submit"
                                            class="btn btn-md btn-primary-filled btn-log btn-rounded">Register</button>
                                        <div id="register-msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div><!-- / log-line -->
                                <br>
                                <hr>
                                <a href="#" class="toggle-form-link" data-target="login">Coba Login, klik disini.</a>
                            </div><!-- / #register-form -->
                        </div><!-- / card -->
                    </div><!-- / flip-container -->
                </div><!-- / col-sm-6 -->
            </div><!-- / row -->
        </div><!-- / container -->
    </section>
    <!-- / login-register -->

   
<!-- / shop 3col -->

<?php include('modal_pengajuan_product.php'); ?>
<?php include('modal_terms_conditions.php'); ?>
<!-- / content -->

<!-- footer -->
<footer class="light-footer">
    <?php include('footer.php'); ?>
</footer>
<!-- / footer -->

<!-- javascript -->
<?php include('scripts.php'); ?>
<script src="/assets/affiliate/js/flipping.js"> </script>
<script src="/assets/affiliate/js/captcha.js"> </script>


</body>

</html>
