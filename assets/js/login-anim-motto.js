$(document).ready(() => {
      $('#logo1').fadeIn(1000).delay(1000).fadeOut(1000, () => {
        $('#logo2').fadeIn(1000).delay(1000).fadeOut(1000, () => {
          $('#motto').fadeTo(1000, 1).delay(1500).fadeOut(1000, () => {
            $('#intro').addClass('fadeOut');
            setTimeout(() => {
              $('#intro').hide();
              $('#loginForm').fadeIn(1000);
              const randomInt = Math.floor(Math.random() * 5) + 1

              $('body').css('background', 'url(/assets/images/hd-bg-0' + randomInt + '.jpg');
              $('body').css('background-repeat', 'no-repeat');
              
            }, 800);
          });
        });
      });
    });