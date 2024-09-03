const URL_USER_ADD = "/add-new-user";
const URL_APP_ADD = "/add-new-app";
const URL_DEPOSIT_ADD = "/add-new-deposit";
const URL_CAMPAIGN_ADD = "/add-new-campaign";

const URL_USER_DELETE = "/delete-user";
const URL_APP_DELETE = "/delete-app";
const URL_DEPOSIT_DELETE = "/delete-deposit";
const URL_ORDER_DELETE = "/delete-jasa-order";
const URL_CAMPAIGN_DELETE = "/delete-campaign";

const URL_USER_EDIT = "/edit-user";
const URL_APP_EDIT = "/edit-app";
const URL_DEPOSIT_EDIT = "/edit-deposit";

const URL_USER_UPDATE = "/update-user";
const URL_ORDER_UPDATE = "/update-jasa-order";
const URL_APP_UPDATE = "/update-app";
const URL_DEPOSIT_UPDATE = "/update-deposit";

const URL_DATA_VIRTUALVISITORS = "/upload-data-virtualvisitors";
//const URL_DATA_VIRTUALVISITORS = "/test";
const URL_ORDER_REQUEST_DETAIL = "/request-detail-jasa-order";
const URL_CAMPAIGN_REQUEST = "/request-campaign";
const URL_CAMPAIGN_SINGLE_REQUEST = "/request-single-campaign";

const URL_SETTINGS_UPDATE = "/update-settings";
var jumlahData = 0;


