<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Permintaan Deposit Saldo Sedang Diproses!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body style="margin: 0; padding: 0; background-color: #f4f4f4;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td align="center" style="padding: 40px 0;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 6px; overflow: hidden; font-family: Arial, sans-serif;">

            <!-- Header -->
            <tr>
              <td align="center" style="background-color: #0d6efd; padding: 20px;">
                <img src="http://solusi-digital.fgroupindonesia.com/assets/images/solusi-digital-logo.png" width="80" height="80" style="border-radius: 50%;" alt="Logo">
              </td>
            </tr>

            <!-- Title -->
            <tr>
              <td align="center" style="padding: 30px 30px 10px 30px;">
                <h1 style="margin: 0; font-size: 24px; color: #333;">💲 Deposit Saldo </h1>
              </td>
            </tr>

            <!-- Body -->
            <tr>
              <td style="padding: 10px 30px 30px 30px; color: #555; font-size: 16px; line-height: 1.5;">
                <p style="margin: 0 0 10px 0;">Hello <?= $fullname; ?>!</p>
                <p style="margin: 0 0 10px 0;">
                  Permintaan deposit penambahan saldo kamu : <b><?= $amount; ?> </b>
                </p>
               
                <!-- 🆕 ORDER TABLE -->
    <table cellpadding="8" cellspacing="0" border="0" width="100%" style="margin-top: 20px; border-collapse: collapse; font-size: 15px;">
      <thead>
        <tr style="background-color: #f8f9fa; color: #333; text-align: left;">
          <th style="border: 1px solid #ddd;">Saldo Awal</th>
          <th style="border: 1px solid #ddd;">Deposit</th>
          <th style="border: 1px solid #ddd;">Total Saldo</th>
          <th style="border: 1px solid #ddd;">Tanggal Order</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="border: 1px solid #ddd;">Rp <?= $balance_before; ?></td>
          <td style="border: 1px solid #ddd;">Rp <?= $amount; ?></td>
          <td style="border: 1px solid #ddd;">Rp <?= number_format($balance_after, 0, ',', '.'); ?></td>
          <td style="border: 1px solid #ddd;"><?= $ordered_date; ?></td>
        </tr>
      </tbody>
    </table>

                <p style="margin: 0 0 10px 0;">
                  Silahkan screenshot bukti pembayaran ke nomor whatsapp official untuk mempercepat proses verifikasi! </b>
                </p>

              </td>
            </tr>

            <!-- Button -->
            <tr>
              <td align="center" style="padding: 0 30px 40px 30px;">
                <a href="<?= $admin_wa_url; ?>" style="background-color: #0d6efd; color: #ffffff; text-decoration: none; padding: 12px 25px; font-size: 16px; border-radius: 4px; display: inline-block;">Whatsapp Admin</a>
              </td>
            </tr>

            <tr>
              <td align="center" style="padding: 0 30px 40px 30px;">
                <a href="<?= $login_url; ?>" style="background-color: #0d6efd; color: #ffffff; text-decoration: none; padding: 12px 25px; font-size: 16px; border-radius: 4px; display: inline-block;">Periksa Sekarang</a>
              </td>
            </tr>

            <!-- Footer -->
            <tr>
              <td align="center" style="background-color: #f1f1f1; padding: 20px; font-size: 12px; color: #888;">
                &copy; <?= $year; ?> - <?= $company; ?>. All rights reserved.
              </td>
            </tr>

          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
