/* for device target usage */
/* Js-Smart for WA CHAT ROTATOR */
/* version 1.0a */
/* created by (c) FGroupIndonesia */

$(document).ready(function() {
    $(document).on("click", function() {
        let deviceType = getDeviceType();
        
        $("_identifier_").click(function(e){
                
                e.preventDefault();

                var phoneNumbersAndroid = _phoneandroid_;
                var phoneNumbersIPhone = _phoneiphone_;
                var phoneNumbersLaptop = _phonelaptop_;
                var phoneNumbersGeneric = _phonegeneric_;

                var phoneWanted = null;
                var working = false;

                if(deviceType.includes('Laptop')){
                	phoneWanted = phoneNumbersLaptop;
                }else if(deviceType.includes('Android')){
                	phoneWanted = phoneNumbersAndroid;
                }else if(deviceType.includes('iPhone')){
                	phoneWanted = phoneNumbersIPhone;
                }

                if(phoneWanted.length==0){
                	// if nobody matched
                	// so he pushed into generic users
                	phoneWanted = phoneNumbersGeneric;

                	if(phoneNumbersGeneric.length>0){
                		working = true;
                	}

                }else{
                	// if the current cs phone numbers are available
                	// then it's okay to proceed
                	working = true;
                }

                var randomNum = Math.floor(Math.random() * phoneWanted.length);

                var targetPhone = phoneWanted[randomNum];

                var message = "_message_";
                var waLink = "https://wa.me/" + targetPhone + "?text=" + encodeURIComponent(message);
                
                if(working){
                	window.open(waLink, "_blank");
				}else{
					alert('please contact admin! Error code #1229');
				}

            });

    });
});

function getDeviceType() {
    let userAgent = navigator.userAgent.toLowerCase();
    
    if (/iphone|ipad|ipod/.test(userAgent)) {
        return "iPhone / iOS";
    } else if (/android/.test(userAgent)) {
        return "Android";
    } else {
        return "Laptop / Desktop";
    }
}