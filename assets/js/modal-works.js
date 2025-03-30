const URL_USER_ADD 		= "/add-new-user";
const URL_PACKAGE_ADD 	= "/add-new-package";
const URL_APP_ADD 		= "/add-new-app";
const URL_DEPOSIT_ADD 	= "/add-new-deposit";
const URL_CAMPAIGN_ADD 	= "/add-new-campaign";
const URL_LAYANANMANUAL_ADD 	= "/add-new-layananmanual";
const URL_SOCIALMEDIA_ADD 	= "/add-new-socialmedia";
const URL_THEME_LANDINGPAGE_ADD 	= "/add-new-theme-landingpage";

const URL_USER_DELETE 		= "/delete-user";
const URL_PACKAGE_DELETE 	= "/delete-package";
const URL_APP_DELETE 		= "/delete-app";
const URL_DEPOSIT_DELETE 	= "/delete-deposit";
const URL_ORDER_DELETE 		= "/delete-jasa-order";
const URL_CAMPAIGN_DELETE 	= "/delete-campaign";
const URL_VIRTUALVISITORS_DELETE 	= "/delete-virtualvisitors";
const URL_LAYANANMANUAL_DELETE 	= "/delete-layananmanual";
const URL_SOCIALMEDIA_DELETE 	= "/delete-socialmedia";
const URL_WA_CHAT_ROTATOR_DELETE 	= "/delete-wa-chat-rotator";
const URL_THEME_LANDINGPAGE_DELETE 	= "/delete-theme-landingpage";

const URL_USER_EDIT 		= "/edit-user";
const URL_PACKAGE_EDIT 		= "/edit-package";
const URL_APP_EDIT 			= "/edit-app";
const URL_DEPOSIT_EDIT 		= "/edit-deposit";
const URL_VIRTUALVISITORS_EDIT 		= "/edit-virtualvisitors";
const URL_LAYANANMANUAL_EDIT 		= "/edit-layananmanual";
const URL_SOCIALMEDIA_EDIT 		= "/edit-socialmedia";
const URL_WA_CHAT_ROTATOR_EDIT 		= "/edit-wa-chat-rotator";
const URL_CS_SCHEDULE_WA_CHAT_ROTATOR_EDIT 		= "/edit-wa-chat-rotator-cs-schedule";
const URL_THEME_LANDINGPAGE_EDIT	= "/edit-theme-landingpage";

const URL_USER_UPDATE 		= "/update-user";
const URL_THEME_LANDINGPAGE_UPDATE	= "/update-theme-landingpage";
const URL_PACKAGE_UPDATE 	= "/update-package";
const URL_ORDER_UPDATE 		= "/update-jasa-order";
const URL_APP_UPDATE 		= "/update-app";
const URL_DEPOSIT_UPDATE 	= "/update-deposit";
const URL_LAYANANMANUAL_UPDATE 	= "/update-layananmanual";
const URL_SOCIALMEDIA_UPDATE 	= "/update-socialmedia";
const URL_WA_CHAT_ROTATOR_UPDATE 	= "/update-wa-chat-rotator";
const URL_CS_REGION_WA_CHAT_ROTATOR_UPDATE 	= "/update-wa-chat-rotator-cs-region";
const URL_CS_SCHEDULE_WA_CHAT_ROTATOR_UPDATE 	= "/update-wa-chat-rotator-cs-schedule";
const URL_WA_CHAT_ROTATOR_SCRIPT_READY = "/check-wa-chat-rotator-script-ready";

const URL_DATA_VIRTUALVISITORS = "/upload-data-virtualvisitors";
const URL_DATA_LAYANANMANUAL = "/upload-data-layananmanual";

//const URL_DATA_VIRTUALVISITORS = "/test";
const URL_ORDER_REQUEST_DETAIL = "/request-detail-jasa-order";
const URL_CAMPAIGN_REQUEST = "/request-campaign";
const URL_CAMPAIGN_SINGLE_REQUEST = "/request-single-campaign";

const URL_SETTINGS_UPDATE = "/update-settings";


const URL_ENTRY_JS_ENDPOINT = "https://cdn.fgroupindonesia.com/virtualvisitors/js?";
const _URL_ENTRY_WA_CHAT_ROTATOR = "https://sd.fgroupindonesia.com/";

var jumlahData = 0;

// for modal anti refreshing capabilities
let _ref_wac = null;


