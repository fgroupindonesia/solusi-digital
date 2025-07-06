<!-- Modal for Client View Only -->
<div class="modal fade" id="detail-order-result-view-modal" tabindex="-1" aria-labelledby="viewEndResultLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="viewEndResultLabel">End Result</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>

      <div class="modal-body">
       

        <!-- File Preview Section -->
        <div class="mb-3" id="uploadPreviewSectionClient" >
          <label class="form-label">Hasil Upload</label>
          <div>
            <a href="#" id="client_end_result_link" target="_blank" class="btn btn-sm btn-outline-primary">
              🔗 Lihat File
            </a>
          </div>
        </div>

        <!-- Description (Readonly) -->
        <div class="mb-3">
          <label class="form-label">Deskripsi Hasil</label>
          <textarea id="client_end_result_description" class="form-control" rows="3" readonly></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Terakhir Diupdate</label>
          <input readonly id="client_end_result_date_updated" class="form-control" >
        </div>

      </div>

      <div class="modal-footer">
  <button type="button" class="btn btn-success" data-id="" id="btn-client-done" data-bs-dismiss="modal">✅ Selesai</button>
  <button id="btn-client-revisi" data-id="" type="button" class="btn btn-warning" data-bs-dismiss="modal">✏️ Revisi</button>
</div>


    </div>
  </div>
</div>
