/* for schedule usage */
/* Js-Smart for WA CHAT ROTATOR */
/* version 1.0a */
/* created by (c) FGroupIndonesia */
const _URL_NEXT_SCHEDULE_CS_WA_ROTATOR = "/client/next-schedule-cs-number";

$(document).ready(function(){
            $("_identifier_").click(function(e){
                
                e.preventDefault();

                var code = "_code_";
                var order_id = _orderid_;

                getCurrentPhoneAsScheduled(code, order_id);
            });
});


function getCurrentPhoneAsScheduled(codeIn, idIn){

    const now = new Date();

    // Get full day name in lowercase
    const dayName = now.toLocaleDateString('en-US', { weekday: 'long' }).toLowerCase();

    // Get current time in HH:mm format (24-hour)
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const timeText = `${hours}:${minutes}`;

    let datana = {code:codeIn, order_id: idIn, day: dayName, time: timeText};

    $.ajax({
    url: _URL_NEXT_SCHEDULE_CS_WA_ROTATOR,
    type: "POST",
    data: datana,
    dataType: "json",
    success: function(response) {
        
        if(response.status=='valid' || response.status=='success')
        nextWAChat(response);

        if(response.status!='valid' && response.status!='success')
        showAlert('WA Chat Customer Service tidak tersedia, harap kontak admin!');

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