$( document ).ready(function() {

enablePopper();

// this is for changing days to select dropdown
// in the modal schedule
$('.cs_days_selected').on('change', function(){


	let total = $('.cs_days_selected').length;
  let checked = $('.cs_days_selected:checked').length;

  if(total != checked){
  	$('#cs_day_mode').val('custom');
  }else{
  	$('#cs_day_mode').val('all');
  }

});

// this is for changing hour in modal schedule
$('#hour_open').on('change', function(){

	// if i change hour open, then the hour closed will changed too
	let hour_chosen = $(this).val();
	let hour = hour_chosen.split(":")[0]; 
	let minute = hour_chosen.split(":")[1];
	let h = parseInt(hour, 10);
	let m = parseInt(minute, 10);

	createTime24Hours('#hour_closed', h, m);

});

// this is for disabling checkbox in modal schedule
$('#cs_day_mode').on('change', function(){

	let div_days = $('.day-container');

	if($(this).val()=='all'){
		// check all
		
		div_days.find('input[type=checkbox]').prop('checked', true);

	}else{
		div_days.find('input[type=checkbox]').prop('checked', false);
	}

});

// this is for dropdown
$('#wa-chat-rotator-custom-form #rotator_mode').on('change', function(){

  let ops= 	$(this).val();
  if(ops == 'device'){
  	$('.device_wa').show();
  	$('.add_region').hide();
  	$('.add_schedule').hide();
  }else if(ops == 'origin'){
  	$('.device_wa').hide();
  	$('.add_region').show();
  	$('.add_schedule').hide();
  }else if(ops == 'schedule'){
  	$('.device_wa').hide();
  	$('.add_region').hide();
  	$('.add_schedule').show();
  }else{
  	$('.device_wa').hide();
  	$('.add_region').hide();
  	$('.add_schedule').hide();
  }

});



// this part is for mapping modals
// making it refreshed
$('#wa-chat-rotator-region-modal').on('shown.bs.modal', function () {
             setTimeout(() => {
            map.invalidateSize(); 
        }, 300); 
});

// this is when the 2nd modal dissapered
$('#wa-chat-rotator-region-modal').on('hidden.bs.modal', function () {
             setTimeout(() => {
            $('#wa-chat-rotator-custom-modal').modal('show');
        }, 500); 
});

// this is when the 2nd modal dissapered
$('#wa-chat-rotator-schedule-modal').on('hidden.bs.modal', function () {
             setTimeout(() => {
            $('#wa-chat-rotator-custom-modal').modal('show');
        }, 500); 
});

$('#wa-chat-rotator-schedule-modal').on('shown.bs.modal', function () {
            
            // taken from the earlier modal value
            let orderid = $('#wa-chat-rotator-custom-user-hidden-id').val();
            $('#wa-chat-rotator-schedule-user-id').val(orderid);

            // request the details if any
            // then extract into the form
            let formulir = $('#wa-chat-rotator-schedule-form');

            let cs_num = formulir.find('#cs_number').val();

            let datana = {cs_number: cs_num, order_id: orderid};
            kirimPost(datana, URL_CS_SCHEDULE_WA_CHAT_ROTATOR_EDIT);


            createTime24Hours('#hour_open',0,0);
            createTime24Hours('#hour_closed',0,0);

});


// this part to take the number then selected to the schedule modal
$('body').on('click','.add_schedule', function(e){

	
	let parent = $(this).parent();

	let input = parent.find('input');
	let nomer_cs = input.val();

	let scmodal = $('#wa-chat-rotator-schedule-modal');
	scmodal.find('#cs_number').val(nomer_cs);

	// hide first because later will be called after 500ms by hidden.bs.modal
	// detector
	$('#wa-chat-rotator-custom-modal').modal('hide');

});

// this part to take the number then selected to the map
$('body').on('click','.add_region', function(e){

	
	let parent = $(this).parent();

	let input = parent.find('input');
	let nomer_cs = input.val();


	$('#no_wa_cs_region').text(nomer_cs);
	// hide first because later will be called after 500ms by hidden.bs.modal
	// detector
	$('#wa-chat-rotator-custom-modal').modal('hide');

});

// this part for identifier mode
$('body').on('click', '#identifier_mode', function(){

	let ops = $(this).val();
	
	if(ops=='manual' || ops=='button contains' || ops=='link contains'){

		$('#identifier_tag').show();
	}else{
		$('#identifier_tag').hide();
	}

});

// this part for adding more wa and web
$('body').on('click', '.delete_input', function(){ 

	let el = $(this).parent();
	el.remove();

});

// this part for adding more wa and web
$('body').on('click', '.add_input', function(){

	let entity = $(this).attr('entity');
	
	let rot_mode = $('#rotator_mode').val();
	let jumlah_cs_terpakai = $('input.nomor_wa_cs').length;
	let jumlah_web_terpakai = $('input.web_url').length;

	let jenis_package = $('#wa-chat-rotator-custom-package').val();

	if(jenis_package == 'gratis' && entity == 'nomor_wa_cs'){
		
		
		if(jumlah_cs_terpakai<2){
			boleh =true;
		}else{
			boleh =false;
		}

	}else if(jenis_package == 'bisnis' && entity == 'nomor_wa_cs'){
		
		
		if(jumlah_cs_terpakai<20){
			boleh =true;
		}else{
			boleh =false;
		}

	}else if(jenis_package == 'developer' && entity == 'nomor_wa_cs'){
		
		
		if(jumlah_cs_terpakai<100){
			boleh =true;
		}else{
			boleh =false;
		}

	}

	if(jenis_package == 'gratis' && entity == 'web_url'){
		
		
		if(jumlah_web_terpakai<1){
			boleh =true;
		}else{
			boleh =false;
		}

	}else if(jenis_package == 'bisis' && entity == 'web_url'){
		
		
		if(jumlah_web_terpakai<3){
			boleh =true;
		}else{
			boleh =false;
		}

	}else if(jenis_package == 'developer' && entity == 'web_url'){
		
			boleh =true;
		

	}

	if(boleh)
	addInputWAChatRotator(entity, null, rot_mode);


	if(!boleh)
		showAlert('quota ' + entity + ' sudah habis bro!');
	
});

// this part for taking code 
// into modal script
$('body').on('click', '.access-code', function(e){

	e.preventDefault();
	let reff = $(this).attr('data-client-reff');

	let as_script = "<script src='LINK'></script>";
	let url_js = _URL_ENTRY_WA_CHAT_ROTATOR + "client/?code=" + reff;

	let new_code = as_script.replace('LINK', url_js);
	$('#wa-chat-rotator-script-model').val(new_code);

		// check the status
		let datana = {code: reff};
		kirimPost(datana, URL_WA_CHAT_ROTATOR_SCRIPT_READY);

});


// script copy for wa chat rotator
$('body').on('click', '#copy-code', function(){

	let el = $('#wa-chat-rotator-script-model');
	let code = el.val();
	el.select();
    el[0].setSelectionRange(0, 99999); 
               
    let tooltip_code = $('#tooltip-code');

   document.execCommand("copy");

   $('#message-copy').text('copied...');

   setTimeout(function(){
		$('#message-copy').fadeOut();   		
   },2000);
   
});

// this part for enabling the add deposit form
// back to normal
$('#add-deposit-form-modal').on('shown.bs.modal', function () {
    $('#deposit-option').show();
    $('#payment-method-doc').hide();
});

// these parts for format os modal work
$('#format-os-contact-person-type-self').on('change', function(){

	// take the hidden data
	// into the form
	let myname = $('')

	$('#format-os-contact-person-name').val(myname);
	$('#format-os-contact-person-wa').val(mywa);	
	
});

$('#format-os-contact-person-type-other').on('change', function(){

	$('#format-os-contact-person-name').val('');
	$('#format-os-contact-person-wa').val('');
	
});


// these parts below are for enabling the save button of each modals
	displaySubmitFor('jasa-upgrade-fituraplikasi-form');
	displaySubmitFor('jasa-pembuatanaplikasi-form');
	displaySubmitFor('jasa-virtualvisitors-form');
	displaySubmitFor('jasa-subscriber-form');
	displaySubmitFor('jasa-rating-form');
	displaySubmitFor('jasa-komen-form');
	displaySubmitFor('jasa-view-form');
	displaySubmitFor('jasa-follow-marketplace-form');
	displaySubmitFor('jasa-wishlist-marketplace-form');
	displaySubmitFor('layananmanual-form');
	displaySubmitFor('socialmedia-form');
	displaySubmitFor('wa-chat-rotator-form');
	displaySubmitFor('wa-chat-rotator-custom-form');
	displaySubmitFor('wa-chat-rotator-schedule-form');
	displaySubmitFor('theme-landingpage-form');



// this is for checked all and uncheck them directly!
$('.link-all').on('click', function(e){
	e.preventDefault();

	$('input[class="package-checked"]').prop('checked', function() {
    return !$(this).prop('checked');
  	});

	let tulisan = $(this).text();
	if(tulisan == "Select All"){
		$(this).text("Unselect All");
	}else{
		$(this).text("Select All");
	}

});


// this is for paket wa rotator
$('body').on('click', '.wa-rotator-paket', function(){

	let paket = $(this).attr('data-paket');

	let target_id = '#deskripsi-' + paket;

	// hide all
	$('#deskripsi-vip').hide();
	$('#deskripsi-developer').hide();
	$('#deskripsi-gratis').hide();
	$('#deskripsi-bisnis').hide();

	// show last
	$(target_id).show();

	// show the price too
	let harga = $(this).attr('data-harga');
	let harga_text = "Rp " + harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

	let target_harga_id = '#harga-paket-' + paket;

	$(target_harga_id).text(harga_text);

});

// this is for package form modal popup
$('#base_price_package').keyup(function(e){

	hitungTotalPricePackage();
	//alert('a');

});

$('#quota_package').keyup(function(e){

	hitungTotalPricePackage();
	//alert('a');

});

// package-form modal done

// this is for campaign creation of modal popup Upload data
	//  when the user press button Enter
	// inside a form
$('#upload-virtualvisitors-form').on('submit', function(e){
	e.preventDefault();

		let namana = $('#name-campaign').val();
		if(namana.length>0){
			$('#save-campaign').click();
		}

})

// this is for code js vvisitors selected campaign
$('#existing-campaign-code select').on('change', function(){
	let hasil = $(this).val();

	let datana = {name : hasil};
		// ask the server to get the detail (id needed only)
	kirimPost(datana, URL_CAMPAIGN_SINGLE_REQUEST);

});

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
			// clear up
			$('#name-campaign').val('');
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

	 // this is for wa-chat-rotator-schedule-form
	$('#wa-chat-rotator-schedule-form').on('submit', function(e){
			e.preventDefault();
			//$('.btn-save').hide();
			//$('.btn-close-custom').hide();
			//$('.modal-loading').fadeIn();
			
			let datana = $(this).serialize();
			
			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

			$('#wa-chat-rotator-schedule-modal').modal('hide');
	});


	 // this is for package form
	$('#package-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			// change back the rupiahs
			let tharga = $('#total_price_package').val();
			let hargaOnly = clearAllCurrency(tharga);
			$('#total_price_package').val(hargaOnly);

			let datana = $(this).serialize();
			

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);
	});
	// package form done!

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

	  // this is for theme landingpage form
	$('#theme-landingpage-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = new FormData($(this)[0]);

			let tujuanURL = $(this).attr('action');
			kirimPostUpload(datana, tujuanURL);

	});
	// theme landingpage form done!

	 // this is for layananmanual form
	$('#layananmanual-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = new FormData($(this)[0]);

			let tujuanURL = $(this).attr('action');
			kirimPostUpload(datana, tujuanURL);

	});
	// layananmanual done!

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



	// this is for wa-chat-rotator form
	$('#wa-chat-rotator-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});
	// wa-chat-rotator form done!

	// this is for wa-chat-rotator-custom form
	$('#wa-chat-rotator-custom-form').on('submit', function(e){
			e.preventDefault();
			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			let datana = $(this).serialize();

			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);

	});
	// wa-chat-rotator-custom form done!

	// this is for wa-chat-rotator-region form
	$('#wa-chat-rotator-region-modal .btn-save').on('click', function(e){
			e.preventDefault();
			//$('.btn-save').hide();
			//$('.btn-close-custom').hide();
			//$('.modal-loading').fadeIn();

			let o = $('#wa-chat-rotator-custom-user-hidden-id').val();
			let r = $('#wa-chat-rotator-region-data-region').val();
			let ct = $('#wa-chat-rotator-region-data-city').val();
			let cy = $('#wa-chat-rotator-region-data-country').val();
			let c = $('#no_wa_cs_region').text();

			let datana = {order_id: o, cs_number: c, country: cy, city: ct, region : r};

			kirimPost(datana, URL_CS_REGION_WA_CHAT_ROTATOR_UPDATE);



	});
	// wa-chat-rotator-custom form done!

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
			}else if(gawe == 'packages') {
				kirimPost(dataNa, URL_PACKAGE_DELETE);
			}else if(gawe == 'virtualvisitors') {
				kirimPost(dataNa, URL_VIRTUALVISITORS_DELETE);
			}else if(gawe == 'layananmanual') {
				kirimPost(dataNa, URL_LAYANANMANUAL_DELETE);
			}else if(gawe == 'socialmedia') {
				kirimPost(dataNa, URL_SOCIALMEDIA_DELETE);
			}else if(gawe == 'wa-chat-rotator') {
				kirimPost(dataNa, URL_WA_CHAT_ROTATOR_DELETE);
			}else if(gawe == 'theme-landingpage') {
				kirimPost(dataNa, URL_THEME_LANDINGPAGE_DELETE);
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
		 	}else if(gawe == 'packages'){
		 		kirimPost(dataNa, URL_PACKAGE_EDIT);
		 	}else if(gawe == 'virtualvisitors'){
		 		kirimPost(dataNa, URL_VIRTUALVISITORS_EDIT);
		 	}else if(gawe == 'layananmanual'){
		 		kirimPost(dataNa, URL_LAYANANMANUAL_EDIT);
		 	}else if(gawe == 'socialmedia'){
		 		kirimPost(dataNa, URL_SOCIALMEDIA_EDIT);
		 	}else if(gawe == 'wa-chat-rotator'){
		 		kirimPost(dataNa, URL_WA_CHAT_ROTATOR_EDIT);
		 	}
			
	});
	// check all edit link done!


});

