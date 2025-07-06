const URL_USER_ADD 		= "/add-new-user";
const URL_PACKAGE_ADD 	= "/add-new-package";
const URL_APP_ADD 		= "/add-new-app";
const URL_DEPOSIT_ADD 	= "/add-new-deposit";
const URL_CAMPAIGN_ADD 	= "/add-new-campaign";
const URL_LAYANANMANUAL_ADD 	= "/add-new-layananmanual";
const URL_SOCIALMEDIA_ADD 	= "/add-new-socialmedia";
const URL_THEME_LANDINGPAGE_ADD 	= "/add-new-theme-landingpage";
const URL_ORDER_TYPE_ADD = "/add-new-order-type";

const URL_AFFILIATE_SHOP_PROFILE_DELETE		= "/delete-affiliate-shop-profile-banner";
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
const URL_DETAIL_ORDER_REVISIONS_DELETE = "/delete-revisions-detail-order";
const URL_GROUP_WA_CHAT_ROTATOR_DELETE = "delete-group-wa-chat-rotator";

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

const URL_DETAIL_ORDER_REVISIONS_AS_CLIENTS_UPDATE = "/update-revisions-detail-order-as-clients";
const URL_DETAIL_ORDER_REVISIONS_UPDATE = "/update-revisions-detail-order";
const URL_DETAIL_ORDER_END_RESULT_UPDATE = "/update-end-result-detail-order";
const URL_DETAIL_ORDER_END_RESULT_AS_CLIENTS_UPDATE = "/update-end-result-detail-order-as-clients";

const URL_GROUP_WA_CHAT_ROTATOR_UPDATE = "/update-group-wa-chat-rotator";
const URL_CS_WA_CHAT_ROTATOR_UPDATE = "/update-cs-wa-chat-rotator";
const URL_CS_WA_CHAT_ROTATOR_DELETE = "/delete-cs-wa-chat-rotator";

const URL_AFFILIATE_SHOP_PROFILE_UPDATE 		= "/update-affiliate-shop-profile";
const URL_USER_UPDATE 		= "/update-user";
const URL_THEME_LANDINGPAGE_UPDATE	= "/update-theme-landingpage";
const URL_PACKAGE_UPDATE 	= "/update-package";
const URL_ORDER_UPDATE 		= "/update-jasa-order";
const URL_APP_UPDATE 		= "/update-app";
const URL_DEPOSIT_UPDATE 	= "/update-deposit";
const URL_DEPOSIT_BULK_UPDATE = "/update-deposit-bulk";
const URL_LAYANANMANUAL_UPDATE 	= "/update-layananmanual";
const URL_SOCIALMEDIA_UPDATE 	= "/update-socialmedia";
const URL_WA_CHAT_ROTATOR_UPDATE_MESSAGE 	= "/update-wa-chat-rotator-message";
const URL_CS_REGION_WA_CHAT_ROTATOR_UPDATE 	= "/update-wa-chat-rotator-cs-region";
const URL_CS_SCHEDULE_WA_CHAT_ROTATOR_UPDATE 	= "/update-wa-chat-rotator-cs-schedule";
const URL_WA_CHAT_ROTATOR_SCRIPT_READY = "/check-wa-chat-rotator-script-ready";
const URL_WA_CHAT_ROTATOR_SCRIPT_GRATIS = "/check-wa-chat-rotator-script-gratis";
const URL_DETAIL_ORDER_END_RESULT_REQUEST = "/request-end-result-detail-order";
const URL_DETAIL_ORDER_REVISIONS_REQUEST = "/request-revisions-detail-order";

const URL_REQUEST_WA_CHAT_ROTATOR_MESSAGE = "/request-wa-chat-rotator-message";
const URL_REQUEST_WA_CHAT_ROTATOR_CS_SCHEDULE = "/request-wa-chat-rotator-cs-schedule";

const URL_REQUEST_VIRTUALVISITORS_MESSAGE = "/request-virtualvisitors-message";
const URL_DATA_VIRTUALVISITORS = "/upload-data-virtualvisitors";
const URL_MESSAGE_VIRTUALVISITORS_UPDATE = "/update-message-virtualvisitors";
const URL_DATA_LAYANANMANUAL = "/upload-data-layananmanual";

//const URL_DATA_VIRTUALVISITORS = "/test";
const URL_ORDER_WA_CHAT_ROTATOR = "/order-new-wa-chat-rotator";
const URL_ORDER_JASA_VIRTUALVISITORS = "/order-new-jasa-virtualvisitors";
const URL_ORDER_JASA_RATING = "/order-new-jasa-rating";
const URL_ORDER_JASA_SUBSCRIBER = "/order-new-jasa-subscriber";
const URL_ORDER_JASA_COMMENT = "/order-new-jasa-comment";
const URL_ORDER_PEMBUATANAPLIKASI = "/order-new-jasa-pembuatanaplikasi";
const URL_ORDER_UPLOADAPLIKASI = "/order-new-jasa-uploadaplikasi";
const URL_ORDER_KETIK_DOCUMENT = "/order-new-ketik-document";
const URL_ORDER_FORMAT_OS = "/order-new-format-os";
const URL_ORDER_UPGRADE_FITURAPLIKASI = "/order-new-jasa-upgrade-fituraplikasi";
const URL_ORDER_LANDINGPAGE = "/order-new-landingpage";

const URL_ORDER_REQUEST_DETAIL = "/request-detail-jasa-order";
const URL_CAMPAIGN_REQUEST = "/request-campaign";
const URL_CAMPAIGN_SINGLE_REQUEST = "/request-single-campaign";

const URL_SETTINGS_UPDATE = "/update-settings";
const URL_AFFILIATE_MODE_ACTIVATE = "/activate-affiliator-mode";

const URL_PREVIEW_IMAGE = "/client/preview-image/";

const URL_SHORTENER = "/client/make-it-short";
const URL_MANAGE_STATUS_ORDER = "/manage-order-status";

const URL_ENTRY_JS_ENDPOINT = "https://cdn.fgroupindonesia.com/virtualvisitors/js?";
const _URL_ENTRY_MAIN_WEB = "https://solusi-digital.fgroupindonesia.com/";

var jumlahData = 0;

// for modal anti refreshing capabilities
let _ref_wac = null;
let _ref_btn = null;
let _mode_adding_new_order_type;
let _reply_confirmation = null;


