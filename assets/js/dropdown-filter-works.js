$(document).ready(function() {
    $('#orderTypeFilter').on('change', function() {
        var selected = $(this).val();
        if (selected === 'all') {
            $('.package-card').show();
        } else {
            $('.package-card').each(function() {
                var type = $(this).data('order-type');
                if (type === selected) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
});
