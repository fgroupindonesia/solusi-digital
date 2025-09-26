<!-- Modal -->
<div class="modal fade" id="qrcode-form-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" >Pilih Jenis QR Code</h5>
      </div>

      <div class="modal-body">

        <!-- Pilihan Jenis -->
        <div class="mb-3">
          <label for="jenisPilihan" class="form-label">Jenis QR Code</label>
          <select id="jenisPilihan" class="form-select">
            <option value="" disabled selected>-- Pilih Jenis --</option>
            <option value="url">URL</option>
            <option value="text">Text</option>
            <option value="kontak">Kontak</option>
          </select>
        </div>

        <!-- Semua form disiapin di HTML -->
        <div id="form-url" class="qr-form-section" style="display:none;">
          <form action="/generate/url" method="POST">
            <h5>QR URL</h5>
            <input type="text" name="url" class="form-control mb-2" placeholder="Masukkan URL">
            <button type="submit" class="btn btn-success">Generate</button>
          </form>
        </div>

        <div id="form-text" class="qr-form-section" style="display:none;">
          <form action="/generate/text" method="POST">
            <h5>QR Text</h5>
            <textarea name="text" class="form-control mb-2" placeholder="Masukkan teks..."></textarea>
            <button type="submit" class="btn btn-success">Generate</button>
          </form>
        </div>

        <div id="form-kontak" class="qr-form-section" style="display:none;">
          <form action="/generate/kontak" method="POST">
            <h5>QR Kontak</h5>
            <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Kontak">
            <input type="text" name="telepon" class="form-control mb-2" placeholder="Nomor Telepon">
            <button type="submit" class="btn btn-success">Generate</button>
          </form>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" id="proceedBtn" class="btn btn-primary">Proceed</button>
      </div>

    </div>
  </div>
</div>
