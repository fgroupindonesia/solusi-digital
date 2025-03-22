/* for order usage */
/* Js-Smart for WA CHAT ROTATOR */
/* version 1.0a */
/* created by (c) FGroupIndonesia */

const _URL_NEXT_CS_WA_ROTATOR = "/client/next-cs-number";

$(document).ready(function(){
            $("_identifier_").click(function(e){
                
                e.preventDefault();

                var code = "_code_";
                var order_id = _orderid_;

                getCurrentPhoneAsOrdered(code, order_id);
            });
});


function getCurrentPhoneAsOrdered(codeIn, idIn){

    let datana = {code:codeIn, order_id: idIn};

    $.ajax({
    url: _URL_NEXT_CS_WA_ROTATOR,
    type: "POST",
    data: datana,
    dataType: "json",
    success: function(response) {
        
        if(response.status=='valid' || response.status=='success')
        nextWAChat(response);

        if(response.status!='valid' && response.status!='success')
        alert('contact admin!');

    },
    error: function(xhr, status, error) {
        console.error("Error:", error);
    }
});



}

function nextWAChat(json){
                                
                var targetPhone = json.data.cs_number;

                var message = "_message_";
                var waLink = "https://wa.me/" + targetPhone + "?text=" + encodeURIComponent(message);
                
                window.open(waLink, "_blank");

}