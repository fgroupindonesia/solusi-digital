<!DOCTYPE html>
<html>
<head>
  <title>Portal Login - Solusi Digital</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/css/bootstrap.min.css">  
<link rel="stylesheet" type="text/css" href="/assets/css/login-style.css">
 <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/solusi-digital-logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon.ico">

</head>   
<body>

  <?php if(!isset($error)) : ?>
  <div class="full-screen" id="intro">
    <img src="/assets/images/cinaralab-logo.png" class="logo" id="logo1" style="display:none;" />
    <img src="/assets/images/fgroupindonesia-logo.png" class="logo" id="logo2" style="display:none;" />
    <div class="motto" id="motto">⚡ Selamat datang ⚡</div>
  </div>
  <?php endif; ?>

  <div class="container login-container <?= isset($error) ? 'container-display' : '' ?>" id="loginForm" >
    <div class="card shadow">
      <div class="card-body p-4 text-center">
         <img src="/assets/images/solusi-digital-logo.png" alt="Logo" class="login-logo mb-3">
        <h4 class="mb-3 text-red">Login</h4>
        <form action="/verify" method="post">
          <span class="alert-danger" id="error-msg" ><?= isset($error) ? $error : '' ?> </span>
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
  <?php if(!isset($error)): ?>
    <script type="text/javascript" src="/assets/js/login-anim-motto.js"> </script>
  <?php endif; ?>
  <script type="text/javascript" src="/assets/js/login-forgot-pass.js"> </script>
  <script type="text/javascript" src="/assets/js/random-bg.js"> </script>


   </script>
  

</body>
</html>
