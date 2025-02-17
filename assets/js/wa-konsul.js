

$( document ).ready(function() {

	$('body').on('click', '.konsultasi-wa', function(e){

		e.preventDefault();

		let pesan = "Hello *Admin*, saya ingin konsultasi tentang *Solusi Digital*, bolehkan?";
		kirimWA(encodeURIComponent(pesan));

	});

	$('body').on('click', '.wa-link-pelayanan', function(e){

		let pelayanan = $(this).find('h3').text();
		e.preventDefault();

		let pesan = "Hello *Admin*, saya ingin *" + pelayanan + "* segera nih, boleh?";
		kirimWA(encodeURIComponent(pesan));

	});

	$('body').on('submit', '.php-email-form', function(e){

		$('button[type="submit"]').hide();
		$('.loading').show();

		e.preventDefault();

		setTimeout(function(){
			$('.sent-message').fadeIn();
			$('.loading').hide();

			let namana = $('#namana').val();
			let emailna = $('#emailna').val();
			let pertanyaanna = $('#pertanyaanna').val();
			let judulna = $('#judulna').val();

			let pesan = "Hello *Admin*, nama saya " + namana + " ingin konsultasi *" + judulna + "*, bolehkan? " + pertanyaanna;
			kirimWA(encodeURIComponent(pesan));

		}, 3000);
		
	});

});


function kirimWA(pesanna){


		let targetPhone = "6285795569337";

		let url = "https://api.whatsapp.com/send?phone="+ targetPhone + "&text=" + pesanna;

		window.location.href = url;


}