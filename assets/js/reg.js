const URL_USER_ADD 			= "/add-new-user";
const URL_REG_NEW_USER      = "/register-new-user";

const URL_LOGIN 			= "/portal";
const URL_CHECK_EMAIL_USER 	= "/check-email-exists";

let currentCaptcha = "";

$( document ).ready(function() { 

  // limit jumlah worker
  $('body').on('click', '.form-check-input', function(){

    let nilai = $(this).val();

    if(nilai=='team'){
      $(this).prop('checked', false);
      showMessage("error", "Maaf! Quota pendaftar sebagai worker sudah penuh!");
    }


  });


 // Initialize captcha
  drawCaptcha();

  // Refresh on canvas click
$('#captchaCanvas').on('click', drawCaptcha);

$('body').on('submit', '#registration-form', function(e){

	e.preventDefault();

	let lengkap = false;

    const userInput = $('#captchaInput').val().trim().toUpperCase();
    if (userInput === currentCaptcha) {
      $('#captchaResult').css('color', 'green').html('<img src="/assets/images/loading.gif"> <span> Processing...!</span>');
      lengkap = true;
    } else {
      $('#captchaResult').css('color', 'red').html('❌ Data Invalid! Coba lagi...');
      drawCaptcha();
    }

	let datana = $(this).serialize();

	if(lengkap)
	kirimPost(datana, URL_REG_NEW_USER);

}); // for submitting form reg


$('#email').on('input', function(){ 

	let emailna = $(this).val();
	let usernamena = '';

	if(emailna.includes('@')){
		usernamena = emailna.split('@')[0];
	}

	$('#username').val(usernamena);
	$('#error-msg').text('');

	usernamena = $('#username').val();

	// check dulu email nya
	let data = {email : emailna, username : usernamena};
	kirimPost(data, URL_CHECK_EMAIL_USER);


}); // for email typing used 

});


function kirimPost(dataForm, urlNa){
	
	console.log('kirim ke '+ urlNa +' ' + JSON.stringify(dataForm));

	// ajax started
	 $.ajax({
        url: urlNa,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){

        	//alert(data);

        	if(urlNa == URL_CHECK_EMAIL_USER){

        		if(data == 'error'){

        			 showMessage('error', '⛔ Email Sudah terdaftar! Pakailah email lain.');
               $('#email').val('');
        		}

        	}else if(urlNa == URL_USER_ADD){

        		
        		

        	}else if(urlNa == URL_REG_NEW_USER){

           if(data == 'valid'){
            
            showMessage('success', '✅ Registrasi Berhasil!');
          
              setTimeout(function(){
                window.location = URL_LOGIN;
              }, 3000);

            }else {

              showMessage('error', '⛔ Server Error!');
              
            }

            $('#captchaResult').html('');

          }
        	
        }
    }); // ajax ended

}

function showMessage(status, message){

   Swal.fire({
  icon: status,
  title: status,
  text: message,
  confirmButtonColor: '#3085d6',
});


}
 

  function generateCaptchaText(length = 5) {
    const chars = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
    let text = "";
    for (let i = 0; i < length; i++) {
      text += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return text;
  }

  function drawCaptcha() {

  	$('#captchaResult').html('');

    currentCaptcha = generateCaptchaText();
    const canvas = document.getElementById("captchaCanvas");
    const ctx = canvas.getContext("2d");

    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Background
    ctx.fillStyle = "#f3f3f3";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Noise lines
    for (let i = 0; i < 5; i++) {
      ctx.strokeStyle = `rgb(${Math.random()*255},${Math.random()*255},${Math.random()*255})`;
      ctx.beginPath();
      ctx.moveTo(Math.random()*canvas.width, Math.random()*canvas.height);
      ctx.lineTo(Math.random()*canvas.width, Math.random()*canvas.height);
      ctx.stroke();
    }

    // CAPTCHA text
    ctx.font = "30px Arial";
    ctx.fillStyle = "#000";
    for (let i = 0; i < currentCaptcha.length; i++) {
      const angle = (Math.random() * 0.4 - 0.2); // rotate -0.2 to +0.2 rad
      ctx.save();
      ctx.translate(20 + i * 25, 35);
      ctx.rotate(angle);
      ctx.fillText(currentCaptcha[i], 0, 0);
      ctx.restore();
    }
  }

