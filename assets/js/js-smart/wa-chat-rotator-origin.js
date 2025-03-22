/* for region/origin target usage */
// https://ipinfo.io/160.19.226.237/json?token=bdd372b62f27d7
/* Js-Smart for WA CHAT ROTATOR */
/* version 1.0a */
/* created by (c) FGroupIndonesia */

const _URL_IP_INFO = "https://ipinfo.io/json";
let deviceLocation = null;

$(document).ready(function() {
    $(document).on("click", function() {
       
       getLocation().then(function(response) {
            deviceLocation = response;
        });

        
        $("_identifier_").click(function(e){
                
                e.preventDefault();

                var cs_object = _csobjects_;
                var phoneWanted = null;
                var working = false;

                // we have 3 steps checking
                // 1st get the city
                // 2nd get the region
                // 3rd get the country

                if(isValidJSON(cs_object)){
                    // start working
                    phoneWanted = lookingFor('city', cs_object, deviceLocation);

                    if(phoneWanted==null){
                        phoneWanted = lookingFor('region', cs_object, deviceLocation);

                        if(phoneWanted==null){
                            phoneWanted = lookingFor('country', cs_object, deviceLocation);
                        }else {
                            working = true;
                        }

                    }else {
                        working = true;
                    }
                }
                
                var message = "_message_";
                var waLink = "https://wa.me/" + phoneWanted + "?text=" + encodeURIComponent(message);
                
                if(working){
                	window.open(waLink, "_blank");
				}else{
					alert('please contact admin! Error code #1229');
				}

            });

    });
});

function lookingFor(kriteria, cs_object, devInfo){
let res = null;

for (i=0; i<cs_object.length; i++){

            let data_cs = cs_object[i];

            if(kriteria == 'city'){
            if(data_cs.city == devInfo.city){
                res = data_cs.cs_number;
                break;
            }
            }

            if(kriteria == 'region'){
            if(data_cs.region == devInfo.region){
                res = data_cs.cs_number;
                break;
            }
            }

            if(kriteria == 'country'){
            if(data_cs.country == devInfo.country){
                res = data_cs.cs_number;
                break;
            }
            }


}

return res;

}

function getLocation() {
    
    // get the ip first
    //https://ipinfo.io/json

    /*  this is the end result
    {
  "ip": "160.19.226.237",
  "city": "Bandung",
  "region": "West Java",
  "country": "ID",
  "loc": "-6.9222,107.6069",
  "org": "AS55699 PT. Cemerlang Multimedia",
  "timezone": "Asia/Jakarta",
  "readme": "https://ipinfo.io/missingauth"
}*/
var deferred = $.Deferred();


    $.ajax({
            url: _URL_IP_INFO,
            type: "GET",
            dataType: "json",
            success: function(response) {
                
                deferred.resolve(response);

            },
            error: function(xhr, status, error) {
                alert('ouch!');
                deferred.reject(error);
            }
        });

return deferred.promise();

}

function isValidJSON(str) {
    try {
        JSON.parse(str);
        return true;
    } catch (error) {
        return false;
    }
}