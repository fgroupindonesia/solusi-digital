$(document).ready(function() {

    function getUrlParam(param) {
        let urlParams = new URLSearchParams(window.location.search);
        return urlParams.has(param) ? parseInt(urlParams.get(param)) : null;
    }

    let minVal = parseInt($('#min-price').text().replace(/\D/g, ''));
    let maxVal = parseInt($('#max-price').text().replace(/\D/g, ''));

    // Define the real min and max limits
    const RANGE_MIN = 0;
    const RANGE_MAX = 10000000;

    // Initialize slider
    $("#slider-range").slider({
        range: true,
        min: RANGE_MIN,
        max: RANGE_MAX,
        step: 50000,
        values: [minVal, maxVal],
        slide: function (event, ui) {
            $("#min-price").text(formatRupiah(ui.values[0]));
            $("#max-price").text(formatRupiah(ui.values[1]));
        }
    });

    // Format initial values
    $("#min-price").text(formatRupiah(minVal));
    $("#max-price").text(formatRupiah(maxVal));

    // Format number to Indonesian Rupiah (Rp. 1.000.000)
    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

});
