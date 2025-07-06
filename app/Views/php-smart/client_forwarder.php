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

const randomNumber = Math.floor(Math.random() * 100) + 1;
const _WEB_PATH = window.location.origin;
const _URL_UPDATE_INDEX = _WEB_PATH + "/client/update-index";
const _URL_NEXT_DEVICE_CS = _WEB_PATH + "/client/next-device-cs-number?v="+randomNumber;
const _URL_NEXT_ORIGIN_CS = _WEB_PATH + "/client/next-origin-cs-number?v="+randomNumber;

function proceedWA(nomor){

 let phoneNumber = nomor.trim();

    if (phoneNumber.startsWith("08")) {
        phoneNumber = "62" + phoneNumber.substring(1);
    }

const message = "<?= $message; ?>";

const whatsappLink = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

window.location.href = whatsappLink;

}


function proceedByOrigin(){
	 let order_id = <?= $order_id; ?>;
   let group_id = <?= $group_id; ?>;

	$.getJSON('https://ipinfo.io/json', function(data) {
    //alert("Your IP is " + data.city);

    let my_city = data.city.toLowerCase();
    
    showMessage('info', 'pengalihan ke tim CS kota : ' + my_city);

     if(my_city != null){
    	getPhoneNumberByOrigin(my_city, order_id, group_id);
    }

  });

}

function proceedByDevice() {
  const ua = navigator.userAgent.toLowerCase();
  let machine = null;
  let order_id = <?= $order_id; ?>;
  let group_id = <?= $group_id; ?>;

  if (ua.includes('android')) {
    machine = 'android';
  } else if (ua.includes('iphone') || ua.includes('ipad') || ua.includes('ipod')) {
    machine = 'iphone';
  } else if (ua.includes('windows') || ua.includes('macintosh') || ua.includes('linux')) {
    machine = 'laptop';
  } else {
    machine = 'unknown';
  }

  machine = machine.toLowerCase();

  showMessage('info', 'pengalihan ke tim CS perangkat : ' + machine);

    if(machine != null){
    	getPhoneNumberByDevice(machine, order_id, group_id);
    }


}

function getPhoneNumberByOrigin(cityna, id, gpid){

	let datana = {origin: cityna, order_id: id, group_id: gpid };

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
    		showMessage('error', 'data Origin invalid!');
    	}
    },
    error: function(error) {
        console.log("Error:", error);
        showMessage('error', 'Server Error!');
    }
});


}

function getPhoneNumberByDevice(machine, id, gpid){

	let datana = {device: machine, order_id: id, group_id: gpid};

console.log('kirim ' + JSON.stringify(datana) + ' ke URL ' + _URL_NEXT_DEVICE_CS);

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
    		showMessage('error', 'data Device invalid!');
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