<!DOCTYPE html>
<html>
<head>
  <title>Portal Login - Solusi Digital</title>
  
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
    <h1 id="title-login">Portal</h1>
    <span id="error-msg"><?= $status ?></span>
    <form action="/verify" method="post">
      <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username">
      </div>
      <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password">
      </div>
      <div class="form-group">
        <input type="submit" value="Login" class="btn">
        <br> <br>
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
</body>
</html>