function createTime24Hours(idElement, startHourFrom, startMinuteFrom){

	 let $select = $(idElement);

	 $select.html('');
            
            for (let hour = startHourFrom; hour < 24; hour++) {
                for (let minute = startMinuteFrom; minute < 60; minute += 30) {
                    let formattedHour = hour.toString().padStart(2, '0');
                    let formattedMinute = minute.toString().padStart(2, '0');
                    let timeValue = `${formattedHour}:${formattedMinute}`;
                    $select.append(`<option value="${timeValue}">${timeValue}</option>`);
                }
            }

}

function addInputWAChatRotator(entity, text, rt_mode){

	let div = $('<div>');

	let el = $('<input>');
	el.attr('type', 'text');
	el.css('display', 'inline-block');
	

	let del = $('<span>');
	del.attr('class', 'delete_input');
	del.css('display', 'inline-block');
	del.text('❌');

	let sched = $('<span>');
	sched.attr('class', 'add_schedule');
	sched.attr('data-bs-toggle', 'modal');
	sched.attr('data-bs-target', '#wa-chat-rotator-schedule-modal');

	if(rt_mode=='origin'){
		sched.css('display', 'inline-block');
	}else{
		sched.css('display', 'none');
	}
	sched.text('⌚');

	let map = $('<span>');
	map.attr('class', 'add_region');
	map.attr('entity', 'nomor_wa_cs');
	map.attr('data-bs-toggle', 'modal');
	map.attr('data-bs-target', '#wa-chat-rotator-region-modal');

	if(rt_mode=='origin'){
		map.css('display', 'inline-block');
	}else{
		map.css('display', 'none');
	}
	map.text('🌎');

	let sel = $('<select>');
	sel.attr('class', 'form-control device_wa');
	sel.attr('name', 'client_target_device[]');

	if(rt_mode=='device'){
		sel.css('display', 'inline-block');
	} else {
		sel.css('display', 'none');
	}

	let opt1 = $('<option>');
	opt1.val('all');
	opt1.text('Generic');

	let opt2 = $('<option>');
	opt2.val('android');
	opt2.text('🟢 Android');

	let opt3 = $('<option>');
	opt3.val('iphone');
	opt3.text('📱 Iphone');

	let opt4 = $('<option>');
	opt4.val('laptop');
	opt4.text('💻 Laptop');

	sel.append(opt1);
	sel.append(opt2);
	sel.append(opt3);
	sel.append(opt4);

	let id_parent = '';

	if(entity=='web_url'){
		id_parent = '#web_url';
		// adding <input type="text" class="web_url form-control">
		// <span entity="web_url" class="delete_input">❌</span>
		el.attr('class', 'web_url form-control');
		el.attr('name', 'web_url[]');

		del.attr('entity', 'web_url');

	}else {
		id_parent = '#nomor_wa_cs';
		// adding <input type="text" id="nomor_wa_cs" class="nomor_wa_cs form-control"> 
		// <span entity="nomor_wa_cs" class="delete_input">❌</span>
		el.attr('class', 'nomor_wa_cs form-control');
		el.attr('name', 'nomor_wa_cs[]');
		del.attr('entity', 'nomor_wa_cs');



	}

	if(text!=null)
	el.val(text);
	
	$(id_parent).append(div);
	//$(div).insertAfter(id_parent);
	$(div).append(el)
	$(del).insertAfter(el);

	if(entity != 'web_url'){
		sel.insertAfter(el);
		map.insertAfter(del);
		sched.insertAfter(map);
	}
	


}

