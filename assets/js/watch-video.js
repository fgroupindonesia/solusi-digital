
$(document).ready(function () {
  $('.open-video').on('click', function (e) {
    e.preventDefault();
    let videoURL = $(this).attr('href') + '?autoplay=1';
    $('#videoIframe').attr('src', videoURL);
    let myModal = new bootstrap.Modal(document.getElementById('videoModal'));
    myModal.show();

    // Stop video when modal is hidden
    $('#videoModal').on('hidden.bs.modal', function () {
      $('#videoIframe').attr('src', '');
    });
  });
});
