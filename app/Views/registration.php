<!DOCTYPE html>
<html>
<head>
  <title>Registration - Solusi Digital</title>
  
<link rel="stylesheet" type="text/css" href="/assets/css/login-style.css">
 <link rel="icon" type="image/png" sizes="16x16" href="/assets/plugins/images/favicon.png">

</head>   
<body>
  <div class="wave"></div>
  <div class="wave"></div>
  <div class="wave"></div>

    <div class="container">  
  <div class="inner-container">  
    <div id="logo-login-centered">
      <img id="logo-fg" src="/assets/plugins/images/fgroupindonesia.jpg" />
    </div>
    <h1 id="title-login">Registration</h1>
    <span id="error-msg"></span>
    <form id="registration-form" action="/add-new-user" method="post">
      <div class="form-group">
      <label for="fullname">Fullname:</label>
      <input required type="text" id="fullname" name="fullname" placeholder="Enter your fullname">
      </div>
      <div class="form-group">
      <label for="password">Password:</label>
      <input required type="password" id="password" name="pass" placeholder="Enter your password">
      </div>

      <div class="form-group">
      <label for="email">Email:</label>
      <input required type="email" id="email" name="email" placeholder="Enter your email">
      <input type="hidden" id="username" name="username">
      </div>

      <div class="form-group">
      <label for="whatsapp">Whatsapp:</label>
      <input required type="text" id="whatsapp" name="whatsapp" placeholder="Enter whatsapp number">
      </div>

      <div class="form-group">
      <label >Gender:</label>
      <input type="radio" required name="sex" value="male"> Male <br>
      <input type="radio" required name="sex" value="female"> Female <br>
      </div>

       <div class="form-group">
      <label >Interest:</label>
      <input type="radio" required name="role" value="team"> Worker <br>
      <input type="radio" required name="role" value="client"> Project Owner <br>
      </div>

      <div class="form-group">
        <input type="submit" value="Register" class="btn">
        <br> <hr>
        <span id="version">Rev : v1.2</span>
      </div>
    </form>
  </div>

<div class="roller">
    <span id="rolltext">Solusi Terbaik<br/>
    Akselerasi Bisnis Anda<br/>
    Dongkrak Performa<br/>
    Lejitkan Double Profit<br/>
    Dengan Asset Digital di <br/>
    <span id="spare-time">Solusi Digital</span><br/>
</div>

</div>



<script src="/assets/js/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".container").hide().fadeIn(1500);
      $("input").focus(function() {
        $(this).css("background-color", "#f2f2f2");
      });
      $("input").blur(function() {
        $(this).css("background-color", "#fff");
      });

     
    });
 
  </script>
  <script src="/assets/js/reg.js"></script>
</body>
</html>
