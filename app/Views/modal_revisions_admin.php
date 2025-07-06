<div class="modal fade" id="revision-admin-modal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="revision-admin-form" method="post" action="/update-revisions-detail-order">

      <input id="revision-admin-hidden-id" type="hidden" name="order-id"  >

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminModalLabel">Input Revisi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div id="revisiContainer">
            <!-- SECTION DINAMIS AKAN MASUK DI SINI -->
          </div>
          <button type="button" class="btn btn-success mt-3" id="btnAddRevisi">+ Tambah Revisi</button>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kirim Semua</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- for cloning purposes -->
<div id="revisiTemplate" class="revisi-item mb-3 border rounded p-3 d-none" data-id="">

  <div class="d-flex justify-content-between align-items-center mb-2">
    <h6 class="mb-0 revisi-title">Revisi #</h6>
    <input name="id[]" type="hidden" >
    <button type="button" class="btn btn-sm btn-danger btn-remove">Hapus</button>
  </div>
  <div class="mb-2">
    <label>End Result Link</label>
    <input type="text" name="end_result_link[]" class="form-control" placeholder="Link hasil akhir">
  </div>
  <div class="mb-2">
    <label>Admin Description</label>
    <textarea name="admin_descriptions[]" class="form-control" placeholder="Deskripsi admin"></textarea>
  </div>

  <div class="mb-2">
    <label>Client Description 
       <span class="client_status">
      <!-- Icon status disini (hidden by default) -->
      ::
      <i class="fa-solid fa-circle-xmark text-danger d-none icon-rejected" title="Rejected"></i>
      <i class="fa-solid fa-circle-check text-success d-none icon-accepted" title="Accepted"></i>
      ::
    </span>
    </label>
    <textarea name="client_descriptions[]" readonly class="form-control" placeholder="Deskripsi client"></textarea>
  </div>

</div>

<!-- for cloning purposes -->