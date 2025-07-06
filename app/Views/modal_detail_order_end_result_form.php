<!-- Modal -->
<div class="modal fade" id="setEndResultModal" tabindex="-1" aria-labelledby="setEndResultLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="end-result-form" method="POST" action="/update-end-result-detail-order" enctype="multipart/form-data">

      <input type="hidden" id="detail-order-end-result-hidden-id" name="order-id" value="">
      <input type="hidden" id="detail-order-end-result-hidden-username" value="<?= $username; ?>">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="setEndResultLabel">Update End Result</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <!-- Choose Method -->
          <div class="mb-3">
            <label class="form-label">Metode End Result</label>
            <select id="resultType" class="form-select" name="resultType" required>
              <option value="upload">Upload File</option>
              <option value="manual">Manual URL</option>
            </select>
          </div>

          <!-- Upload File -->
          <div class="mb-3" id="uploadSection">
            <label class="form-label">Upload File</label>
            <input type="file" class="form-control" name="endFile">

            <!-- Preview Link -->
            <div id="endResultPreview" class="mt-2 d-none">
              <a href="#" target="_blank" class="btn btn-sm btn-outline-primary">
                🔗 Lihat Hasil Sebelumnya
              </a>
            </div>
          </div>


          <!-- Manual URL -->
          <div class="mb-3 d-none" id="manualSection">
            <label class="form-label">Manual URL</label>
            <input id="endUrl" type="text" class="form-control" name="endUrl" placeholder="https://example.com/result.pdf">
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label class="form-label">Deskripsi Hasil</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
          </div>

          <!-- Hidden input -->
          <input type="hidden" name="orderId" value="<!-- inject order ID here -->">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>