$( document ).ready(function() {

// this is for uploading data vvisitors into campaign
$('#existing-campaign select').on('change', function(){
	let hasil = $(this).val();

	if(hasil == 'new'){
		// show the new campaign
		$('#new-campaign').show();
		$('#existing-campaign').fadeOut();

		$(this).prop('selectedIndex', 0);
	}else{
		// hide the new campaign
		$('#new-campaign').fadeOut();
		$('#existing-campaign').show();


		let datana = {name : hasil};
		// ask the server to get the detail (id needed only)
		kirimPost(datana, URL_CAMPAIGN_SINGLE_REQUEST);

	}

});

$('#delete-campaign').on('click', function(e){
		e.preventDefault();
		let kapilih = $('#existing-campaign select').val();

		let u 		= $('#upload-virtualvisitors-hidden-username').val();
		let namana 	= $('#existing-campaign select').val();

		let datana = {name: namana, username : u};

		if(namana.length>0){
			kirimPost(datana, URL_CAMPAIGN_DELETE);
		}

});

$('#cancel-campaign').on('click', function(e){

	e.preventDefault();
	$('#existing-campaign').show();
	$('#new-campaign').hide();

});

// this is for uplading data vvisitors into campaign
$('#save-campaign').on('click', function(e){

		e.preventDefault();

		let u = $('#upload-virtualvisitors-hidden-username').val();
		let namana = $('#name-campaign').val();

		let datana = {name: namana, username : u};

		if(namana.length>0){
			kirimPost(datana, URL_CAMPAIGN_ADD);
		}

		showLoading('virtualvisitors', true);


});
   
// this is for uploading data as the virtualvisitors usage
$('#upload-virtualvisitors-attachment').on('change', function(){

	var file = $(this).val();

    if (file !== '') {

    var extension = file.split('.').pop().toLowerCase();
    if (extension === 'xlsx') {

			let orderidna = $('#upload-virtualvisitors-hidden-order-id').val();
			let campaignidna = $('#upload-virtualvisitors-hidden-campaign-id').val();
			let usernamena = $('#upload-virtualvisitors-hidden-username').val();
		   let filena = $('#upload-virtualvisitors-attachment').prop('files')[0]; 

			//console.log('orderna ' + orderidna);
			//console.log('usernamena ' + usernamena);

			var formData = new FormData();
			formData.append('virtualvisitorsfile', filena);
			formData.append('order_id', orderidna);
			formData.append('campaign_id', campaignidna);
			formData.append('username', usernamena);

			kirimPostUpload(formData, URL_DATA_VIRTUALVISITORS);	

	}else {
		alert('invalid file template!');
	}

	} 

});

 // this is for detail-order-link click
  $('.detail-order-link').on('click', function(e){
  		e.preventDefault();

  		$('.modal-loading').show();
  		let jenisNa = $(this).data('ordertype');
  		let idNa = $(this).data('orderid');

  		let dataOrder = {order_type : jenisNa, order_id: idNa};

  		kirimPost(dataOrder, URL_ORDER_REQUEST_DETAIL);

  });


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

  // this is for appbase click
  $('.opt-appbase').on('click', function(){
  	//alert('a');
  	$(this).toggleClass('opt-appbase-checked');
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
	clickOnForm('jasa-upgrade-fituraplikasi-form'); 
	clickOnForm('jasa-virtualvisitors-form'); 
	clickOnForm('jasa-pembuatanaplikasi-form'); 

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
		 var ordertype = [];

		 $('input[type="checkbox"]:checked').each(function(){
		 	var number = $(this).data('id');
		 	var otype =  $(this).data('order-type');

		 	idCollected.push(number);
		 	ordertype.push(otype);

		 }); 

		 console.log('we got ' + idCollected.length);
		 // helping the number of data for popup message
		 jumlahData = idCollected.length;

		 
		 let i=0;
		 for(i=0; i<idCollected.length; i++){

		 	let idna = idCollected[i];
		 	let otypena = ordertype[i];

		 	let dataNa = {id : idna, order_type: otypena};

		 	if(gawe == 'users'){
		 		kirimPost(dataNa, URL_USER_DELETE);
			}else if(gawe == 'apps') {
				kirimPost(dataNa, URL_APP_DELETE);
			}else if(gawe == 'orders') {
				kirimPost(dataNa, URL_ORDER_DELETE);
			}else if(gawe == 'deposits') {
				kirimPost(dataNa, URL_DEPOSIT_DELETE);
			}

			} // end of the loop

		 
		
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

function showLoading(entityname, boolstat){
	let containerna = entityname + "-progress";
	let loadingna = "status-"+ entityname+ "-loading";
	
	let namana = '#' + containerna;
	if(boolstat==true)
	$(namana).show();

	if(boolstat==false)
	$(namana).hide();
	
	namana = '#' + loadingna;
	if(boolstat==true){
		$(namana).show();
	}else{
		$(namana).hide();
	}

}

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
			let appbaseselected = [];

			// collect the checked item
			let idDivChecked = idGiven + " .opt-social-checked";
			//console.log('wer going to ' + idDivChecked);
			$(idDivChecked).each(function() {
				let socmed = $(this).data('value');
		  	socmedselected.push(socmed);
		  
			});

			// collect another item similar purpose
			idDivChecked = idGiven + " .opt-appbase-checked";
			//console.log('wer going to ' + idDivChecked);
			$(idDivChecked).each(function() {
				let socmed = $(this).data('value');
		  	appbaseselected.push(socmed);
		  
			});


			// embed another one based on different form ID names
			if(idFormGiven == 'jasa-virtualvisitors-form'){
				datana = datana + "&website=" + encodeURIComponent(JSON.stringify(appbaseselected));
			}else if(idFormGiven == 'jasa-upgrade-fituraplikasi-form' || idFormGiven == 'jasa-pembuatanaplikasi-form'){
				datana = datana + "&app_base=" + encodeURIComponent(JSON.stringify(appbaseselected));
			}else if(idFormGiven != 'jasa-follow-marketplace-form' && idFormGiven != 'jasa-wishlist-marketplace-form'){
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

        	if(urlNa == URL_CAMPAIGN_SINGLE_REQUEST){

        		// set the id of campaign selected
        		let json = JSON.parse(data);
        		let idcampaigna = json.id;
				$('#upload-virtualvisitors-hidden-campaign-id').val(idcampaigna);

        	}else if(urlNa == URL_CAMPAIGN_DELETE){

					showLoading('virtualvisitors', false);
        	 		kirimPost(dataForm, URL_CAMPAIGN_REQUEST);

        	 		alert(dataForm.name + ' is deleted!');

        	 	} else if(urlNa == URL_CAMPAIGN_REQUEST){
        	 		
        	 		let datain = JSON.parse(data);
        	 		let elemenBaru = "";
        	 		let elemenAkhir = "<option value='new'>Buat Baru</option>";

        	 		// the name is array format
        	 		for (const item of datain) {
					  		elemenBaru += "<option value='" + item.name + "'>" + item.name + "</option>";
					}

					elemenBaru += elemenAkhir;

        	 		$('#existing-campaign select').html(elemenBaru);
        	 		$('#existing-campaign').show();
        	 		$('#new-campaign').hide();

        	 		let hasil = $('#existing-campaign select').val();	
        	 		let datana = {name : hasil};
        	 		// get the id of this selected campaign
        	 		kirimPost(datana, URL_CAMPAIGN_SINGLE_REQUEST);

           }else if(urlNa == URL_CAMPAIGN_ADD){
        	 		
        	 		showLoading('virtualvisitors', false);
        	 		kirimPost(dataForm, URL_CAMPAIGN_REQUEST);

           }else if(urlNa == URL_ORDER_REQUEST_DETAIL){
        	 		let dataNa = JSON.parse(data);
        	 		console.log(dataNa.data);
        	 			
            			extractOrderDetailData(dataNa.data, dataForm.order_type);
           }else if(urlNa != URL_USER_EDIT && urlNa != URL_APP_EDIT && urlNa != URL_DEPOSIT_EDIT){
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
        					if(jumlahData<=1)
        				 alert('data berhasil terupdate!');
	        			}else{

	        				if(jumlahData<=1)
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

function extractOrderDetailData(argument, order_type) {
	
	let data = (argument);
	let formNa = $('#detail-order-form');

	let idSectionNa = '#detail-order-' + order_type.replace("_","-");

	console.log('memunculkan ' + idSectionNa);

	let sectionNa = $(idSectionNa);
	formNa.find('section').hide();
	
	setTimeout(function(){
		$('.modal-loading').hide();
		sectionNa.show();	
	},4000);
	
		$("#detail-order-username").val(data.username);
		$("#detail-order-date-created").val(data.date_created);

 if(order_type == 'pembuatanaplikasi' || order_type == 'upgrade_fituraplikasi'){
		$(idSectionNa + "-appbase").val(data.app_base);
		$(idSectionNa + "-title").val(data.title);
		$(idSectionNa + "-package").val(data.package);
		$(idSectionNa + "-notes").val(data.notes);

		if(order_type == 'upgrade_fituraplikasi'){
				$(idSectionNa + "-url").val(data.url);
		}


	}else if(order_type == 'virtualvisitors'){
		$(idSectionNa + "-website").val(data.website);
		$(idSectionNa + "-url").val(data.url);
		$(idSectionNa + "-business-name").val(data.business_name);
		$(idSectionNa + "-package").val(data.package);
		$(idSectionNa + "-gender").val(data.gender);
	}else if(order_type == 'comment'){
		$(idSectionNa + "-title").val(data.title);
		$(idSectionNa + "-url").val(data.url);
		$(idSectionNa + "-social-media").val(data.social_media);
		$(idSectionNa + "-package").val(data.package);
		$(idSectionNa + "-notes").val(data.notes);
	} else if(order_type == 'follow_marketplace'){
		$(idSectionNa + "-marketplace").val(data.marketplace);
		$(idSectionNa + "-url").val(data.url);
		$(idSectionNa + "-shop-name").val(data.shop_name);
		$(idSectionNa + "-gender").val(data.gender);
		$(idSectionNa + "-package").val(data.package);
		$(idSectionNa + "-notes").val(data.notes);
	} else if(order_type == 'wishlist_marketplace'){
		$(idSectionNa + "-marketplace").val(data.marketplace);
		$(idSectionNa + "-url").val(data.url);
		$(idSectionNa + "-shop-name").val(data.shop_name);
		$(idSectionNa + "-gender").val(data.gender);
		$(idSectionNa + "-package").val(data.package);
		$(idSectionNa + "-notes").val(data.notes);
	} else if(order_type == 'rating'){
		$(idSectionNa + "-social-media").val(data.social_media);
		$(idSectionNa + "-url").val(data.url);
		$(idSectionNa + "-business-name").val(data.business_name);
		$(idSectionNa + "-gender").val(data.gender);
		$(idSectionNa + "-package").val(data.package);
		$(idSectionNa + "-notes").val(data.notes);
	} else if(order_type == 'subscriber'){
		$(idSectionNa + "-social-media").val(data.social_media);
		$(idSectionNa + "-url").val(data.url);
		$(idSectionNa + "-account-name").val(data.account_name);
		$(idSectionNa + "-gender").val(data.gender);
		$(idSectionNa + "-package").val(data.package);
	} else if(order_type == 'view'){
		$(idSectionNa + "-social-media").val(data.social_media);
		$(idSectionNa + "-url").val(data.url);
		$(idSectionNa + "-title").val(data.title);
		$(idSectionNa + "-gender").val(data.gender);
		$(idSectionNa + "-package").val(data.package);
		$(idSectionNa + "-question").val(data.question);
		$(idSectionNa + "-valid-answer").val(data.valid_answer);

		let allanswer = "A : " + data.answer_a + "\n";
		allanswer += "B : " + data.answer_b + "\n";
		allanswer += "C : " + data.answer_c + "\n";
		allanswer += "D : " + data.answer_d + "\n";
		
		$(idSectionNa + "-answers").val(allanswer);
	}
	
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

function kirimPostUpload(datana, urlna){

$('#virtualvisitors-progress').show();
$('#status-virtualvisitors-loading').show();

//console.log('mau kirim ');

//for (var pair of datana.entries()) {
//  console.log(pair[0] + ': ');
//}
//console.table(datana.entries);


$.ajax({
  url: urlna,
   type: 'post',
   data: datana,
   cache: false,
   processData: false,
   contentType: false,
  success: function(response) {
    console.log(response);
    $('#status-virtualvisitors-error').hide();
    $('#status-virtualvisitors-loading').hide();

		$('#virtualvisitors-progress').hide();

  },
  error: function(e,f,g){
  	console.log(e + ' ' + f + ' ' + g);
  	$('#status-virtualvisitors-loading').hide();
  	$('#status-virtualvisitors-error').show();
  }

});



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