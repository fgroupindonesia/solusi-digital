$(document).ready(() => {
      
              const randomInt = Math.floor(Math.random() * 5) + 1

              $('body').css('background', 'url(/assets/images/hd-bg-0' + randomInt + '.jpg');
              $('body').css('background-repeat', 'no-repeat').css('opacity', 0).fadeTo(500, 1);  
                    
});