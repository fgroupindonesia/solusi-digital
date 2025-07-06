<div class="modal fade" id="virtualvisitors-custom-modal" tabindex="-1" aria-labelledby="virtualVisitorsModalLabel" aria-hidden="true">
  <form id="virtualvisitors-custom-form" action="/update-virtual-visitors-message" method="post">
    <input id="virtualvisitors-custom-order-id" name="id" type="hidden" value="" class="form-control">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="virtualVisitorsModalLabel">Virtual Visitors - Set Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="message" id="label_message">Format Text Pesan:</label><br>
            <span>Anda boleh menyertakan data <b>{nama-client}</b>, <b>{nama-produk}</b>, </span>
            <textarea id="message" name="message" class="message form-control" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <img class="modal-loading" src="/assets/plugins/images/loading.gif" style="display: none;">
          <button type="submit" class="btn btn-primary btn-save">
            <i class="fas fa-paper-plane me-2"></i>Save
          </button>
        </div>
      </div>
    </div>
  </form>
</div>