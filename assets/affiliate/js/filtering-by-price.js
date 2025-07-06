$(document).ready(function() {
    $('#btn-shop-filter').click(function() {
        // Get the values from the span elements
        var minPrice = $('#min-price').text().replace(/\D/g, '');
        var maxPrice = $('#max-price').text().replace(/\D/g, '');

        // Construct the new URL
        var newUrl = window.location.origin + '/shop?minPrice=' + minPrice + '&maxPrice=' + maxPrice;

        // Redirect to the new URL
        window.location.href = newUrl;
    });


   $('#select-sort-shop').on('change', function () {
    const selectedSort = $(this).val();
    const url = new URL(window.location.href);

    // Set or update the 'sort_mode' parameter
    url.searchParams.set('sort_mode', selectedSort);

    // Redirect to updated URL
    window.location.href = url.toString();
});


});