<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
        #map { height: 400px; width: 100%; margin-top: 10px; }
        #radius { width: 100%; margin-top: 10px; }
    </style>


<div class="modal fade" id="wa-chat-rotator-region-modal" tabindex="-1">

    <input id="wa-chat-rotator-region-data-region" value="" type="hidden" >
    <input id="wa-chat-rotator-region-data-city" value="" type="hidden" >
    <input id="wa-chat-rotator-region-data-country" value="" type="hidden" >

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CS : <span id="no_wa_cs_region">-</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  
  <div class="form-group row">
     <input type="text" id="locationInput" placeholder="Enter country or city" onkeypress="searchLocation(event)">
     <input type="range" id="radius" min="1000" max="50000" value="10000" step="1000" onchange="updateRadius()">
    <p>Radius: <span id="radiusValue">10000</span> meters</p>
  </div>
  


  <div class="form-group row">
      <div id="map"></div>
  </div>
  
 

      </div> <!-- this is end of modal-body -->
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
       
        <input data-bs-dismiss="modal" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
   <script>
    let map = L.map('map').setView([20, 0], 2); // Default world view
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    let marker, circle;
    let radiusValue = document.getElementById("radiusValue");

    function searchLocation(event) {
        if (event.key === "Enter") {
            let location = document.getElementById("locationInput").value;
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${location}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        let lat = parseFloat(data[0].lat);
                        let lon = parseFloat(data[0].lon);
                        map.setView([lat, lon], 10);
                        
                        if (marker) marker.remove();
                        if (circle) circle.remove();

                        marker = L.marker([lat, lon]).addTo(map);
                        let radius = document.getElementById("radius").value;
                        circle = L.circle([lat, lon], { radius: radius, color: 'blue', fillOpacity: 0.2 }).addTo(map);

                        storeLocationDetails(lat, lon);

                    } else {
                        alert("Location not found!");
                    }
                })
                .catch(error => console.error("Error:", error));
        }
    }

    function updateRadius() {
        let radius = document.getElementById("radius").value;
        radiusValue.innerText = radius;

        if (circle) {
            circle.setRadius(radius);
        }
    }

function storeLocationDetails(lat, lon) {
    $.ajax({
        url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`,
        type: "GET",
        dataType: "json",
        success: function (data) {
            let country = data.address.country || "Unknown";
            let region = data.address.region || "Unknown";
            let city = data.address.city || data.address.town || data.address.village || "Unknown";

            // Store values in hidden inputs using jQuery
            $("#wa-chat-rotator-region-data-country").val(country);
            $("#wa-chat-rotator-region-data-region").val(region);
            $("#wa-chat-rotator-region-data-city").val(city);

            console.log(data);
            console.log("Country:", country, "Region:", region, "City:", city);
        },
        error: function (xhr, status, error) {
            console.error("Reverse Geocoding Error:", error);
        }
    });
}

    </script>