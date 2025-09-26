$(document).ready(() => {
     
              $('#loginForm').fadeIn(2000);

     $('.benderaWrapper').css({
    background: 'linear-gradient(to bottom, red 50%, white 50%)',
    padding: '10px 0'
  });

  // Tambah auto scroll horizontal planet-gallery (atas)
  let scrollPos1 = 0;
  setInterval(function() {
    scrollPos1 += 1;
    $('#planetGallery').scrollLeft(scrollPos1);
    if (scrollPos1 >= $('#planetGallery')[0].scrollWidth) {
      scrollPos1 = 0;
    }
  }, 30);

  // Tambah auto scroll reverse (bawah)
  let scrollPos2 = 0;
  setInterval(function() {
    scrollPos2 += 1;
    $('#reverseGallery').scrollLeft(scrollPos2);
    if (scrollPos2 >= $('#reverseGallery')[0].scrollWidth) {
      scrollPos2 = 0;
    }
  }, 40);
              

  setInterval(function(){

    let adaLogin = $('.login-container');

    if(adaLogin.length>0){
       $('.benderaWrapper').fadeIn(1500);
    }

  },2000);

loopGallery('#planetGallery');
loopGallery('#reverseGallery');
        
});


  function loopGallery(selector) {
  const gallery = $(selector);
  const original = gallery.html();
  gallery.append(original); // clone isi
}