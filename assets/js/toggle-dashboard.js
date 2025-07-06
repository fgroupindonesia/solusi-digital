
  $(document).ready(function() {
    $('.toggle-footer-btn').on('click', function() {
      const $icon = $(this).find('i');
      const $footer = $(this).closest('.card').find('.footer-content');
      
      $footer.slideToggle(200);
      
      // Rotate icon
      $icon.toggleClass('fa-chevron-down fa-chevron-up');
    });


    $('.heading-riwayat').on('click', function(){
      $(this).parent().parent().find('.content-riwayat').slideToggle();

       const icon = $(this).find('.icon-riwayat');
      icon.toggleClass('fa-chevron-down fa-chevron-up');

    });

  });