$( document ).ready(function() {

// untuk client agar pesan dulu layanannya
	ensureOrderPelayanan();

// untuk client bisa jadi afiliator
	ensureAffiliateMode();

// this is for the wa chat rotator management
	management_wa_chat_rotator_latest_helper();

// this is for client when ordering
	order_landingpage_form_helper();

// this is for admin bulk actions
	bulk_actions_click();

// this is for admin order status
enableEndResult();

// this is for admin revision form
revisionForms();

// this is for client displaying price
displayPriceOrderForm();

enablePopper();

$('body').on('click', '.link-virtualvisitors-custom', function(e){
e.preventDefault();

// passing data ke form 
// karena id di form dibutuhkan untuk submission

let idna = $('#vvisitors-order-id').val();
$('#virtualvisitors-custom-order-id').val(idna);

// grab dan extract ke modal popup tsb
let datana = {id : idna};
kirimPost(datana, URL_REQUEST_VIRTUALVISITORS_MESSAGE)

});

$('body').on('click','.btn-wa-schedule', function(){

	// ambil code id cs nya
	let idna = $(this).attr('data-cs-id');
	let datana = {id: idna};
	
	let namana = $(this).attr('data-cs-name');

	// tanya ke server
	// render ke form schedule
	kirimPost(datana, URL_REQUEST_WA_CHAT_ROTATOR_CS_SCHEDULE);

	// taro juga di form
	$('#wa-chat-rotator-schedule-cs-id').val(idna);
	$('#wa-chat-rotator-schedule-cs-name').text(namana);

});

$('.btn-delete-banner').on('click', function () {
        var bannerNumber = $(this).data('banner');
        var nama = $(this).data('nama-file');
        var shopId = $(this).data('shop');
        // alat bantu nanti jika berhasil terhapus
        _ref_btn = $(this);

        let datana = {id: shopId, banner : bannerNumber, nama_file: nama};

        kirimPost(datana, URL_AFFILIATE_SHOP_PROFILE_DELETE);
});

// this is for invoice downloading
$('.invoice-order-link').on('click', function(e){

	e.preventDefault();
	let code = $(this).attr('data-order-client-reff');
	window.location.href = "/download-invoice?order_client_reff=" + code;

});

// this is for selectiing theme and displaying the preview
$('#landingpage-theme').on('change', function () {
  const url = $(this).find(':selected').data('url');
  const prevw = $(this).find(':selected').data('preview');
  
  //alert('a');
  //alert(url);

  if (url) {

  	let url_prevw = URL_PREVIEW_IMAGE + prevw;

    $('#screenshot_landingpage').attr('src', url_prevw);
    $('#preview-link').attr('href', url);
    $('#preview-container').fadeIn();
  } else {
    $('#preview-container').fadeOut();
  }
});

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





// this part is for mapping modals
// making it refreshed
$('#wa-chat-rotator-region-modal').on('shown.bs.modal', function () {
             setTimeout(() => {
            map.invalidateSize(); 
        }, 300); 
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
$('body').on('click', '.identifier_mode', function(){

	let ops = $(this).val();
	let parent = $(this).parent();
	
	if(ops=='manual' || ops=='button contains' || ops=='link contains'){

		parent.find('.identifier_tag').show();
	}else{
		parent.find('.identifier_tag').hide();
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
	let url_js = _URL_ENTRY_MAIN_WEB + "client/?code=" + reff;
	let link = _URL_ENTRY_MAIN_WEB + "client/fwd?code=" + reff;

	let new_code = as_script.replace('LINK', url_js);
	$('#wa-chat-rotator-script-model').val(new_code);
	$('#wa-chat-rotator-link-model').val('...');
	
		// check the status
		let datana = {code: reff, url: link};
		kirimPost(datana, URL_WA_CHAT_ROTATOR_SCRIPT_READY);

});


// script copy for wa chat rotator
$('body').on('click', '.copy-code', function(){

	let source = $(this).attr('data-source');

	let el = null;

	if(source=='code'){
	
	el = $('#wa-chat-rotator-script-model');
	$('#message-copy1').text('copied...');		

	} else {
	el = $('#wa-chat-rotator-link-model');
	$('#message-copy2').text('copied...');		
	}

	let code = el.val();
	el.select();
    el[0].setSelectionRange(0, 99999); 
               
   document.execCommand("copy");

   setTimeout(function(){
		$('#message-copy1').fadeOut();   		
		$('#message-copy2').fadeOut();
   },2000);
   
});

// bagian untuk validasi form uploadaplikasi os
$('#jasa-upload-aplikasi-form-modal').on('shown.bs.modal', function () {
    $('.btn-save').hide();
    validateForm('uploadaplikasi'); 
  });

$('#jasa-upload-aplikasi-form-modal :input').on('change keyup', function() {
    validateForm('uploadaplikasi');
});

// bagian untuk validasi form format os
$('#format-os-form-modal').on('shown.bs.modal', function () {
    $('.btn-save').hide();
    validateForm('format-os'); 
  });

// ini juga
$('#format-os-form').on('input change', ':input[required], input[name="contact_person_type"]', function() {
    validateForm('format-os');
});

// this part for enabling the add deposit form
// back to normal
$('#add-deposit-form-modal').on('shown.bs.modal', function () {
    $('#deposit-option').show();
    $('#payment-method-doc').hide();
});

$('#add-deposit-form-modal').on('hidden.bs.modal', function () {
   location.reload();
});

// these parts for format os modal work
$('#format-os-contact-person-type-self').on('change', function(){

	// take the hidden data
	// into the form
	let myname = $('#setting-fullname').val();
	let mywa = $('#setting-whatsapp').val();

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
	displaySubmitFor('setting-form');
	displaySubmitFor('format-os-form');
	displaySubmitFor('ketik-dokumen-form');
	displaySubmitFor('end-result-form');
	displaySubmitFor('revision-admin-form');
	displaySubmitFor('uploadaplikasi-form');
	displaySubmitFor('landingpage-form');
	displaySubmitFor('shop-profile-form');
	displaySubmitFor('virtualvisitors-custom-form');
	
	
	

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

$('#virtualvisitors-custom-form').on('submit', function(e){

	e.preventDefault();
	let datana = $(this).serialize();

	kirimPost(datana, URL_MESSAGE_VIRTUALVISITORS_UPDATE);


});

$('#format-os-form').on('submit', function(e){

	e.preventDefault();

	proceedOrderWhenCashAvailable($(this));


});

$('#revision-admin-form').on('submit', function(e){

	e.preventDefault();

	let urlna = $(this).attr('action');
	let datana =  $(this).serialize();

	$(this).find('input[type="submit"]').hide();

	kirimPost(datana, urlna);

});

$('#shop-profile-form').on('submit', function(e){
    e.preventDefault();

    let urlna = $(this).attr('action');
    let datana = new FormData($(this)[0]);

    $(this).find('input[type="submit"]').hide();

    kirimPostUpload(datana, urlna);
});  

$('#end-result-form').on('submit', function(e){
    e.preventDefault();

    // === URL fixer ===
    let endUrlInput = $('#endUrl');
    let rawUrl = endUrlInput.val().trim();

    if (rawUrl && !rawUrl.startsWith('http://') && !rawUrl.startsWith('https://')) {
        rawUrl = 'http://' + rawUrl;
        endUrlInput.val(rawUrl);
    }
    // ==================

    let urlna = $(this).attr('action');
    let datana = new FormData($(this)[0]);

    $(this).find('input[type="submit"]').hide();

    kirimPostUpload(datana, urlna);
});


$('#ketik-dokumen-form').on('submit', function(e){

	e.preventDefault();

	proceedOrderWhenCashAvailable($(this));


});

$('#wa-chat-rotator-wizard-form').on('submit', function(e){

	e.preventDefault();

		let datana = $(this).serialize();
			
			let tujuanURL = $(this).attr('action');
			kirimPost(datana, tujuanURL);


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

});

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
  		let hasRevisionNa = $(this).data('orderhasrevision');

  		// tempelin ke form
  		$('#detail-order-hidden-id').val(idNa);
  		$('#detail-order-end-result-hidden-id').val(idNa);
  		$('#detail-order-hidden-order-type').val(jenisNa);

  		//alert('ada ' + hasRevisionNa);

  		let dataOrder = {order_type : jenisNa, order_id: idNa, "has_revision": hasRevisionNa};

  		kirimPost(dataOrder, URL_ORDER_REQUEST_DETAIL);

  });

// this is for add new order type package
   $('#order_type').on('change', function() {
    if ($(this).val() === 'add_new') {
    	_mode_adding_new_order_type = true;
      $('#add-new-order-type-container').slideDown();
      $('#new-order-type').val('').focus();
    } else {
    	_mode_adding_new_order_type = false;
      $('#add-new-order-type-container').slideUp();
    }
  });


   $('#btn-add-new-order-type').on('click', function() {
    
    	let el = $(this);
    	addNewOrderType(el);

  });

   // this is for approve click
  $('.link-approve').on('click', function(e){
  		e.preventDefault();
  		let entitiNa = $(this).data('entity');

  		postOrderStatus(entitiNa, 'approved');

  });

   // this is for cancel click
  $('.link-cancel').on('click', async function(e){
  		e.preventDefault();
  		let entitiNa = $(this).data('entity');

  		let codeNa = null;
  		let orderType = null;

  		$('input[type="checkbox"]:checked').each(function(){
		 	codeNa = $(this).data('code-id');
		 	orderType = $(this).data('order-type');
		 }); 

  		// kasih notif dulu cash tidak akan kembali meskipun di cancel
  		_reply_confirmation = await showMessage('info', 'Yakin Cancel order <b>' + orderType + '</b> <br>untuk <b>Code ID : ' + codeNa + '</b> ini? <br>Cash tidak akan kembali meskipun sudah dicancel.');

  		if(_reply_confirmation.isConfirmed){
  			postOrderStatus(entitiNa, 'cancel');	
  		}

  		

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
			

			// ketika tidak sedang editing new package 
			// maka bisa save data package ini
			if(!_mode_adding_new_order_type){

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
			}else{

				// saving yg add new package 
				let btn_package = $('#btn-add-new-order-type');
				addNewOrderType(btn_package);

			}
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
	$('#uploadaplikasi-form').on('submit', function(e){
			e.preventDefault();
			
			// upload app pake uploadan formnya
			proceedOrderWhenCashAvailable($(this), true);

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

	// radio button gratis chosen
	$('#wa-chat-rotator-paket-gratis').on('click', function(){ 

		let us = $('#wa-chat-rotator-form').find('#wa-chat-rotator-hidden-username').val();
		let datana = {username : us};

		kirimPost(datana, URL_WA_CHAT_ROTATOR_SCRIPT_GRATIS);

	});

	// radio button other than gratis chosen

$('input[name="package"]').on('change', function () {
  
  const value = $(this).val();
  const harga = $(this).attr('data-harga');

  if(value != 'gratis'){
  	let form = $('#wa-chat-rotator-form');
  	form.find('input[type=submit]').show();
  }
  
});


	// this is for wa-chat-rotator form
	$('#wa-chat-rotator-form').on('submit', function(e){
			e.preventDefault();
			
			proceedOrderWhenCashAvailable($(this));

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

			let o = $('#wa-chat-rotator-region-data-group-id').val();
			let r = $('#wa-chat-rotator-region-data-region').val();
			let ct = $('#wa-chat-rotator-region-data-city').val();
			let cy = $('#wa-chat-rotator-region-data-country').val();

			let datana = {group_id: o, country: cy, city: ct, region : r};

			kirimPost(datana, URL_CS_REGION_WA_CHAT_ROTATOR_UPDATE);



	});
	// wa-chat-rotator-custom form done!

	// this is for jasa form that has social media div clicked opt
	clickOnForm('landingpage-form');
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

		 if(count>1){
		 	// tampilin bulk actions
		 	$('.bulk-actions-wrapper').show();
		 }else{
		 		$('.bulk-actions-wrapper').hide();
		 }

		
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

// this is for add new package 
function addNewOrderType(btnUpdate){


	let newItem = $('#new-order-type').val().trim();

    if(newItem === '') {
      alert('Please enter a new order type');
      return;
    }

    // call ajax
    let namana = $('#new-order-type').val();
    let datana = {name: namana};
    kirimPost(datana, URL_ORDER_TYPE_ADD);

    // Disable tombol selama proses ajax
    $(btnUpdate).attr('disabled', true).text('Saving...');

        $('<option>', {
          value: newItem,
          text: newItem
        }).insertBefore('#order_type option[value="add_new"]');

        // Pilih option baru tersebut
        $('#order_type').val(newItem);

        // Sembunyikan input dan tombol
        $('#add-new-order-type-container').slideUp();

        // Reset tombol
        $('#btn-add-new-order-type').attr('disabled', false).text('Update');


}

function proceedOrderWhenCashAvailableCustomChecked(form){

			let idFormGiven = $(form).attr('id');
			let idGiven = '#' + $(form).attr('id');

			let tujuanURL = form.attr('action');

			let cash = $('#saldo-anda').attr('data-cash');
			let cash_text = $('#saldo-anda').text();

			let el_op = form.find('option[name="package"]:selected');
			let el_input = form.find('input[name="package"]:checked');

			let el_na = null;

			if(el_op.length>0){
				el_na = el_op;
			}else {
				el_na = el_input;
			}

			let harga = el_na.attr('data-harga');
			let harga_text = formatRupiah(harga);

			cash = parseInt(cash, 10);
			harga = parseInt(harga, 10);

			if(cash < harga){

				showError("Saldomu " + cash_text + " tidak cukup! Harga orderan " + harga_text);

			}else{

			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();


			let datana = $(form).serialize();
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

			
		
					kirimPost(datana, tujuanURL);

			

			}


}

function proceedOrderWhenCashAvailable(form, uploadBukan = false){


		 let datana = form.serialize();

			let tujuanURL = form.attr('action');

			let cash = $('#saldo-anda').attr('data-cash');
			let cash_text = $('#saldo-anda').text();

			let el_op = form.find('option[name="package"]:selected');
			let el_input = form.find('input[name="package"]:checked');

			let el_na = null;

			if(el_op.length>0){
				el_na = el_op;
			}else {
				el_na = el_input;
			}

			let harga = el_na.attr('data-harga');
			let harga_text = formatRupiah(harga);

			cash = parseInt(cash, 10);
			harga = parseInt(harga, 10);

			if(cash < harga){

				showError("Saldomu " + cash_text + " tidak cukup! <br>Harga orderan " + harga_text);

			}else{

			$('.btn-save').hide();
			$('.btn-close-custom').hide();
			$('.modal-loading').fadeIn();

			//alert('a');
				if(!uploadBukan){
					kirimPost(datana, tujuanURL);

				} else {
					// datanya jadiin form based dulu
					 datana = new FormData(form[0]);
  					kirimPostUpload(datana, tujuanURL);				
				}

			}


}

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
	$(div).append(el);
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

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
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
		
			proceedOrderWhenCashAvailableCustomChecked($(this));
			

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


function calculateDaysWAChatRotatorFree(dataObject){

let tanggal = dataObject.date_created;

const rawDate = tanggal;
const parsedDate = new Date(rawDate.replace(' ', 'T')); // ISO 8601 format

const now = new Date();
const msInDay = 1000 * 60 * 60 * 24;

// Calculate days passed
const daysPassed = Math.floor((now - parsedDate) / msInDay);
const daysLeft = 14 - daysPassed;

let pesan = null;

// Output logic
if (daysLeft < 0) {
  pesan = `❌ Akun Gratis Expired ${Math.abs(daysLeft)} hari lalu.`;
} else {
  pesan = `✅ Akun Gratis Masih valid — ${daysLeft} sisa hari lagi.`;
}


	return pesan;

}

function makeStrikeThrough(el_codena){


el_codena.attr('readonly', true).attr('disabled', true);
        				el_codena.css({
								  'user-select': 'none',
								  'pointer-events': 'none',
								  'background-color': '#f8f9fa', // Optional: visual cue
								  'cursor': 'not-allowed'        // Optional: UX feedback
								});

								el_codena.attr('class', 'input-strike');
								el_codena.parent().addClass('input-strike-wrap');


}

function resetStrikeThrough(el_codena){

el_codena.removeAttr('readonly')
							      .removeAttr('disabled')
							      .css({
							        'user-select': '',
							        'pointer-events': '',
							        'background-color': '',
							        'cursor': ''
							      })
							      .removeClass('input-strike');

							      el_codena.parent().removeClass('input-strike-wrap');

}

function renderWaChatRotatorScheduleModal(jsonData) {
        // Parse JSON string menjadi objek JavaScript
        const data = jsonData;

        // Mengisi input hidden
        $('#wa-chat-rotator-schedule-group-id').val(data.group_id);
        $('#wa-chat-rotator-schedule-cs-id').val(data.id);

        // Mengisi CS Number
        $('#cs_number').val(data.cs_number);

        // Mengisi Day Mode (select dropdown)
        $('#cs_day_mode').val(data.day_mode);

        // siapin dulu jam buka
         const $dropdown = $('#hour_open');
        $dropdown.empty(); // Kosongkan dropdown terlebih dahulu

        for (let i = 0; i < 24; i++) {
            const hour = i.toString().padStart(2, '0'); // Format jadi "00", "01", ..., "23"
            const time = `${hour}:00`;
            $dropdown.append(`<option value="${time}">${time}</option>`);
        }

        // Mengisi Jam Buka (select dropdown)
        if (data.hour_open) {
            $('#hour_open').val(data.hour_open);
        } else {
            // Jika hour_open null, Anda mungkin ingin memilih opsi default atau tidak melakukan apa-apa
            // Misalnya, memilih opsi pertama jika ada
            $('#hour_open option:first').prop('selected', true);
        }

        // Mengisi Jam Tutup (select dropdown)
        if (data.hour_closed) {
            $('#hour_closed').val(data.hour_closed);
        } else {
            // Jika hour_closed null, Anda mungkin ingin memilih opsi default atau tidak melakukan apa-apa
            // Misalnya, memilih opsi pertama jika ada
            $('#hour_closed option:first').prop('selected', true);
        }


  // Mengelola Hari Terpilih (checkboxes)
        const $csDaysSelectedCheckboxes = $('.cs_days_selected');

        // Menambahkan event listener untuk Day Mode agar mempengaruhi checkbox Hari Terpilih
        $('#cs_day_mode').on('change', function() {
            const currentDayMode = $(this).val();
            if (currentDayMode === 'all') {
                $csDaysSelectedCheckboxes.prop('checked', true).prop('disabled', true);
            } else {
                $csDaysSelectedCheckboxes.prop('disabled', false);
                // Hanya uncheck jika sebelumnya "all"
                if (data.day_mode === 'all') { // Ini akan uncheck hanya saat berganti dari 'all'
                   $csDaysSelectedCheckboxes.prop('checked', false);
                }
            }
        });
        // Panggil trigger change secara manual untuk memastikan state awal yang benar
        $('#cs_day_mode').trigger('change');


        $csDaysSelectedCheckboxes.prop('checked', false).prop('disabled', false); // Reset semua checkbox

        if (data.day_mode === 'all') {
            $csDaysSelectedCheckboxes.prop('checked', true).prop('disabled', true);
        } else if (data.day_mode === 'custom' && data.days_selected) {
            let selectedDaysArray = [];
            try {
                // Parse string JSON dari days_selected
                selectedDaysArray = JSON.parse(data.days_selected);
            } catch (e) {
                console.error("Gagal parsing days_selected JSON string:", data.days_selected, e);
                // Fallback jika gagal parse, mungkin asumsikan koma-terpisah atau kosong
                selectedDaysArray = data.days_selected.split(',').map(day => day.trim());
            }

            console.log('gw dapet ' + selectedDaysArray.length);

            selectedDaysArray.forEach(day => {
                $csDaysSelectedCheckboxes.filter(`[value="${day}"]`).prop('checked', true);
            });

        }
 }

function kirimPost(dataForm, urlNa){
	
	console.log('kirim ke '+ urlNa +' ' + JSON.stringify(dataForm));

	 $.ajax({
        url: urlNa,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){

        	console.log('ada respond ' + JSON.stringify(data));

        	if(urlNa == URL_REQUEST_VIRTUALVISITORS_MESSAGE){

        		if(isValidJSON(data)){
        			let jawab = JSON.parse(data);

        			let form = $('#virtualvisitors-custom-form');
        			form.find('#message').text(jawab.data.message);

        		}


        	}else if(urlNa == URL_MESSAGE_VIRTUALVISITORS_UPDATE){

        		$('.modal').modal('hide');

        	}else if(urlNa == URL_CS_SCHEDULE_WA_CHAT_ROTATOR_UPDATE){

        		//alert('a');

        	}else if(urlNa == URL_REQUEST_WA_CHAT_ROTATOR_CS_SCHEDULE){

        		if(isValidJSON(data)){

        			let jawab = JSON.parse(data);

        			renderWaChatRotatorScheduleModal(jawab.data);

        		}


        	} else if(urlNa == URL_REQUEST_WA_CHAT_ROTATOR_MESSAGE){

        		let jawab = JSON.parse(data);

        		let form = $('#wa-chat-rotator-custom-form');
        		form.find('#message').text(jawab.data.message)

        	}else if(urlNa == URL_AFFILIATE_SHOP_PROFILE_DELETE){

        		_ref_btn.closest('p').remove();

        	} else if(urlNa == URL_AFFILIATE_MODE_ACTIVATE){

				if(isValidJSON(data)){
					let jawab = JSON.parse(data);

					location.reload();

				}


        	}else  if(urlNa == URL_DETAIL_ORDER_REVISIONS_REQUEST){

        		if(isValidJSON(data)){
        			
        			let jawab = JSON.parse(data);

        			// extracting
        			if(dataForm.caller == 'client'){
        				
	        			if(jawab.status != 'invalid')
  	      			extractingClientRevisions(jawab);
        			}	

        			if(dataForm.caller == 'admin'){

        				if(jawab.status != 'invalid'){
        					extractingAdminRevisions(jawab);
        				}

	 						}

        		}


        	}else if(urlNa == URL_DETAIL_ORDER_END_RESULT_REQUEST){

        		if(!isValidJSON(data)){
        			
        			showMessage('error', 'data gagal diupdate!');

        		} else {

        			let jawab = JSON.parse(data);

        			if(jawab.status == 'valid'){

        				if(dataForm.caller != 'client'){
        					extractToDetailEndResult(jawab);
        				}else {

        					populateClientViewModal(jawab);

        				}

        				
        			}else{
        				resetEndResultModal();
        			}

        		}

        	} else if(urlNa == URL_ORDER_TYPE_ADD){

        		// adding new package biar tanpa notif juga 

        		if(!isValidJSON(data)){
        			
        			showMessage('error', 'data gagal diupdate!');

        		}

        	}else if(urlNa == URL_SHORTENER){

        		if(isValidJSON(data)){
        			let json = JSON.parse(data);
        			$('#wa-chat-rotator-link-model').val(json.url);
        		}else {
        			
        			showMessage('error', 'URL gagal dipendekkan!');

        		}

        	}else if(urlNa == URL_WA_CHAT_ROTATOR_UPDATE_MESSAGE){

        		// lgsg close modal aja
        		//showMessage('success', 'Berhasil diupdate!');
        		$('.modal').modal('hide');
        		

        	} else if(urlNa == URL_WA_CHAT_ROTATOR_SCRIPT_GRATIS){

        		if(isValidJSON(data)){
        			let json = JSON.parse(data);

        			let tombol = $('#wa-chat-rotator-form').find('input[type=submit]');

        			if(json.status == 'valid'){
        				// sudah ada gratis koq mau lagi?

        			 let msg_na = 	calculateDaysWAChatRotatorFree(json.message);
        			 
        			 showAlert(msg_na);

        				tombol.hide();
        			}else{
        				tombol.show();
        			}

        		}

        	}else if(urlNa == URL_WA_CHAT_ROTATOR_SCRIPT_READY){

        		if(isValidJSON(data)){
        			let json = JSON.parse(data);
        			let div = $('#wa-chat-rotator-script-modal');



        			if(json.status != 'valid'){
        				// this means the data hasnt been ready
       					div.find('p').html('Script Error! ☢️');

       					$('.copy-code').hide();

        			}else{

        				let codena =	$('#wa-chat-rotator-script-model');
        				let linkna =	$('#wa-chat-rotator-link-model');

        				if(json.message !=null && json.message != 'ready'){

								// make double strikethrough        				
        				makeStrikeThrough(codena);
        				makeStrikeThrough(linkna);

        					div.find('p').html('Script WA Chat Rotator ini <b>belum tuntas disetel &amp; belum siap dipakai!</b>. Karena ' + json.message + ' ⚡');

        					$('.copy-code').hide();
        				}else if(json.message == 'ready'){

        					// normalize
        					resetStrikeThrough(codena);
        					resetStrikeThrough(linkna);

        					$('.copy-code').show();
        					div.find('p').html('Segera <b>Copy & Paste 1 script ini</b> ke dalam halaman website mu karena WA Chat Rotator <b>sudah siap berfungsi dengan baik</b>! 🌐');

        					kirimPost(dataForm, URL_SHORTENER);

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
	        	 		renderDataCampaign(datain, '#existing-campaign-code');

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

        	 		if (dataForm.has_revision && dataForm.has_revision > 0) {
			    		$('#btn-revisions-show').show();
							} else {
					    $('#btn-revisions-show').hide(); 
							}
        	 			
            			extractOrderDetailData(dataNa.data, dataForm.order_type);
           }else if(urlNa != URL_DETAIL_ORDER_REVISIONS_DELETE && urlNa != URL_CS_SCHEDULE_WA_CHAT_ROTATOR_EDIT && urlNa != URL_CS_SCHEDULE_WA_CHAT_ROTATOR_UPDATE && urlNa != URL_WA_CHAT_ROTATOR_EDIT && urlNa != URL_LAYANANMANUAL_EDIT && urlNa != URL_PACKAGE_EDIT && urlNa != URL_USER_EDIT && urlNa != URL_APP_EDIT && urlNa != URL_DEPOSIT_EDIT){
        		
           	showMessage('success', "Data Berhasil diupdate!");

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
        					
        				 
        						

	        			} else {

	        				//if(jumlahData<=1)
	        				//alert('data berhasil dipesan!');

	        				if(urlNa == URL_DEPOSIT_ADD){
	        					// display the info pdf
	        					$('#payment-method-doc').show();
	        					// hide the payment
	        					$('#deposit-option').hide();

	        					$('#payment-method-doc')[0].contentWindow.location.reload();


	        					// hide the loading
	        					$('.modal-loading').hide();

	        					showMessage('info', 'Silahkan kirim screenshot Bukti Pembayaran Anda ke CS Admin by Whatsapp!', false);

	        				}

  	       			}

  	       			// jika datang dari orderan
  	       			 if(urlNa == URL_ORDER_JASA_SUBSCRIBER || 
  	       			 	urlNa == URL_ORDER_LANDINGPAGE ||
  	       			 	urlNa == URL_ORDER_WA_CHAT_ROTATOR || 
  	       			 	urlNa == URL_ORDER_JASA_RATING || 
  	       			 	urlNa == URL_ORDER_JASA_VIRTUALVISITORS ||
  	       			 	urlNa == URL_ORDER_JASA_COMMENT || 
  	       			 	urlNa == URL_ORDER_PEMBUATANAPLIKASI || 
  	       			 	urlNa == URL_ORDER_FORMAT_OS || 
  	       			 	urlNa == URL_ORDER_KETIK_DOCUMENT || 
  	       			 	urlNa == URL_ORDER_UPGRADE_FITURAPLIKASI){
  	       				location.href = URL_MANAGE_STATUS_ORDER;
  	       			} else if(
  	       				(urlNa == URL_PACKAGE_ADD && urlNa != URL_DEPOSIT_ADD && urlNa != URL_CS_REGION_WA_CHAT_ROTATOR_UPDATE)
							  || urlNa == URL_DETAIL_ORDER_REVISIONS_UPDATE
							  || urlNa == URL_DETAIL_ORDER_END_RESULT_AS_CLIENTS_UPDATE
							  || urlNa == URL_DEPOSIT_UPDATE
							  || urlNa == URL_DEPOSIT_BULK_UPDATE
  	       				) 
  	       			{
         					location.reload();
  	       			} 

        			}
        		}, 3000);
            	
            } else {
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

	let idSectionNa = '#detail-order-' + order_type.replace(/_/g, '-');

	console.log('memunculkan ' + idSectionNa);

	let sectionNa = $(idSectionNa);
	formNa.find('section').hide();
	
	setTimeout(function(){
		$('.modal-loading').hide();
		sectionNa.show();	
		$('#detail-order-admin').show();
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


	}else if(order_type == 'uploadaplikasi'){
		
		$(idSectionNa + "-app-name").val(data.app_name);
    $(idSectionNa + "-description").val(data.description);
    $(idSectionNa + "-privacy-url").val(data.privacy_url);
    $(idSectionNa + "-date-created").val(data.date_created);

    // Gambar icon dan screenshot
    $(idSectionNa + "-icon-path").attr("src", data.icon_path);
    $(idSectionNa + "-screenshot-path").attr("src", data.screenshot_path);

	}else if(order_type == 'landing_page'){
		$(idSectionNa + "-platform").val(data.platform_integrasi);
		$(idSectionNa + "-integrasi").val(data.integrasi);
		$(idSectionNa + "-package").val(data.package);
	}else if(order_type == 'ketik_document'){
		$(idSectionNa + "-name").val(data.document_name);
		$(idSectionNa + "-total-pages").val(data.total_pages);
		$(idSectionNa + "-descriptions").val(data.descriptions);
		$(idSectionNa + "-price").val(data.date_limit);
		$(idSectionNa + "-package").val(data.package);
	}else if(order_type == 'wa_chat_rotator'){
		
		$(idSectionNa + "-package").val(data.package);
	}else if(order_type == 'format_os'){
		$(idSectionNa + "-model").val(data.model);
		$(idSectionNa + "-descriptions").val(data.descriptions);
		$(idSectionNa + "-delivery").val(data.delivery);
		$(idSectionNa + "-contact-person-type").val(data.contact_type);
		$(idSectionNa + "-contact-person-name").val(data.contact_person_name);
		$(idSectionNa + "-contact-person-wa").val(data.contact_person_wa);
		$(idSectionNa + "-package").val(data.package);
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

	

	if(data.data_cs.length>0){

// continue making the phone and web url data
	$('.add_input').remove();

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


	
	formNa.find('#wa-chat-rotator-custom-form').attr('action', URL_WA_CHAT_ROTATOR_UPDATE_MESSAGE);


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
	var msg = "*Hey!* Admin mau ngomong. Bantuin aku dong. Gini ceritanya...";
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

		}else if(urlNa == URL_LAYANANMANUAL_ADD || urlNa == URL_THEME_LANDINGPAGE_ADD
			|| urlNa == URL_DETAIL_ORDER_END_RESULT_UPDATE ){

			window.location.reload();

		} else if (urlNa == URL_ORDER_UPLOADAPLIKASI){

			window.location.href = URL_MANAGE_STATUS_ORDER;

		} else if (urlNa == URL_AFFILIATE_SHOP_PROFILE_UPDATE){
			
			showMessage('success', 'Data Berhasil Terupdate!');
			location.reload();
		}

  },
  error: function(e,f,g){
  	alert('kirim ' + datana + ' ke ' + urlNa);
  	console.log('kirim ' + datana + ' ke ' + urlNa);
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

 async function showMessage(status, message, displayYesNo=false){

 	if(status=='error'){
 		showError(message);
 	}else if (status=='info'){
 		return await showAlert(message, displayYesNo);
 	}else {
 		showSuccess(message);
 	}

 }


function showError(message){

	Swal.fire({
            title: "Error",
            html: message,
            icon: "error"
        });


}

function showSuccess(message){

	Swal.fire({
            title: "Success",
            text: message,
            icon: "success"
        });


}

async function showAlert(message, displayYesNo=false){

	_reply_confirmation = Swal.fire({
            title: "Warning",
            html: message,
            icon: "warning",
            showCancelButton: displayYesNo,
        	confirmButtonText: "Yes",
        	cancelButtonText: "No"
        });

	return _reply_confirmation;

}

function validateForm(entityName) {
    let isValid = true;

    let formSelector = '';
    if (entityName === 'format-os') {
        formSelector = '#format-os-form';
    } else if (entityName === 'uploadaplikasi') {
        formSelector = '#uploadaplikasi-form';
    }

    // Validasi umum: semua input[required] kecuali radio
    $(`${formSelector} :input[required]`).not('[type="radio"]').each(function () {
        if (!$(this).val() || $(this).val() === 'none') {
            isValid = false;
            return false;
        }
    });

    // Validasi radio khusus jika ada
    if (entityName === 'uploadaplikasi') {
        // Jika ada radio package, validasi di sini
        if ($(`${formSelector} input[name="package"]`).length) {
            if (!$(`${formSelector} input[name="package"]:checked`).val()) {
                isValid = false;
            }
        }
    }

    // Tampilkan atau sembunyikan tombol Save
    if (isValid) {
        $(`${formSelector} .btn-save`).show();
    } else {
        $(`${formSelector} .btn-save`).hide();
    }
}



function enableEndResult(){

// for client
	$('.client-end-result-link').on('click', function(e){

		e.preventDefault();

		let id = $(this).data('id');
		let order_type = $(this).data('order-type');
		let datana = {"order-id": id, caller: "client", "order-type" : order_type};

		kirimPost(datana, URL_DETAIL_ORDER_END_RESULT_REQUEST);

	});


// for admin
	$('#resultType').on('change', function () {
      if ($(this).val() === 'manual') {
        $('#manualSection').removeClass('d-none');
        $('#uploadSection').addClass('d-none');
      } else {
        $('#manualSection').addClass('d-none');
        $('#uploadSection').removeClass('d-none');
      }
    });

// for admin
	$('#btn-end-result-show').on('click', function(e){

		 $('.modal').modal('hide');

		 setTimeout(function () {
        $('#setEndResultModal').modal('show');
        
        // request data if any
        let code = $('#detail-order-end-result-hidden-id').val();
        let order_type = $('#detail-order-hidden-order-type').val();
        let datana = {"order-id": code, "order-type" : order_type};

        kirimPost(datana, URL_DETAIL_ORDER_END_RESULT_REQUEST);

      }, 300); 


	});

	// as admin
	$('#btn-revisions-show').on('click', function(e){

		 $('.modal').modal('hide');
		 let idna = $('#detail-order-hidden-id').val();
		 $('#revision-admin-hidden-id').val(idna);

		 console.log('tarik ' + idna);

		 // request first if any revisions already have
		 let datana = {"order-id": idna, caller: 'admin'};
		 kirimPost(datana, URL_DETAIL_ORDER_REVISIONS_REQUEST);

		 setTimeout(function(){
		 	$('#revision-admin-modal').modal('show');
		 }, 1500);
		


	});

}


// end result ala admin
function extractToDetailEndResult(datana){

	let data = datana.data;

// Set hidden inputs
$('#detail-order-end-result-hidden-id').val(data.order_id);
$('#detail-order-end-result-hidden-username').val(data.username);

// Set dropdown
$('#resultType').val(data.end_result_type).trigger('change');

// Reset preview and sections
$('#endResultPreview').addClass('d-none');
$('#endResultPreview a').attr('href', '#');
$('#endUrl').val('');

// Handle based on resultType
if (data.end_result_type === 'upload') {
  $('#uploadSection').removeClass('d-none');
  $('#manualSection').addClass('d-none');

  if (data.end_result_link) {
    $('#endResultPreview a').attr('href', data.end_result_link);
    $('#endResultPreview').removeClass('d-none');
  }
} else if (data.end_result_type === 'manual') {
  $('#uploadSection').addClass('d-none');
  $('#manualSection').removeClass('d-none');
  $('#endUrl').val(data.end_result_link);
}

// Set description
$('[name="description"]').val(data.admin_descriptions || '');


}


// reset ala admin
function resetEndResultModal() {
  // Clear inputs
  $('#detail-order-end-result-hidden-id').val('');
  $('#detail-order-end-result-hidden-username').val('');

  $('#resultType').val('upload').trigger('change'); // default to upload
  $('[name="endUrl"]').val('');
  $('[name="description"]').val('');

  // Clear file input
  $('[name="endFile"]').val(null);

  // Show upload by default, hide manual
  $('#uploadSection').removeClass('d-none');
  $('#manualSection').addClass('d-none');
}

// bagian client
function populateClientViewModal(datana) {

	let data = datana.data;
  // Set file link
  $('#client_end_result_link').attr('href', data.end_result_link);

  // Set description
  $('#client_end_result_description').text(data.admin_descriptions);

  // Set updated date
  $('#client_end_result_date_updated').val(data.date_updated);

  // set the order-id tag
  $('#btn-client-revisi').attr('data-id', data.order_id);
  $('#btn-client-done').attr('data-id', data.order_id);
  

  // jika tak punya revisi
  if(!data.has_revision || data.has_revision==0){
  	$('#btn-client-revisi').hide();
  }else{
  	$('#btn-client-revisi').show();
  }

  if(data.status == 'completed'){
  	$('#btn-client-done').hide();
  	$('#btn-client-revisi').hide();
  }else{
  	$('#btn-client-done').show();
  }

  // Tampilkan modal
  $('#detail-order-result-view-modal').modal('show');
}


function displayPriceOrderForm(){

	// in the ketik_document form
	$('#ketik-dokumen-package').on('change', function(){

		let harga = $(this).find('option:selected').data('harga');

    // Format ke Rupiah
    let hargana = formatRupiah(harga);

		$('#ketik-dokumen-price').val(hargana);


	});

	// in the format-os  form
	$('#format-os-package').on('change', function(){

		let harga = $(this).find('option:selected').data('harga');

    // Format ke Rupiah
    let hargana = formatRupiah(harga);

		$('#format-os-price').val(hargana);


	});

	// in the uploadaplikasi  form
	$('#uploadaplikasi-package').on('change', function(){

		let harga = $(this).find('option:selected').data('harga');

    // Format ke Rupiah
    let hargana = formatRupiah(harga);

		$('#uploadaplikasi-price').val(hargana);


	});


// this is for upgrade fitur app
	$('.radio-package').on('change', function(){

		let aktif = $(this).is(':checked');

		if(aktif){
			let harga = $(this).data('harga');
			let entitina = $(this).data('entity');

			// Format ke Rupiah
    	let hargana = formatRupiah(harga);
    	
    	//console.log('dapat ' + entitina);

    	if(entitina == 'upgrade_fituraplikasi'){
    	$('#jasa-upgrade-fituraplikasi-price').val(hargana);
    	}

    	if(entitina == 'pembuatanaplikasi'){
    	$('#jasa-pembuatanaplikasi-price').val(hargana);
    	}

    	if(entitina == 'comment'){
    	$('#jasa-komen-price').val(hargana);
    	}

    	if(entitina == 'subscriber'){
    	$('#jasa-subscriber-price').val(hargana);
    	}

    	if(entitina == 'rating'){
    	$('#jasa-rating-price').val(hargana);
    	}

    	if(entitina == 'virtualvisitors'){
    	$('#jasa-virtualvisitors-price').val(hargana);
    	}

    	if(entitina == 'landing_page'){
    	$('#landingpage-price').val(hargana);
    	}

		}
    

		


	});

}

function formatRupiah(angka) {
    if (!angka) return 'Rp0';

    return 'Rp' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function revisionForms(){


	// as admin
	 $('#revision-admin-modal').on('shown.bs.modal', function () {
    if ($container.children('.revisi-item').length === 0) {
      addRevisi();
    }
  });

	 $('#btnAddRevisi').on('click', addRevisi);

	 $container.on('click', '.btn-remove', function () {
	 	let parentna =  $(this).closest('.revisi-item');

	 	let idNa = parentna.find('input[name="id[]"]').val();
    parentna.remove();

    let datana = {id : idNa};

    kirimPost(datana, URL_DETAIL_ORDER_REVISIONS_DELETE);

  });

	 // now as client
	 $('#btn-client-revisi').on('click', function(){

	 	$('.modal').modal('hide');

		 setTimeout(function(){
		 	$('#revision-client-modal').modal('show');
		 		let idNa = $('#btn-client-revisi').attr('data-id');
		 		let datana = {"order-id" : idNa, caller: "client"};
		 		kirimPost(datana, URL_DETAIL_ORDER_REVISIONS_REQUEST);
		 }, 1500);

	 });

	 // this is also for client when replying revision
	 updateDescriptionsClient();
 

}

let revisiCount = 0;
const $container = $('#revisiContainer');
const $template = $('#revisiTemplate');

// add revisi as admin
function addRevisi() {

		// hitung jumlah revisi
	 let elements = $('#revisiContainer').find('.revisi-title');

	 revisiCount = elements.length;
   revisiCount++;

    // clone dan hapus d-none
    let $newItem = $template.clone().removeAttr('id').removeClass('d-none');
    $newItem.attr('data-id', revisiCount);
    $newItem.find('.revisi-title').text('Revisi #' + revisiCount);
    // kosongkan input dan textarea (jika template ada isi)
    $newItem.find('input, textarea').val('');
    $container.append($newItem);
  }

// for admin usage
function extractingAdminRevisions(datana){

	let data = datana.data;

	const $container = $('#revisiContainer');
  const $template = $('#revisiTemplate');
  $container.empty(); // kosongkan container
  

  data.forEach((item, i) => {
    const $clone = $template.clone().removeClass('d-none').removeAttr('id');
    $clone.find('.revisi-title').text('Revisi #' + (i + 1));
    $clone.find('input[name="end_result_link[]"]').val(item.end_result_link || '');
    $clone.find('textarea[name="admin_descriptions[]"]').val(item.admin_descriptions || '');

    if(!item.client_descriptions){
			$clone.find('textarea[name="client_descriptions[]"]').hide();
    }else{
    	$clone.find('textarea[name="client_descriptions[]"]').show();
    	$clone.find('textarea[name="client_descriptions[]"]').val(item.client_descriptions || '');	

    	if(item.status=='accepted'){
    		$clone.find('.client_status .icon-accepted').removeClass('d-none');
    		$clone.find('.client_status .icon-rejected').addClass('d-none');
    		$clone.find('.btn-remove').addClass('d-none');
    	}else{
    		$clone.find('.client_status .icon-accepted').addClass('d-none');
    		$clone.find('.client_status .icon-rejected').removeClass('d-none');
    	}
    	
    }
    
    
    $clone.find('.revisi-title').parent().find('input[name="id[]"]').val(item.id);

    $('#revision-admin-hidden-id').val(item.order_id); // set order-id

    $container.append($clone);
  });

}

// for client usage
function extractingClientRevisions(datana){

	let data = datana.data;

	let tab1_status = false;

		const $tabs = $('#revisionTabs').empty();
    const $tabContent = $('#revisionTabContent');
    $tabContent.find('.tab-pane:not(#revision-template)').remove();

    data.forEach((rev, i) => {
      const tabId = `rev-${rev.id}`;
      const isActive = i === 0 ? 'active' : '';
      const showActive = i === 0 ? 'show active' : '';

      // Tab nav
      $tabs.append(`
        <li class="nav-item" role="presentation">
          <button class="nav-link ${isActive}" id="${tabId}-tab" data-bs-toggle="tab" data-bs-target="#${tabId}" type="button" role="tab" aria-controls="${tabId}" aria-selected="${i === 0}">
            Revisi #${i + 1}
          </button>
        </li>
      `);

      // Clone & isi konten
      const $clone = $('#revision-template').clone().removeAttr('id').removeClass('d-none').addClass(`${showActive} ${isActive}`).addClass('tab-pane fade').attr({
        id: tabId,
        role: 'tabpanel',
        'aria-labelledby': `${tabId}-tab`
      });

      $clone.find('.link-end-result').attr('href', rev.end_result_link);
      $clone.find('.date-updated').text('Tanggal update: ' + rev.date_updated);
      $clone.find('.admin-desc').val(rev.admin_descriptions);
      $clone.find('.revision-id').val(rev.id);

      if(rev.status != 'on progress'){
      	$clone.find('.client-desc').attr('readonly', 'true');
      	$clone.find('.client-desc').text(rev.client_descriptions);

      	// store the 1 appearance
      	if(i==0)
      	tab1_status = true;
      }

      $tabContent.append($clone);
 			});


    if (tab1_status){
    	// hide first all button
    	$('#clientRevisionForm button[type=submit]').hide();
    }

}

// for client usage
function updateDescriptionsClient(){

	$('#btn-client-done').on('click', function(e){

		let idna = $(this).attr('data-id');
		let datana = {status: 'completed', 'order-id': idna};

		kirimPost(datana, URL_DETAIL_ORDER_END_RESULT_AS_CLIENTS_UPDATE);

	});

	 $('#clientRevisionForm').on('submit', function(e) {
    e.preventDefault(); // Hindari submit default

    const $form = $(this);
    const statusNa = $form.find('button[type=submit][clicked=true]').val();
    
    // Ambil tab yang sedang aktif
    const $activeTab = $('#revisionTabContent .tab-pane.active');

    const idNa = $activeTab.find('.revision-id').val();
    const clientDesc = $activeTab.find('.client-desc').val();

		$activeTab.find('.client-desc').attr('readonly', 'true');    

    let datana = {id: idNa, client_descriptions: clientDesc, status: statusNa};

   	kirimPost(datana, URL_DETAIL_ORDER_REVISIONS_AS_CLIENTS_UPDATE); 

  });

  // Menandai tombol mana yang diklik
  $('#clientRevisionForm button[type=submit]').on('click', function() {
    $('#clientRevisionForm button[type=submit]').removeAttr('clicked');
    $(this).attr('clicked', 'true');
    $('#clientRevisionForm button[type=submit]').hide();
  });

  // saat tab di klik
  $('body').on('click', '#revisionTabs .nav-link', function (e) {
    
  	// munculin lagi tombol accept dan rejectnya.
  	//$('#clientRevisionForm button[type=submit]').show();
  	// disaat user client masih bisa komen

  	const targetId = $(e.target).data('bsTarget'); // Dapatkan ID tab tujuan
  const $newPanel = $(targetId); // Panel baru yang aktif

  const kekunci = $newPanel.find('.client-desc').prop('readonly');

  	if(kekunci){
  		$('#clientRevisionForm button[type=submit]').hide();
  	}else{
  		$('#clientRevisionForm button[type=submit]').show();
  	}

  });


}

// ini untuk admin usage

function bulk_actions_click() {
  // gunakan event delegation (jika konten bisa di-load ulang), atau binding langsung kalau static
  $('.btn-apply-bulk').on('click', function () {
    // cari parent bulk-actions-wrapper dari tombol yang diklik
    const bulkWrapper = $(this).closest('.bulk-actions-wrapper');
    // ambil select di dalam bulkWrapper itu
    const action = bulkWrapper.find('.bulk-action-select').val();

    if (!action) {
      showMessage('info', 'pilih dulu mode actionnya!');
      return;
    }

    // ambil semua checkbox yang dicek di tabel (global, bukan di wrapper)
    const ids = $('.user-checked:checked').map(function () {
      return $(this).data('id');
    }).get();

    if (ids.length === 0) {
      showMessage('info', 'pilih dulu datanya!');
      return;
    }

    let datana = { id: ids, status: action };
    kirimPost(datana, URL_DEPOSIT_BULK_UPDATE);
  });
}


function order_landingpage_form_helper(){

	$('#landingpage-integrasi').on('change', function(){

		let valna = $(this).val();

		if(valna == 'tidak'){
			$('.landingpage-platform-integrasi-wrapper').addClass('d-none');
		}else {
			$('.landingpage-platform-integrasi-wrapper').removeClass('d-none');
		}

	});

}

// when user choose opsi distribusi on wa chat rotator
// Function to handle the change event on the distribusi dropdown
    function handleDistribusiChange(event) {
        const $select = $(event.target);
        const $groupItem = $select.closest('.group-item'); // Get the parent group
        const $deviceOptions = $groupItem.find('.device-options');

        const selectedValue = $select.val();

        if (selectedValue === 'device') {
            $deviceOptions.removeClass('d-none'); // Show device options
        } else {
            $deviceOptions.addClass('d-none');    // Hide device options
        }

        if (selectedValue === 'origin') {
            // Trigger the dummy modal for "Berdasarkan Kota"
            $('#wa-chat-rotator-region-modal').modal('show');

            let namaGroup = $groupItem.find('.group-name').val();
            let idGroup = $groupItem.attr('data-group-id');

            $('#wa-chat-rotator-region-data-group-id').val(idGroup);
            $('#wa-chat-rotator-region-group-name').text(namaGroup);
        }
 }



function management_wa_chat_rotator_latest_helper(){

	// generate the script link
	$('body').on('click', '.btn-ambil-code-wa-chat-rotator', function(){

		let code_group = $(this).attr('data-code-reff');

		let WALINK = _URL_ENTRY_MAIN_WEB + "client/gac?code=" + code_group;
		let kodeHTML = "<script src='KODE'></script>";
		kodeHTML = kodeHTML.replace("KODE", WALINK);

		$('#wa-chat-rotator-script-model').val(kodeHTML);

		// then we request to shorten the link
		let datana = {url : WALINK, jenis : 'group'};
		kirimPost(datana, URL_SHORTENER);


	});


    // Attach event listener to existing group-distribusi dropdowns
    $('#group-container').on('change', '.group-distribusi', handleDistribusiChange);

   
	    
    // ==================== FUNGSI TAMBAH CS ====================
    $(document).on('click', '.btn-add-cs', function() {
        const $group = $(this).closest('.group-item');
        const $csList = $group.find('.cs-list');
        
        // Clone template CS
        const $csTemplate = $('#template-cs').clone().removeClass('d-none').removeAttr('id');
        
        // Tambahkan CS ke dalam group
        $csList.append($csTemplate);
        
        // Fokus ke input nama CS
        $csTemplate.find('.cs-name').focus();
    });
    
    // ==================== FUNGSI DELETE CS ====================
    $(document).on('click', '.btn-delete-cs', function() {
        const $csItem = $(this).closest('.cs-item');
        let csId = $csItem.attr('data-cs-id') || 'new'; // Jika baru, gunakan 'new'

        let datana = {
		    cs_id : csId
		   };
        
        Swal.fire({
            title: 'Hapus CS?',
            text: "Anda yakin ingin menghapus CS ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            
        	  $.post(URL_CS_WA_CHAT_ROTATOR_DELETE, datana, function (response) {
				         //alert(response);

				         let json = JSON.parse(response);

				            if (result.isConfirmed) {
				                $csItem.remove();
				                //Swal.fire('Dihapus!', 'CS telah dihapus.', 'success');
				            }
				         
				    });

        });

    });
    
    // ==================== FUNGSI TAMBAH GROUP ====================
    $('#btn-add-group').on('click', function() {
        // Clone template group
        const $groupTemplate = $('#template-group').clone().removeClass('d-none').removeAttr('id');
        
        // Tambahkan ke container
        $('#group-container').append($groupTemplate);
        
        // Scroll ke group baru
        $('html, body').animate({
            scrollTop: $groupTemplate.offset().top
        }, 500);
    });
    
   
    
  


   // Update Group saat ada perubahan
$(document).on('change', '.group-name, .group-distribusi, .device-options .form-check-input', function () {
    const groupItem = $(this).closest('.group-item');
    let groupId = groupItem.attr('data-group-id') || 'new'; // Jika baru, gunakan 'new'
    const groupName = groupItem.find('.group-name').val();
    const distribusi = groupItem.find('.group-distribusi').val();
    const orderId = groupItem.find('.group-order-id').val();

     let clickedValue = $(this).val();

        if($(this).attr('type') == 'radio'){

        const isChecked = $(this).is(':checked');
        //console.log(`Checkbox with value "${clickedValue}" is now ${isChecked ? 'checked' : 'unchecked'}.`);

        // Example: If 'All' is clicked, uncheck others (or vice-versa)
        if (clickedValue === 'all' && isChecked) {
            $(this).closest('.device-options').find('input[type="radio"]').not(this).prop('checked', false);
        } else if (clickedValue !== 'all' && isChecked) {
            $(this).closest('.device-options').find('.device-all').prop('checked', false);
        }

        // trigger also the cs element
        groupItem.find('.cs-list .cs-item').each(function() {
            $(this).find('.cs-name').trigger('change');
        });


        }else{
        	// clear the device value
        	clickedValue = null;
        }

     if(distribusi != 'device'){
     	// clear the device value
     		clickedValue = null;
     }   

    $.post(URL_GROUP_WA_CHAT_ROTATOR_UPDATE, {
        group_id: groupId,
        group_name: groupName,
        distribusi: distribusi,
        order_id: orderId,
        device : clickedValue
    }, function (response) {

        console.log(response);
        let json = JSON.parse(response);

        if (groupId === 'new') {
        	// set ke attribute biar kelacak di UI
            groupItem.attr('data-group-id', json.data); 
            groupItem.find('.btn-ambil-code-wa-chat-rotator').attr('data-code-reff', json.code);

            
        }

        // set juga code nya ke modal message
        groupItem.find('.btn-set-wa-chat-rotator-message').attr('data-code-reff', json.code);
        // munculin deh
        groupItem.find('.btn-set-wa-chat-rotator-message').removeClass('d-none');
        

    });
});

// ambil code group
// taro panggil data di url extract ke text area
// taro juga di form nya 
$('body').on('click', '.btn-set-wa-chat-rotator-message', function(){

	let code_group = $(this).attr('data-code-reff');

	// simpen di form karena dia butuh saat user klik save send
	$('#wa-chat-rotator-custom-code-reff').val(code_group);

	let datana = {code: code_group};

	// query ke server nanya ini message yg diapunya apa?
	
		kirimPost(datana, URL_REQUEST_WA_CHAT_ROTATOR_MESSAGE);
	
});

// Delete Group
$(document).on('click', '.btn-delete-group', function () {
    const groupItem = $(this).closest('.group-item');
    const groupId = groupItem.attr('data-group-id');

    if (!groupId) {
        groupItem.remove();
        return;
    }

    let datana = { group_id: groupId };

   

     Swal.fire({
            title: 'Hapus Group?',
            text: "Anda yakin ingin menghapus Group ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            
        	  $.post(URL_GROUP_WA_CHAT_ROTATOR_DELETE, datana, function (response) {
				         //alert(response);

				         let json = JSON.parse(response);

				            if (result.isConfirmed) {
				                 groupItem.remove();
				            }
				         
				    });

        });




});

// Update CS saat ada perubahan
$(document).on('change', '.cs-name, .cs-phone, .cs-status', function () {
    const csItem = $(this).closest('.cs-item');
    const groupItem = csItem.closest('.group-item');
    let csId = csItem.attr('data-cs-id') || 'new';
    const groupId = groupItem.attr('data-group-id') || 'new';
    const orderId = groupItem.find('.group-order-id').val();

    const distribusi = groupItem.find('.group-distribusi').val();
    let device_target = null;

    if(distribusi=='device'){
        device_target = groupItem.find('.device-options').find('input[type="radio"]:checked').val();
    }

    if (!groupId) {
        alert('Silakan simpan group terlebih dahulu');
        return;
    }

    const csName = csItem.find('.cs-name').val();
    const csPhone = csItem.find('.cs-phone').val();
    let csStatus = csItem.find('.cs-status').is(':checked');

    if(csStatus){
        csStatus = 'enabled';
    }else{
        csStatus = 'disabled';
    }

    let datana = {
        cs_id: csId,
        group_id: groupId,
        order_id: orderId,
        cs_name: csName,
        cs_phone: csPhone,
        cs_status: csStatus,
        device: device_target
    };

    console.log('mau kirim' + JSON.stringify(datana));

    $.post(URL_CS_WA_CHAT_ROTATOR_UPDATE, datana, function (response) {
        let json;
        try {
            json = JSON.parse(response);
            console.log("Parsed JSON response:", json); // Debug: See the full parsed JSON
        } catch (e) {
            console.error("Failed to parse JSON response:", response, e);
            //alert("Error: Invalid server response format.");
            return;
        }

        // --- THE FIX IS HERE: Change 'success' to 'valid' ---
        if (json.status === 'valid') { // Backend returns 'valid', not 'success'
            // Your backend always returns json.data as an object with 'id' and 'cs_name'
            // so we can directly access json.data.id and json.data.cs_name
            const returnedCsId = json.data.id;
            const returnedCsName = json.data.cs_nama; // Use cs_nama as per your PHP array key

            // Update data-cs-id for the main cs-item container (if it was 'new')
            // This is important because for 'new' items, the data-cs-id needs to be set.
            csItem.attr('data-cs-id', returnedCsId);

            // Update data-cs-id and data-cs-name for the schedule button
            csItem.find('.btn-wa-schedule').attr('data-cs-id', returnedCsId);
            csItem.find('.btn-wa-schedule').attr('data-cs-name', returnedCsName);

            console.log("Updated btn-wa-schedule data-cs-id to:", returnedCsId); // Debug
            console.log("Updated btn-wa-schedule data-cs-name to:", returnedCsName); // Debug

            //alert('Data berhasil disimpan!');
        } else {
            //alert('Gagal menyimpan data: ' + json.message);
        }
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX request failed:", textStatus, errorThrown, jqXHR.responseText);
        //alert("Terjadi kesalahan saat berkomunikasi dengan server.");
    });
});


    // ensure that new form is given when there
    // is no data rendered yet
    let hasData = $('#group-container').text().trim().length>0;

    if(!hasData)
     $('#btn-add-group').trigger('click');


}

function ensureAffiliateMode(){

    $('body').on('click', '#konfirmasi-affiliator', function(e){

         Swal.fire({
        title: 'Aktifkan Mode Affiliator?',
        text: "Anda akan mengaktifkan mode khusus untuk affiliator",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Aktifkan!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika user klik Yes
            Swal.fire(
                'Diaktifkan!',
                'Mode Affiliator telah aktif.',
                'success'
            ).then(() => {
                
                let userna = $('#nav-username').val();
                let datana = {username : userna};
            	kirimPost(datana, URL_AFFILIATE_MODE_ACTIVATE);

            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Jika user klik No/Batal
            
        }
    });

    });

}

function ensureOrderPelayanan(){

	$('body').on('click', '.order-pelayanan-link', function(e){

		e.preventDefault();

		showMessage('info', 'Order Dulu Akses Paket Pelayanan ini!');


	});
}