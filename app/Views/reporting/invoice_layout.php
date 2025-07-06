<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #fafafa;
    }

    
    .invoice-box {
      width: 600px;
      margin: auto;
      padding: 20px;
      border: 1px solid #eee;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .title-logo {
      text-align: center;
      margin-bottom: 10px;
    }

    .logo {
      width: 128px;
      height: 128px;
      display: block;
      margin: 0 auto;
    }

    h1, h2, h3 {
      text-align: center;
      margin: 10px 0;
    }

    .form-row {
      margin: 10px 0;
    }

    .form-label {
      display: inline-block;
      width: 200px;
      font-weight: bold;
      color: #555;
    }

    .form-value {
      display: inline-block;
      width: 350px;
      color: #333;
    }

   hr {
  margin: 20px 0;
  border: none;
  border-top: 2px solid #333; /* Warna gelap dan lebih tebal */
}

footer {
  font-size: 10px;
  color: #888;
  margin-top: 20px;
}


  </style>
</head>
<body>

  <div class="invoice-box">

    <div class="title-logo">
      <img class="logo" src="<?= $image_source; ?>" alt="Logo">
      <h1>Solusi Digital</h1>
    </div>

    <hr>

    <h2>Invoice</h2>

    <hr>

    <h3>Order Detail</h3>

    <br>

    <div class="form-row">
      <span class="form-label">Order Client Ref Code:</span>
      <span class="form-value"><?= $order_client_reff; ?></span>
    </div>

    <div class="form-row">
      <span class="form-label">Nama Pemesan:</span>
      <span class="form-value"><?= $fullname; ?></span>
    </div>

    <div class="form-row">
      <span class="form-label">Order Type:</span>
      <span class="form-value"><?= $order_type; ?></span>
    </div>

    <div class="form-row">
      <span class="form-label">Status:</span>
      <span class="form-value"><?= $status; ?></span>
    </div>

    <div class="form-row">
      <span class="form-label">Package:</span>
      <span class="form-value"><?= $package_name; ?></span>
    </div>

     <div class="form-row">
      <span class="form-label">Total Price:</span>
      <span class="form-value">Rp <?= number_format($total_price, 0, ',', '.'); ?></span>

    </div>

    <div class="form-row">
      <span class="form-label">Date Created:</span>
      <span class="form-value"><?= $date_created; ?></span>
    </div>

    <hr>

  </div>

  <footer><center>
    2021-<?= date('Y'); ?> © Solusi Digital developed by <b>FGroupIndonesia & Cinara Lab</b>
  </center>
  </footer>


</body>
</html>