function displaySubmitFor(idDiv){

let idna = '#' + idDiv;
let idnaSocmed = idna + ' .social-medias';

$(idnaSocmed).on('click', function(){

	// does it has package available?
	// if so then show the button
	var display = $(idna).find('input[name="package"]:visible').length > 0;

	if(display){
		$(idna).find('input[type="submit"]').show();
	}else{
		$(idna).find('input[type="submit"]').hide();
	}

});





}

function enablePopper(){

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

}

function hitungTotalPricePackage(){

	let q = $('#quota_package').val();
	let bp = $('#base_price_package').val();
	let totalElement = $('#total_price_package');

	if(q.length != 0 || bp.length != 0){
		let total = q*bp;
		totalElement.val(asRupiah(total));
	}else{
		totalElement.val('0');
	}


}

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

function fillDefaultCampaign(){
						let elemenBaru = "<option value=''></option> <option value='new'>buat baru</option>";
						$('#existing-campaign select').html(elemenBaru);
        	 			$('#existing-campaign').show();
        	 			$('#delete-campaign').hide();
        	 			$('#new-campaign').hide();

        	 			elemenBaru = "<option value=''></option>";
						$('#existing-campaign-code select').html(elemenBaru);
        	 			$('#existing-campaign-code').show();
}

function kirimPost(dataForm, urlNa){
	
	console.log('kirim ke '+ urlNa +' ' + JSON.stringify(dataForm));

	 $.ajax({
        url: urlNa,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){

        	console.log('ada respond ' + data);

        	if(urlNa == URL_WA_CHAT_ROTATOR_SCRIPT_READY){

        		if(isValidJSON(data)){
        			let json = JSON.parse(data);
        			let div = $('#wa-chat-rotator-script-modal');

        			if(json.status != 'valid'){
        				// this means the data hasnt been ready
       					div.find('p').html('Script Error! ☢️');

       					$('#copy-code').hide();

        			}else{

        				if(json.message !=null && json.message != 'ready'){
        					div.find('p').html('Script WA Chat Rotator ini <b>belum tuntas disetel &amp; belum siap dipakai!</b>. Karena ' + json.message + ' ⚡');

        					$('#copy-code').hide();
        				}else if(json.message == 'ready'){
        					$('#copy-code').show();
        					div.find('p').html('Segera <b>Copy & Paste script ini</b> ke dalam halaman website mu karena WA Chat Rotator <b>sudah siap berfungsi dengan baik</b>! 🌐');
        				}
								
        			}
        		}

        	}else if(urlNa == URL_CAMPAIGN_SINGLE_REQUEST){

        		// set the id of campaign selected
        		try {
        			let json = JSON.parse(data);
        			let idcampaigna = json.id;
					$('#upload-virtualvisitors-hidden-campaign-id').val(idcampaigna);

					// generate the code 
					// for the js link
					let link = URL_ENTRY_JS_ENDPOINT + "id=" + json.code;
					let endCode = '<script src="' + link + '"></script>';
					$('#code-js-virtualvisitors').text(endCode);

				} catch (error){
						fillDefaultCampaign();
						$('#code-js-virtualvisitors').html('');
				}

        	}else if(urlNa == URL_CAMPAIGN_DELETE){

					showLoading('virtualvisitors', false);
        	 		kirimPost(dataForm, URL_CAMPAIGN_REQUEST);

        	 		alert(dataForm.name + ' is deleted!');

        	 	} else if(urlNa == URL_CAMPAIGN_REQUEST){
        	 		
        	 		try{
	        	 		let datain = JSON.parse(data);
	        	 		
	        	 		renderDataCampaign(datain, '#existing-campaign');
	        	 		$('#delete-campaign').show();
	        	 		$('#new-campaign').hide();


	        	 		// this is for code data for selected campaign
	        	 		renderDataCampaign(datain, '#existing-campaign-code')

	        	 		let hasil = $('#existing-campaign select').val();	
	        	 		let datana = {name : hasil};
	        	 		// get the id of this selected campaign
	        	 		kirimPost(datana, URL_CAMPAIGN_SINGLE_REQUEST);

        	 		} catch (error){
        	 			alert(error);
        	 			fillDefaultCampaign();
        	 		}

           }else if(urlNa == URL_CAMPAIGN_ADD){
        	 		
        	 		showLoading('virtualvisitors', false);
        	 		kirimPost(dataForm, URL_CAMPAIGN_REQUEST);

           }else if(urlNa == URL_ORDER_REQUEST_DETAIL){
        	 		let dataNa = JSON.parse(data);
        	 		console.log(dataNa.data);
        	 			
            			extractOrderDetailData(dataNa.data, dataForm.order_type);
           }else if(urlNa != URL_CS_SCHEDULE_WA_CHAT_ROTATOR_EDIT && urlNa != URL_CS_SCHEDULE_WA_CHAT_ROTATOR_UPDATE && urlNa != URL_WA_CHAT_ROTATOR_EDIT && urlNa != URL_LAYANANMANUAL_EDIT && urlNa != URL_PACKAGE_EDIT && urlNa != URL_USER_EDIT && urlNa != URL_APP_EDIT && urlNa != URL_DEPOSIT_EDIT){
        		setTimeout(function(){
        			if(urlNa == URL_SETTINGS_UPDATE){
        		var dForm = convertIntoJSON(dataForm);
    				var cridential = "username=" + dForm.username+ "&pass=" + dForm.pass;
        			location.href = "/verify-manual?reloggin=true&" + cridential;
    				//location.replace('l')

        			}else{
        				// if the form is comming but not from settings call
        				//alert(data);
        				if(URL_THEME_LANDINGPAGE_DELETE == urlNa ||URL_WA_CHAT_ROTATOR_DELETE == urlNa || URL_LAYANANMANUAL_DELETE == urlNa || URL_ORDER_DELETE == urlNa || urlNa == URL_ORDER_UPDATE){
        					if(jumlahData<=1)
        				 alert('data berhasil terupdate!');
	        			}else{

	        				//if(jumlahData<=1)
	        				//alert('data berhasil dipesan!');

	        				if(urlNa == URL_DEPOSIT_ADD){
	        					// display the info pdf
	        					$('#payment-method-doc').show();
	        					// hide the payment
	        					$('#deposit-option').hide();

	        				}

  	       			}

  	       			if(urlNa != URL_DEPOSIT_ADD && urlNa != URL_CS_REGION_WA_CHAT_ROTATOR_UPDATE)
         			location.reload();

        			}
        		}, 2000);
            	
            }else{
            	// extract the data into form
            	if(data != 'none'){
            		if(urlNa == URL_LAYANANMANUAL_EDIT){
            			$('#layananmanual-form-modal').modal('show'); 
            			extractLayananManualData(data);
            		}else if(urlNa == URL_USER_EDIT){
            			$('#user-form-modal').modal('show'); 
            			extractUserData(data);
            		}else if(urlNa == URL_APP_EDIT){
            			$('#app-form-modal').modal('show'); 
            			extractAppData(data);
            		}else if(urlNa == URL_DEPOSIT_EDIT){
            			$('#add-deposit-admin-form-modal').modal('show'); 
            			extractDepositData(data);
            		}else if(urlNa == URL_PACKAGE_EDIT){
            			$('#package-form-modal').modal('show'); 
            			extractPackageData(data);
            		}else if(urlNa == URL_VIRTUALVISITORS_EDIT){
            			$('#data-virtualvisitors-form-modal').modal('show'); 
            			extractVirtualVisitorsData(data);
            		}else if(urlNa == URL_WA_CHAT_ROTATOR_EDIT){
            			$('#wa-chat-rotator-custom-modal').modal('show'); 
            			extractWAChatRotatorData(data);
            		}else if(urlNa == URL_CS_SCHEDULE_WA_CHAT_ROTATOR_EDIT){
            			extractWAChatRotatorScheduleData(data);
            		}
            	}
            }
        }
    });

}

