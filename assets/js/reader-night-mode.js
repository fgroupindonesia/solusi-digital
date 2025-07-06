 $(document).ready(function () {

    function updateReaderModeUI(isNight) {
      const icon = isNight ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
      const label = isNight ? 'Day Mode' : 'Reader Mode';
      $('.toggle-mode').html(icon + '<span class="hide-menu ms-2">' + label + '</span>');

      if(isNight){
         $('.logo-text img').attr('src', fileTextInverted);
         $('.logo-icon img').attr('src', logoInverted);
      } else {

       $('.logo-text img').attr('src', fileTextNormal);
       $('.logo-icon img').attr('src', logoNormal);

      }

    }


    const fileTextInverted = "/assets/images/logo-text-inverted.png";
    const fileTextNormal = "/assets/images/logo-text.png";
    const logoNormal = "/assets/images/solusi-digital-logo.png";
    const logoInverted = "/assets/images/solusi-digital-logo-inverted.png";

    const savedMode = localStorage.getItem('themeMode');
    
    if (savedMode === 'night') {

      $('body').addClass('night-mode');
      $('.left-sidebar').addClass('night-mode');
      $('.row').addClass('night-mode');
      $('.row .white-box').addClass('night-mode');
      $('nav').addClass('night-mode');
      $('.card').addClass('night-mode');
      $('.card-heading').addClass('night-mode');
      $('.info-box').addClass('night-mode');
      
      $('.modal-content').addClass('night-mode');
      $('.bulk-actions-wrapper').addClass('night-mode');
      $('#wa-help').addClass('night-mode');
      $('.swal2-popup').addClass('night-mode');
      
      $('button').addClass('night-mode');
      $('table').addClass('night-mode');
      $('table th').addClass('night-mode');
      
      $('#sidebarnav').addClass('night-mode');
      $('.navbar-header').addClass('night-mode');
      $('.page-breadcrumb').addClass('night-mode');
      $('.dropdown-menu').addClass('night-mode');

      const observer = new MutationObserver(() => {
        if ($('.swal2-popup').length && $('body').hasClass('night-mode')) {
          $('.swal2-popup').addClass('night-mode');
        }
      });

      observer.observe(document.body, { childList: true, subtree: true });

      updateReaderModeUI(true);
    }

    $('.toggle-mode').click(function (e) {
      e.preventDefault();
      $('body').toggleClass('night-mode');
      $('.left-sidebar').toggleClass('night-mode');
      $('.row').toggleClass('night-mode');
      $('.row .white-box').toggleClass('night-mode');
      $('nav').toggleClass('night-mode');
      $('.card ').toggleClass('night-mode');
      $('.card-heading').toggleClass('night-mode');
      $('.info-box').toggleClass('night-mode');
      
      $('.modal-content').toggleClass('night-mode');
      $('.bulk-actions-wrapper').toggleClass('night-mode');

      $('#wa-help').toggleClass('night-mode');
      $('.swal2-popup').toggleClass('night-mode');

      $('button').toggleClass('night-mode');
      $('table').toggleClass('night-mode');
      $('table th').toggleClass('night-mode');

      $('#sidebarnav').toggleClass('night-mode');
      $('.navbar-header').toggleClass('night-mode');
      $('.page-breadcrumb').toggleClass('night-mode');

      $('.dropdown-menu').toggleClass('night-mode');

      const observer = new MutationObserver(() => {
        if ($('.swal2-popup').length && $('body').hasClass('night-mode')) {
          $('.swal2-popup').toggleClass('night-mode');
        }
      });

      observer.observe(document.body, { childList: true, subtree: true });
      

      const isNight = $('body').hasClass('night-mode');
      updateReaderModeUI(isNight);

      localStorage.setItem('themeMode', isNight ? 'night' : 'day');
    });
  });