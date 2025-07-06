<!-- Modal Client Revisi -->
<div class="modal fade" id="revision-client-modal" tabindex="-1" aria-labelledby="clientRevisionLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="clientRevisionForm" method="post" action="/update-revisions-detail-order-as-clients">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="clientRevisionLabel">Tinjau Revisi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">

          <!-- End Result Link -->
          <!-- Tabs Nav -->
          <ul class="nav nav-tabs mb-3" id="revisionTabs" role="tablist">
          </ul>

          <!-- Tabs Content -->
          <div class="tab-content" id="revisionTabContent">
          </div>

          <!-- TEMPLATE: Panel Revisi (disembunyikan) -->
        <div class="tab-pane fade d-none" id="revision-template">
          <div class="mb-3">
            <label class="form-label">Attachment</label>
            <div>
              <a href="#" target="_blank" class="form-control d-flex align-items-center text-decoration-none link-end-result" style="height: auto;">
                <i class="bi bi-link-45deg me-2"></i> 
                <span>Download Attachment</span>
              </a>
            </div>
            <small class="text-muted mt-1 d-block date-updated">Tanggal update: -</small>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi Admin</label>
            <textarea class="form-control admin-desc" rows="3" readonly></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi Client</label>
            <textarea class="form-control client-desc" rows="4" placeholder="Masukkan tanggapan Anda..."></textarea>
          </div>
          <input type="hidden" class="revision-id" value="">
        </div>


          <!-- End Result Link ended -->


        </div>

        <div class="modal-footer">
          <button type="submit" name="action" value="rejected" class="btn btn-danger">Reject</button>
          <button type="submit" name="action" value="accepted" class="btn btn-success">Accept</button>
        </div>
      </div>
    </form>
  </div>
</div>