function renderDataCampaign(jsonIn, idSelector){

						let elemenBaru = "";
	        	 		// this is for uploading data for campaign
	        	 		let elemenAkhir = "<option value='new'>buat baru</option>";

	        	 		// the name is array format
	        	 		for (const item of jsonIn) {
						  		elemenBaru += "<option value='" + item.name + "'>" + item.name + "</option>";
						}

						if(!idSelector.includes('code'))
						elemenBaru += elemenAkhir;

	        	 		$(idSelector + ' select').html(elemenBaru);
	        	 		$(idSelector).show();

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


function extractVirtualVisitorsData(argument) {
	
	let data = JSON.parse(argument);
	let formNa = $('#data-virtualvisitors-form-modal');
	formNa.find('#client_name').val(data.client_name);
	formNa.find('#city').val(data.city);
	formNa.find('#product_bought').val(data.product_bought);
	formNa.find('#product_url').val(data.product_url);	
	formNa.find('#theme_display').val(data.theme_display);

	let theme_dis = data.theme_display.split(" ");
	

	formNa.find('#virtualvisitors-hidden-username').val(data.username);
	formNa.find('#virtualvisitors-hidden-id').val(data.id);

	if(data.gender == 'lelaki'){
		formNa.find('#data_virtualvisitors_gender_male').prop('checked', true);		
	}else{
		formNa.find('#data_virtualvisitors_gender_female').prop('checked', true);
	}

	// we changed the destination form to update user form
	formNa.find('#data-virtualvisitors-form').attr('action', URL_USER_UPDATE);


}

function extractLayananManualData(argument) {
	
	let data = JSON.parse(argument);
	let formNa = $('#layananmanual-form-modal');
	formNa.find('#layananmanual-hidden-id').val(data.id);

	formNa.find('#layananmanual-hidden-user-id').val(data.user_id);
	formNa.find('#layananmanual-hidden-username-owned').val(data.username_owned);

	formNa.find('#jenis_layanan').val(data.jenis_layanan);
	formNa.find('#quantity').val(data.quantity);
	
	if(data.attachment!=null){
		formNa.find('#link_lampiran').attr('href', '/uploads/layananmanual/' + data.attachment);
		formNa.find('#link_lampiran').show();
	}else{
			formNa.find('#link_lampiran').hide();
	}

	// we changed the destination form to update form
	formNa.find('#layananmanual-form').attr('action', URL_LAYANANMANUAL_UPDATE);


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

function isValidJSON(str) {
    try {
        const parsed = JSON.parse(str);
        return typeof parsed === "object" && parsed !== null;
    } catch (e) {
        return false;
    }
}

function clearCheckboxesScheduleData(){

	let form = $('#wa-chat-rotator-schedule-form');
	let checkboxes = form.find('.cs_days_selected');
	checkboxes.each(function() { 
			$(this).prop("checked", false);
	});

}

function extractWAChatRotatorScheduleData(args){

	let keepWorking = false;
	let json = null;

	if(isValidJSON(args)){

		 json = JSON.parse(args);

		if(json.data != null)
			keepWorking=true;

		if(json.data == null)
			clearCheckboxesScheduleData();
	}


	if(keepWorking){

			let form = $('#wa-chat-rotator-schedule-form');
			form.find('#wa-chat-rotator-schedule-user-id').val(json.data.order_id);
			form.find('#hour_open').val(json.data.hour_open);
			form.find('#hour_closed').val(json.data.hour_closed);
			form.find('#cs_number').val(json.data.cs_number);
			form.find('#cs_day_mode').val(json.data.day_mode);

			let checkboxes = form.find('.cs_days_selected');

			// it either null or array
			let hari_terpilih = (json.data.days_selected);

			if(hari_terpilih!=null){
				if(hari_terpilih.length>0){
					 checkboxes.each(function() {
		            if (hari_terpilih.includes($(this).val())) {
		                $(this).prop("checked", true);
		            }
		        });
				}
			}

	}

}

function extractWAChatRotatorData(argument){

	$('#wa-chat-rotator-custom-form').trigger('reset');

	let data = JSON.parse(argument);
	let formNa = $('#wa-chat-rotator-custom-modal');
	formNa.find('#custom_name').val(data.custom_name);
	formNa.find('#rotator_mode').val(data.rotator_mode);
	formNa.find('#message').text(data.message);
	formNa.find('#identifier_mode').val(data.identifier_mode);
	formNa.find('#identifier_tag').val(data.identifier_tag);
	formNa.find('#wa-chat-rotator-custom-user-hidden-id').val(data.id);
	formNa.find('#wa-chat-rotator-custom-package').val(data.package);

	// continue making the phone and web url data
	$('.add_input').remove();

	if(data.data_cs.length>0){

		$('#nomor_wa_cs').html('');


		for(i = 0; i< data.data_cs.length; i++){
			let no_cs = data.data_cs[i].cs_number;
			addInputWAChatRotator('nomor_wa_cs', no_cs, data.rotator_mode);
		}

		let el_add = $('<span>');
		el_add.attr('entity', 'nomor_wa_cs');
		el_add.attr('class', 'add_input');
		el_add.text('➕');
		//<span entity="nomor_wa_cs" class="add_input">➕</span>
		$(el_add).insertAfter('#nomor_wa_cs');
		//$('#nomor_wa_cs').append(el_add);
	}

	if(data.data_web.length>0){

		$('#web_url').html('');
		

		for(i = 0; i< data.data_web.length; i++){
			let url = data.data_web[i].url;
			addInputWAChatRotator('web_url', url, data.rotator_mode);
		}

		let el_add = $('<span>');
		el_add.attr('entity', 'web_url');
		el_add.attr('class', 'add_input');
		el_add.text('➕');
		//<span entity="nomor_wa_cs" class="add_input">➕</span>
		$(el_add).insertAfter('#web_url');
		//$('#web_url').append(el_add);	
	}


	// we changed the destination form to update deposit form
	formNa.find('#wa-chat-rotator-custom-form').attr('action', URL_WA_CHAT_ROTATOR_UPDATE);


}

function extractPackageData(argument) {
	
	let data = JSON.parse(argument);
	let formNa = $('#package-form-modal');
	formNa.find('#package-form-admin-username').val(data.username);
	formNa.find('#add-deposit-admin-status').val(data.status);
	formNa.find('#add-deposit-admin-user-hidden-id').val(data.id);


	// we changed the destination form to update deposit form
	formNa.find('#package-form').attr('action', URL_PACKAGE_UPDATE);


}

function extractDepositData(argument) {
	
	let data = JSON.parse(argument);
	let formNa = $('#add-deposit-admin-form-modal');
	formNa.find('#add-deposit-admin-username').val(data.username);
	formNa.find('#add-deposit-admin-status').val(data.status);
	formNa.find('#add-deposit-admin-user-hidden-id').val(data.id);

	if(data.amount == 50000){
		formNa.find('#add-deposit-admin-50').prop('checked', true);		
	}else if(data.amount == 100000){
		formNa.find('#add-deposit-admin-100').prop('checked', true);		
	}else if(data.amount == 200000){
		formNa.find('#add-deposit-admin-200').prop('checked', true);		
	}else if(data.amount == 500000){
		formNa.find('#add-deposit-admin-500').prop('checked', true);		
	}else if(data.amount == 1000000){
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

function kirimPostUpload(datana, urlNa){


if(urlNa == URL_DATA_VIRTUALVISITORS){

	$('#virtualvisitors-progress').show();
	$('#status-virtualvisitors-loading').show();

}

//console.log('mau kirim ');

//for (var pair of datana.entries()) {
//  console.log(pair[0] + ': ');
//}
//console.table(datana.entries);


$.ajax({
  url: urlNa,
   type: 'POST',
   data: datana,
   cache: false,
   processData: false,
   contentType: false,
  success: function(response) {
    console.log('respond : ' + response);

    	if(urlNa == URL_DATA_VIRTUALVISITORS){

    		$('#status-virtualvisitors-error').hide();
    		$('#status-virtualvisitors-loading').hide();
			$('#virtualvisitors-progress').hide();

		}else if(urlNa == URL_LAYANANMANUAL_ADD || urlNa == URL_THEME_LANDINGPAGE_ADD){

			window.location.reload();

		}

  },
  error: function(e,f,g){
  	console.log(e + ' ' + f + ' ' + g);
  	$('#status-virtualvisitors-loading').hide();
  	$('#status-virtualvisitors-error').show();
  }

});



}

function asRupiah(number){

const formattedNumber = new Intl.NumberFormat('id-ID', {
  style: 'currency',
  currency: 'IDR',
}).format(number);


// without last decimal
return formattedNumber.replace(/,(\d{2})$/, '');

}

function clearAllCurrency(number){
	return number.replaceAll(".", "").replace("Rp ","");
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


function showError(message){

	Swal.fire({
            title: "Error",
            text: message,
            icon: "error"
        });


}

function showAlert(message){

	Swal.fire({
            title: "Warning",
            text: message,
            icon: "warning"
        });


}