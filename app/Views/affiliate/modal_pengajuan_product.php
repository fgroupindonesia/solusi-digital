

<div class="modal fade" id="productSubmissionModal" tabindex="-1" role="dialog" aria-labelledby="productSubmissionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productSubmissionModalLabel">Ajukan Produk Baru Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="productName">Nama Produk <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="productName" placeholder="Contoh: Kemeja Batik Modern" required>
            <small class="form-text text-muted">Nama produk yang jelas dan menarik.</small>
          </div>
          <div class="form-group">
            <label for="productCategory">Kategori Produk <span class="text-danger">*</span></label>
            <select class="form-control" id="productCategory" required>
    <option value="">Pilih Kategori</option>
    <option value="ebook">Produk Digital - E-book</option>
    <option value="software-aplikasi">Produk Digital - Software/Aplikasi</option>
    <option value="template-desain">Produk Digital - Template Desain</option>
    <option value="musik-audio-royalty-free">Produk Digital - Musik/Audio (Royalty-free)</option>
    <option value="foto-video-stok">Produk Digital - Foto/Video Stok</option>
    <option value="kursus-online-webinar">Produk Digital - Kursus Online/Webinar</option>
    <option value="produk-digital-lainnya">Produk Digital - Lainnya</option>
    
    <option value="jasa-desain-grafis">Jasa - Desain Grafis</option>
    <option value="jasa-penulisan-penerjemahan">Jasa - Penulisan/Penerjemahan</option>
    <option value="jasa-kursus-les-privat">Jasa - Kursus/Les Privat</option>
    <option value="jasa-perbaikan">Jasa - Perbaikan</option>
    <option value="jasa-konsultasi">Jasa - Konsultasi</option>
    <option value="jasa-lainnya">Jasa - Lainnya</option>

    <option value="lain-lain">Produk Fisik Lainnya</option>
</select>
          </div>
          <div class="form-group">
            <label for="productDescription">Deskripsi Singkat Produk <span class="text-danger">*</span></label>
            <textarea class="form-control" id="productDescription" rows="3" placeholder="Sebutkan fitur utama, bahan, atau keunikan produk Anda." required></textarea>
            <small class="form-text text-muted">Maksimal 200 karakter.</small>
          </div>
          <div class="form-group">
            <label for="productPrice">Perkiraan Harga Jual (IDR) <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="productPrice" placeholder="Contoh: 150000" required min="0">
            <small class="form-text text-muted">Masukkan harga dalam Rupiah, tanpa titik atau koma.</small>
          </div>
          <div class="form-group">
            <label for="productImage">Unggah Gambar Produk <span class="text-danger">*</span></label>
            <input type="file" class="form-control-file" id="productImage" accept="image/*" required>
            <small class="form-text text-muted">Maks. 3 gambar (JPG, PNG). Ukuran maks. 2MB/gambar.</small>
          </div>
          <div class="form-group">
            <label for="contactEmail">Email Kontak Anda <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="contactEmail" placeholder="nama@email.com" required>
            <small class="form-text text-muted">Kami akan menghubungi Anda melalui email ini.</small>
          </div>
          <div class="form-group">
            <label for="contactPhone">Nomor Telepon (Opsional)</label>
            <input type="tel" class="form-control" id="contactPhone" placeholder="Contoh: 081234567890">
            <small class="form-text text-muted">Untuk komunikasi yang lebih cepat jika diperlukan.</small>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success">Kirim Pengajuan</button>
      </div>
    </div>
  </div>
</div>