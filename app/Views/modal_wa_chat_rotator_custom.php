<div class="modal fade" id="wa-chat-rotator-custom-modal" tabindex="-1" aria-labelledby="waChatRotatorModalLabel" aria-hidden="true">
  <form id="wa-chat-rotator-custom-form" action="/update-wa-chat-rotator-message" method="post">
    <input id="wa-chat-rotator-custom-code-reff" name="code" type="hidden" value="" class="form-control">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="waChatRotatorModalLabel">WA Chat Rotator - Set Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="message" id="label_message">Format Text Pesan:</label>
            <textarea id="message" name="message" class="message form-control" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <img class="modal-loading" src="/assets/plugins/images/loading.gif" style="display: none;"> <button type="submit" class="btn btn-primary btn-save">
            <i class="fas fa-paper-plane me-2"></i>Save
          </button>
        </div>
      </div>
    </div>
  </form>
</div>