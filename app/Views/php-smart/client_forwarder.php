<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

$(document).ready(function() {
  
	<?php if($rotator_mode == 'origin'): ?>
		proceedByOrigin();
	<?php elseif($rotator_mode == 'device'): ?>
		proceedByDevice();
	<?php else : ?>
		proceedWA("<?= $cs_number; ?>");
	<?php endif; ?>

});

const _URL_UPDATE_INDEX = "/client/update-index";
const _URL_NEXT_DEVICE_CS = "/client/next-device-cs-number";
const _URL_NEXT_ORIGIN_CS = "/client/next-origin-cs-number";

function proceedWA(nomor){

const phoneNumber = nomor;
const message = "<?= $message; ?>";

const whatsappLink = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

window.location.href = whatsappLink;

}


function proceedByOrigin(){
	 let order_id = <?= $order_id; ?>;

	$.getJSON('https://ipinfo.io/json', function(data) {
    //alert("Your IP is " + data.city);

    let my_city = data.city.toLowerCase();
    
    showMessage('info', my_city);

     if(my_city != null){
    	getPhoneNumberByOrigin(my_city, order_id);
    }

  });

}

function proceedByDevice() {
  const ua = navigator.userAgent.toLowerCase();
  let machine = null;
  let order_id = <?= $order_id; ?>;

  if (ua.includes('android')) {
    machine = 'Android';
  } else if (ua.includes('iphone') || ua.includes('ipad') || ua.includes('ipod')) {
    machine = 'iPhone/iOS';
  } else if (ua.includes('windows') || ua.includes('macintosh') || ua.includes('linux')) {
    machine = 'Laptop/Desktop';
  } else {
    machine = 'Unknown';
  }

  machine = machine.toLowerCase();

  showMessage('info', machine);

    if(machine != null){
    	getPhoneNumberByDevice(machine, order_id);
    }


}

function getPhoneNumberByOrigin(cityna, id){

	let datana = {city: cityna, order_id: id };

	$.post({
    url: _URL_NEXT_ORIGIN_CS,
    data: datana,
    success: function(response) {
        let datana = JSON.parse(response);

        if(datana.status == 'valid'){
        	let phone = datana.cs_number;
        	proceedWA(phone);
    	}else {
    		console.log(response);
    		showMessage('error', 'data invalid!');
    	}
    },
    error: function(error) {
        console.log("Error:", error);
        showMessage('error', 'Server Error!');
    }
});


}

function getPhoneNumberByDevice(machine, id){

	let datana = {device: machine, order_id: id };

	$.post({
    url: _URL_NEXT_DEVICE_CS,
    data: datana,
    success: function(response) {
        let datana = JSON.parse(response);

        if(datana.status == 'valid'){
        	let phone = datana.cs_number;
        	proceedWA(phone);
    	}else {
    		console.log(response);
    		//alert('waw!' );
    		showMessage('error', 'data invalid!');
    	}
    },
    error: function(error) {
        console.log("Error:", error);
        showMessage('error', 'Server Error!');
    }
});


}

function showMessage(tipena, message){

	Swal.fire({
  title: tipena,
  text: message,
  icon: tipena,
  confirmButtonText: 'OK'
});

}

</script>