$(document).ready(function() {
    $('#link-tab-review-shops').on('click', function() {
        $('#add-review').slideDown(); // Or use .show() or .fadeIn()
    });

	$('.other-tab').on('click', function() {
        $('#add-review').slideUp();
    });


     $('#star-rating .fa-star').on('mouseover', function() {
        let value = $(this).data('value');
        $('#star-rating .fa-star').each(function(i) {
            $(this).toggleClass('text-warning', i < value);
        });
    });

    // Keep highlight after selection
    $('#star-rating .fa-star').on('click', function() {
        let value = $(this).data('value');
        $('#rating').val(value);
        $('#star-rating .fa-star').removeClass('selected');
        $('#star-rating .fa-star').each(function(i) {
            if (i < value) $(this).addClass('text-warning selected');
        });
    });

    // Reset hover effect when mouse leaves
    $('#star-rating').on('mouseleave', function() {
        let selected = $('#rating').val();
        $('#star-rating .fa-star').each(function(i) {
            $(this).toggleClass('text-warning', i < selected);
        });
    });


     $('#submit-review').on('click', function() {
        let productId = $('#product_id').val();
        let userId = $('#user_id').val();
        let rating = $('#rating').val();
        let review = $('#review').val();

        if (rating == 0 || review.trim() === '') {
            alert('Please give a rating and write your review.');
            return;
        }

        $.ajax({
            url: '/submit-review', // Dummy endpoint (replace with your actual route)
            type: 'POST',
            data: {
                product_id: productId,
                user_id: userId,
                rating: rating,
                review: review
            },
            success: function(response) {
                alert('Review submitted!');
                location.reload(); // Refresh page
            },
            error: function(err) {
                alert('Something went wrong.');
            }
        });
    });
    

});