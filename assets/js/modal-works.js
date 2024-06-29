const URL_USER_ADD = "/add-new-user";
const URL_APP_ADD = "/add-new-app";
const URL_USER_DELETE = "/delete-user";
const URL_APP_DELETE = "/delete-app";
const URL_USER_EDIT = "/edit-user";
const URL_APP_EDIT = "/edit-app";
const URL_USER_UPDATE = "/update-user";
const URL_APP_UPDATE = "/update-app";
const URL_SETTINGS_UPDATE = "/update-settings";


$( document ).ready(function() {
    
	// this is for wa message
	$('.msg-user-wa').on('click', function(){
		var nowa = $(this).data('phone');
		messageWA(nowa);
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

		 idCollected.forEach(function(el){
		 	let dataNa = {id : el};

		 	if(gawe == 'users'){
		 		kirimPost(dataNa, URL_USER_DELETE);
			}else {
				kirimPost(dataNa, URL_APP_DELETE);
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
		 	}else{
		 		kirimPost(dataNa, URL_APP_EDIT);
		 	}
			
	});
	// check all edit link done!


});

function showLoadingManagement(stat){
	if(stat == true){
		$('#management-loading').show();
		$('.link-delete').attr('disabled', 'disabled');
	}else{
		$('#management-loading').hide();
		$('.link-delete').removeAttr('disabled');
	}
}


function kirimPost(dataForm, urlNa){
	
	console.log('kirim ' + JSON.stringify(dataForm));

	 $.ajax({
        url: urlNa,
        data: (dataForm),
        cache : false,
        type: 'POST',
        success: function(data){
        	if(urlNa != URL_USER_EDIT && urlNa != URL_APP_EDIT){
        		setTimeout(function(){
        			if(urlNa == URL_SETTINGS_UPDATE){
        		var dForm = JSON.parse(dataForm);
    			var cridential = "username=" + dForm.username+ "&pass=" + dForm.pass;
        			location.href = "/verify/reloggin=true&" + cridential;
        			}else{
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
