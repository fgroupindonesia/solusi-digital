$(document).ready(function() {
    const $header = $('#page-header.shop-left');
    const images = $('.bg-images').map(function() {
        return $(this).val();
    }).get(); // ambil semua value jadi array

    let currentIndex = 0;

   function changeBackground() {
    const imagePath = '/'+images[currentIndex];
    $header.fadeOut(1000, function() {
        $header.css('background-image', 'url(' + imagePath + ')').fadeIn(1000);
    });

    currentIndex = (currentIndex + 1) % images.length;
}

    // Pertama kali panggil dulu
    changeBackground();

    // Ulang setiap 5 detik (bisa diubah sesuai kebutuhan)
    setInterval(changeBackground, 5000);
});


