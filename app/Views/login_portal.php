<!DOCTYPE html>
<html>
<head>
  <title>Portal Login - Solusi Digital</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/css/bootstrap.min.css">  
<link rel="stylesheet" type="text/css" href="/assets/css/login-style.css">
 <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/solusi-digital-logo.png">
  

</head>   
<body>

  <?php if(!isset($error) && empty($second_visit)) : ?>
  <div class="full-screen" id="intro">
    <img src="/assets/images/cinaralab-logo.png" class="logo" id="logo1" style="display:none;" />
    <img src="/assets/images/fgroupindonesia-logo.png" class="logo" id="logo2" style="display:none;" />
    <div class="motto" id="motto">⚡ Selamat datang ⚡</div>
  </div>
  <?php endif; ?>

<div  class="benderaWrapper planet-gallery-wrapper">
  <div class="planet-gallery" id="planetGallery">
    <img src="/assets/images/animated/img1.jpg" class="planet" />
    <img src="/assets/images/animated/img2.jpg" class="planet" />
    <img src="/assets/images/animated/img3.jpg" class="planet" />
    <img src="/assets/images/animated/img4.jpg" class="planet" />
    <img src="/assets/images/animated/img5.jpg" class="planet" />
    <img src="/assets/images/animated/img6.jpg" class="planet" />
    <img src="/assets/images/animated/img7.jpg" class="planet" />
    <img src="/assets/images/animated/img8.jpg" class="planet" />
    <img src="/assets/images/animated/img9.jpg" class="planet" />
    <img src="/assets/images/animated/img10.jpg" class="planet" />
    <img src="/assets/images/animated/img11.jpg" class="planet" />
    <img src="/assets/images/animated/img12.jpg" class="planet" />
    <img src="/assets/images/animated/img13.jpg" class="planet" />
    <img src="/assets/images/animated/img14.jpg" class="planet" />
    <img src="/assets/images/animated/img15.jpg" class="planet" />
    <img src="/assets/images/animated/img16.jpg" class="planet" />
    <img src="/assets/images/animated/img17.jpg" class="planet" />
    <img src="/assets/images/animated/img18.jpg" class="planet" />
    <img src="/assets/images/animated/img19.jpg" class="planet" />
    <img src="/assets/images/animated/img20.jpg" class="planet" />
  </div>
</div>

<div class="benderaWrapper planet-gallery-wrapper bottom-gallery">
  <div class="planet-gallery reverse" id="reverseGallery">
     <img src="/assets/images/animated/img30.jpg" class="planet" />
    <img src="/assets/images/animated/img29.jpg" class="planet" />
    <img src="/assets/images/animated/img28.jpg" class="planet" />
    <img src="/assets/images/animated/img27.jpg" class="planet" />
    <img src="/assets/images/animated/img26.jpg" class="planet" />
    <img src="/assets/images/animated/img25.jpg" class="planet" />
    <img src="/assets/images/animated/img24.jpg" class="planet" />
    <img src="/assets/images/animated/img23.jpg" class="planet" />
    <img src="/assets/images/animated/img22.jpg" class="planet" />
    <img src="/assets/images/animated/img21.jpg" class="planet" />
    <img src="/assets/images/animated/img20.jpg" class="planet" />
    <img src="/assets/images/animated/img19.jpg" class="planet" />
    <img src="/assets/images/animated/img18.jpg" class="planet" />
    <img src="/assets/images/animated/img17.jpg" class="planet" />
    <img src="/assets/images/animated/img16.jpg" class="planet" />
    <img src="/assets/images/animated/img15.jpg" class="planet" />
    <img src="/assets/images/animated/img14.jpg" class="planet" />
    <img src="/assets/images/animated/img13.jpg" class="planet" />
    <img src="/assets/images/animated/img12.jpg" class="planet" />
    <img src="/assets/images/animated/img11.jpg" class="planet" />
     <img src="/assets/images/animated/img10.jpg" class="planet" />
    <img src="/assets/images/animated/img9.jpg" class="planet" />
    <img src="/assets/images/animated/img8.jpg" class="planet" />
    <img src="/assets/images/animated/img7.jpg" class="planet" />
    <img src="/assets/images/animated/img6.jpg" class="planet" />
    <img src="/assets/images/animated/img5.jpg" class="planet" />
  </div>
</div>



  <div class="container login-container <?= isset($error) ? 'container-display' : '' ?>" id="loginForm" >
    <div class="card shadow">
      <div class="card-body p-4 text-center">



         <img src="/assets/images/solusi-digital-logo.png" alt="Logo" class="login-logo mb-3">
        <h4 class="mb-3 text-red">Login</h4>
        <form action="/verify" method="post">
          
          <?php if(!empty($error)): ?>
          <div class="alert alert-danger" role="alert">
          <span class="alert-danger" id="error-msg" ><?= isset($error) ? $error : '' ?> </span>
          </div>
        <?php endif; ?>

          <div class="mb-3">
            <label>Email or Username</label>
            <input type="text" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
          <a class="mb-3 text-center" href="/register">Register New Account</a>
          <br>
          <a class="mb-3 text-center forgot-pass-wa"  href="#">Lupa Password</a>
          <br>
          <br>
          <p class="mb-3 text-center"><b>Solusi Digital</b> Ver : 1.2</p>
        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript" src="/assets/js/jquery-3.7.1.js"> </script>
  <?php if(!isset($error) && empty($second_visit)): ?>
    <script type="text/javascript" src="/assets/js/login-anim-motto.js"> </script>
  <?php endif; ?>
  <script type="text/javascript" src="/assets/js/login-forgot-pass.js"> </script>
  <script type="text/javascript" src="/assets/js/random-bg.js"> </script>
  <?php if (!empty($second_visit)): ?>
<script type="text/javascript" src="/assets/js/login-anim-motto2.js"> </script>
<?php endif; ?>

  

</body>
</html>
