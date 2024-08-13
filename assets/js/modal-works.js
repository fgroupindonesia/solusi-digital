const URL_USER_ADD = "/add-new-user";
const URL_APP_ADD = "/add-new-app";
const URL_DEPOSIT_ADD = "/add-new-deposit";

const URL_USER_DELETE = "/delete-user";
const URL_APP_DELETE = "/delete-app";
const URL_DEPOSIT_DELETE = "/delete-deposit";
const URL_ORDER_DELETE = "/delete-jasa-order";

const URL_USER_EDIT = "/edit-user";
const URL_APP_EDIT = "/edit-app";
const URL_DEPOSIT_EDIT = "/edit-deposit";

const URL_USER_UPDATE = "/update-user";
const URL_ORDER_UPDATE = "/update-jasa-order";
const URL_APP_UPDATE = "/update-app";
const URL_DEPOSIT_UPDATE = "/update-deposit";

const URL_SETTINGS_UPDATE = "/update-settings";
var jumlahData = 0;


$( document ).ready(function() {
   
   // this is for approve click
  $('.link-approve').on('click', function(e){
  		e.preventDefault();
  		let entitiNa = $(this).data('entity');

  		postOrderStatus(entitiNa, 'approved');

  });

   // this is for cancel click
  $('.link-cancel').on('click', function(e){
  		e.preventDefault();
  		let entitiNa = $(this).data('entity');

  		postOrderStatus(entitiNa, 'cancel');

  });

  // this is for social media click
  $('.opt-social').on('click', function(){
  	//alert('a');
  	$(this).toggleClass('opt-social-checked');
  });

	// this is for wa message
	$('.msg-user-wa').on('click', function(){
		var nowa = $(this).data('phone');
		messageWA(nowa);
	});

	// this is for email activation notification 
	// through email
	$('.activation-user-email').on('click', function(e){
		e.preventDefault();
		var idNa = $(this).data('id');
		var typeNa = 'activation';
		var buttonNa = $(this);

		sendEmail(idNa, typeNa, buttonNa);

	});


    // this is for user form
	$('#user-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});
	// user form done!

 // this is for deposit form (for client)
	$('#add-deposit-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});
	//  deposit form done!

	// this is for deposit form (for admin)
	$('#add-deposit-admin-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});
	//  deposit form done!


    // this is for app form
	$('#app-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});
	// app form done!


	// this is for settings form
	$('#setting-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});
	// settings form done!

	// this is for jasa form that has social media div clicked opt
	clickOnForm('jasa-komen-form'); 
	clickOnForm('jasa-view-form'); 
	clickOnForm('jasa-rating-form'); 
	clickOnForm('jasa-follow-marketplace-form'); 
	clickOnForm('jasa-wishlist-marketplace-form'); 
	clickOnForm('jasa-subscriber-form'); 


	// this is for check all checkboxes
	$('#check-all').on('click', function(){
		var stat = $(this).prop('data-state');
		if(stat == 'active'){
			$('input[type="checkbox"]').prop('checked',true);
			$(this).prop('data-state', 'inactive');
		}else{
			$('input[type="checkbox"]').prop('checked',false);
			$(this).prop('data-state', 'active');
		}

		// count the items
		 var count = $('input[type="checkbox"]:checked').length;
		 $('#active-checked').text(count);

		
	});
	// check all checkboxes done!


	// this is for check single checkbox
	$('.user-checked').on('click', function(){
		
		// count the items
		 var count = $('input[type="checkbox"]:checked').length;
		 $('#active-checked').text(count);

		
	});
	// check all single checkbox done!

	// this is for delete link
	$('.link-delete').on('click', function(e){
		e.preventDefault();

		let gawe = $(this).data('entity');
		//alert('gawean' + gawe);
		showLoadingManagement(true);

	 	// grab  the id
		 var idCollected = [];
		 $('input[type="checkbox"]:checked').each(function(){
		 	var number = $(this).data('id');
		 	idCollected.push(number);
		 }); 

		 console.log('we got ' + idCollected.length);
		 // helping the number of data for popup message
		 jumlahData = idCollected.length;

		 idCollected.forEach(function(el){
		 	let dataNa = {id : el};

		 	if(gawe == 'users'){
		 		kirimPost(dataNa, URL_USER_DELETE);
			}else if(gawe == 'apps') {
				kirimPost(dataNa, URL_APP_DELETE);
			}else if(gawe == 'orders') {
				kirimPost(dataNa, URL_ORDER_DELETE);
			}else if(gawe == 'deposits') {
				kirimPost(dataNa, URL_DEPOSIT_DELETE);
			}

		 });
		 
		
	});
	// check all delete link done!


	// this is for edit link
	$('.link-edit').on('click', function(e){
		e.preventDefault();

		let gawe = $(this).data('entity');
		//alert('gawean' + gawe);

	 	// grab  the id
		 var idCollected = [];
		 $('input[type="checkbox"]:checked').each(function(){
		 	var number = $(this).data('id');
		 	idCollected.push(number);
		 }); 

		 console.log('we got ' + idCollected.length);

		 // but we only process the 1st one
		 	let el = idCollected[0];
		 	let dataNa = {id : el};

		 	if(gawe == 'users'){
		 		kirimPost(dataNa, URL_USER_EDIT);
		 	}else if(gawe == 'apps'){
		 		kirimPost(dataNa, URL_APP_EDIT);
		 	}else if(gawe == 'deposits'){
		 		kirimPost(dataNa, URL_DEPOSIT_EDIT);
		 	}else if(gawe == 'orders'){
		 		kirimPost(dataNa, URL_ORDER_EDIT);
		 	}
			
	});
	// check all edit link done!


});

function postOrderStatus(entityNa, stat){


		//alert('gawean' + gawe);
		showLoadingManagement(true);

	 	// grab  the id
		 var idCollected = [];
		 $('input[type="checkbox"]:checked').each(function(){
		 	var number = $(this).data('id');
		 	idCollected.push(number);
		 }); 

		 console.log('we got ' + idCollected.length);

		 idCollected.forEach(function(el){
		 	let dataNa = {id : el, status: stat};

		 	if(entityNa == 'orders'){
				kirimPost(dataNa, URL_ORDER_UPDATE);
			}

		});

}

function clickOnForm(idFormGiven){

let idGiven = "#" + idFormGiven; 

$(idGiven).on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();
			let socmedselected = [];

			// collect the checked item
			let idDivChecked = idGiven + " .opt-social-checked";
			//console.log('wer going to ' + idDivChecked);
			$(idDivChecked).each(function() {
				let socmed = $(this).data('value');
		  	socmedselected.push(socmed);
		  
		});

			// embed another one based on different form ID names
			if(idFormGiven != 'jasa-follow-marketplace-form' && idFormGiven != 'jasa-wishlist-marketplace-form'){
				datana = datana + "&social_media=" + encodeURIComponent(JSON.stringify(socmedselected));
			}else{
				datana = datana + "&marketplace=" + encodeURIComponent(JSON.stringify(socmedselected));
			}

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});


}

function showLoadingManagement(stat){
	if(stat == true){
		$('#management-loading').show();
		$('.link-delete').attr('disabled', 'disabled');
	}else{
		$('#management-loading').hide();
		$('.link-delete').removeAttr('disabled');
	}
}

	
function sendEmail(idNa, typeNa, buttonNa){

console.log('kirim email activation!');
let urlNa = "/send-email";
let dataCome = {'id' : idNa, 'type' : typeNa};

	$.ajax({
        url: urlNa,
        data: (dataCome),
        cache : false,
        type: 'POST',
        success: function(data){
        		buttonNa.html("<span>Sent!</span>");
        		buttonNa.removeClass("btn-warning");
	       		buttonNa.addClass("btn-info");
        }
      });

}

function kirimPost(dataForm, urlNa){
	
	console.log('kirim ke '+ urlNa +' ' + JSON.stringify(dataForm));

	 $.ajax({
        url: urlNa,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){
        	if(urlNa != URL_USER_EDIT && urlNa != URL_APP_EDIT && urlNa != URL_DEPOSIT_EDIT){
        		setTimeout(function(){
        			if(urlNa == URL_SETTINGS_UPDATE){
        		var dForm = convertIntoJSON(dataForm);
    				var cridential = "username=" + dForm.username+ "&pass=" + dForm.pass;
        			location.href = "/verify-manual?reloggin=true&" + cridential;
    				//location.replace('l')

        			}else{
        				// if the form is comming but not from settings call
        				//alert(data);
        				if(URL_ORDER_DELETE == urlNa || urlNa == URL_ORDER_UPDATE){
        					if(jumlahData<5)
        				 alert('data berhasil terupdate!');
	        			}else{

	        				if(jumlahData<5)
	        				alert('data berhasil dipesan!');

  	       			}
         			location.reload();

        			}
        		}, 2000);
            	
            }else{
            	// extract the data into form
            	if(data != 'none'){
            		if(urlNa == URL_USER_EDIT){
            			$('#user-form-modal').modal('show'); 
            			extractUserData(data);
            		}else if(urlNa == URL_APP_EDIT){
            			$('#app-form-modal').modal('show'); 
            			extractAppData(data);
            		}else if(urlNa == URL_DEPOSIT_EDIT){
            			$('#add-deposit-admin-form-modal').modal('show'); 
            			extractDepositData(data);
            		}
            	}
            }
        }
    });

}

function extractUserData(argument) {
	
	let data = JSON.parse(argument);
	let formNa = $('#user-form-modal');
	formNa.find('#username').val(data.username);
	formNa.find('#pass').val(data.pass);
	formNa.find('#occupation').val(data.occupation);
	formNa.find('#email').val(data.email);	
	formNa.find('#whatsapp').val(data.whatsapp);
	formNa.find('#user-hidden-id').val(data.id);

	if(data.sex == 'male'){
		formNa.find('#user_sex_male').prop('checked', true);		
	}else{
		formNa.find('#user_sex_female').prop('checked', true);
	}

	// we changed the destination form to update user form
	formNa.find('#user-form').attr('action', URL_USER_UPDATE);


}

function extractDepositData(argument) {
	
	let data = JSON.parse(argument);
	let formNa = $('#add-deposit-admin-form-modal');
	formNa.find('#add-deposit-admin-username').val(data.username);
	formNa.find('#add-deposit-admin-status').val(data.status);
	formNa.find('#add-deposit-admin-user-hidden-id').val(data.id);

	if(data.amount == 50){
		formNa.find('#add-deposit-admin-50').prop('checked', true);		
	}else if(data.amount == 100){
		formNa.find('#add-deposit-admin-100').prop('checked', true);		
	}else if(data.amount == 200){
		formNa.find('#add-deposit-admin-200').prop('checked', true);		
	}else if(data.amount == 500){
		formNa.find('#add-deposit-admin-500').prop('checked', true);		
	}else if(data.amount == 1000){
		formNa.find('#add-deposit-admin-1000').prop('checked', true);		
	}

	// we changed the destination form to update deposit form
	formNa.find('#add-deposit-admin-form').attr('action', URL_DEPOSIT_UPDATE);


}

function extractAppData(argument) {
	
	let data = JSON.parse(argument);
	let formNa = $('#app-form-modal');
	formNa.find('#apps_name').val(data.apps_name);
	formNa.find('#descriptions').val(data.descriptions);
	formNa.find('#icon').val(data.icon);
	formNa.find('#best_screenshot').val(data.best_screenshot);	
	formNa.find('#privacy_url').val(data.privacy_url);
	formNa.find('#app-hidden-id').val(data.id);

	// we changed the destination form to update user form
	formNa.find('#app-form').attr('action', URL_APP_UPDATE);


}

function messageWA(nomer){
	var msg = "*Hey!* Admin mau ngomong...";
	var url = 'https://api.whatsapp.com/send?phone=' + nomer + '&text=' + msg;
	location.href = url;
} 

function convertIntoJSON(dataSerialized){


var dataArray = dataSerialized.split("&"); // Step 2
var jsonObject = {}; // Step 3

for (var i = 0; i < dataArray.length; i++) {
  var keyValue = dataArray[i].split("="); // Split each key-value pair
  var key = decodeURIComponent(keyValue[0]); // Decode the key
  var value = decodeURIComponent(keyValue[1]); // Decode the value
  jsonObject[key] = value; // Assign the key-value pair to the object
}

var jsonString = JSON.stringify(jsonObject); // Step 4

return jsonObject;

}