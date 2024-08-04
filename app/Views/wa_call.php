<script type="text/javascript">

	let params = new URLSearchParams(window.location.search);
	let nama = params.get('fullname');
	let email = params.get('email');

 	const phoneNumber = '+6285795569337';
	const message = 'Hello *Admin Jasa Upload*,\nSaya *'+ nama +'* ingin mendaftarkan\n'
+ '*Aplikasi Android ke GooglePlaystore*. Berikut ini Email saya : *' + email + '*.\n'
+ ' Mohon bantuannya...';


	setTimeout(function() {
  		sendMessageToWhatsApp(phoneNumber, message);
	}, 3000);	
	

function sendMessageToWhatsApp(number, message) {
  // Remove all non-numeric characters from the phone number
  const phoneNumber = number.replace(/\D/g, '');

  // Create the WhatsApp URL
  const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

  // Open the WhatsApp chat window in a current tab
  //window.open(url);
  window.location.href = url;
}

</script>

<center>
	<h3>Akun Sukses Terdaftar!</h3>
	<img src="/assets/images/email-success.gif">
</center>