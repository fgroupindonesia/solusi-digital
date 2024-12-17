const URL_USER_ADD 			= "/add-new-user";
const URL_LOGIN 			= "/portal";
const URL_CHECK_EMAIL_USER 	= "/check-email-exists";


$( document ).ready(function() { 


$('body').on('submit', '#registration-form', function(e){

	e.preventDefault();

	let datana = $(this).serialize();

	kirimPost(datana, URL_USER_ADD);

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
        			$('#error-msg').text('Email already used!');
        		}

        	}else if(urlNa == URL_USER_ADD){

        		if(data == 'valid'){
        			$('#error-msg').text('User Account Created Success!');

        			setTimeout(function(){
        				window.location = URL_LOGIN;
        			}, 3000);

        		}
        		

        	}
        	
        }
    }); // ajax ended

}