/* for random usage */
/* Js-Smart for WA CHAT ROTATOR */
/* version 1.0a */
/* created by (c) FGroupIndonesia */

$(document).ready(function(){
            $("_identifier_").click(function(e){
                
                e.preventDefault();

                var phoneNumbers = _phone_;
                var randomNum = Math.floor(Math.random() * _max_);
                
                var targetPhone = phoneNumbers[randomNum];

                var message = "_message_";
                var waLink = "https://wa.me/" + targetPhone + "?text=" + encodeURIComponent(message);
                
                window.open(waLink, "_blank");
            });
});