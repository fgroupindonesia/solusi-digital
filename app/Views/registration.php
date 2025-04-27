<!DOCTYPE html>
<html>
<head>
  <title>Portal Registrasi - Solusi Digital</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/css/bootstrap.min.css">  
<link rel="stylesheet" type="text/css" href="/assets/css/login-style.css">
 <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/solusi-digital-logo.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon.ico">

</head>   
<body class="bg-register">


  <div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow">
        <div class="card-body p-4 ">
          <h1 class="text-center mb-4" id="title-login">Registrasi Baru</h1>
          <span id="error-msg" class="text-danger text-center d-block mb-3"></span>
          
          <form id="registration-form" action="/add-new-user" method="post">
            
            <div class="mb-3">
              <label for="fullname" class="form-label">Fullname</label>
              <input class="form-control" required type="text" id="fullname" name="fullname" placeholder="nama lengkapmu">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input class="form-control" required type="password" id="password" name="pass" placeholder="kata kunci">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input class="form-control" required type="email" id="email" name="email" placeholder="email aktif yaa">
              <input type="hidden" id="username" name="username">
            </div>

            <div class="mb-3">
              <label for="whatsapp" class="form-label">Whatsapp</label>
              <input class="form-control" required type="text" id="whatsapp" name="whatsapp" placeholder="nomor whatsapp yang aktif">
            </div>

            <div class="mb-3">
              <label class="form-label d-block">Gender</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="male" id="genderMale" required>
                <label class="form-check-label" for="genderMale">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" value="female" id="genderFemale" required>
                <label class="form-check-label" for="genderFemale">Female</label>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label d-block">Interest</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" value="team" id="interestTeam" required>
                <label class="form-check-label" for="interestTeam">Worker</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" value="client" id="interestClient" required>
                <label class="form-check-label" for="interestClient">Project Owner</label>
              </div>
            </div>

            <div class="mb-3" id="captchaBox">
              <label class="form-label">CAPTCHA</label><br>
              <canvas id="captchaCanvas" width="150" height="50" class="mb-2 border"></canvas><br>
              <small class="text-muted">Captcha mau direfresh? Click gambarnya!</small>
            </div>

            <div class="mb-3">
              <input class="form-control" type="text" id="captchaInput" placeholder="Enter CAPTCHA" required>
              <div id="captchaResult" class="mt-2"></div>
            </div>

            <div class="d-grid">
              <input type="submit" value="Register" class="btn btn-primary">
            </div>

            <hr class="my-4">
             <a class="text-center" href="/portal">Back to login</a>
            <span id="version" class="text-muted d-block text-center"><b>Solusi Digital</b> Ver  : 1.2</span>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>



  <script type="text/javascript" src="/assets/js/jquery-3.7.1.js"> </script>
  <script type="text/javascript" src="/assets/js/sweetalert2@11.js"> </script>
  <script type="text/javascript" src="/assets/js/reg.js"> </script>
  <script type="text/javascript" src="/assets/js/random-bg.js"> </script>
  


   </script>
  

</body>
</html>
