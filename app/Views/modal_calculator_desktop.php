<div class="modal fade" id="modalEstimatorDesktop" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Estimator Biaya Aplikasi Desktop</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">

        <!-- Wizard Form -->
         <form class="wizardForm" data-currentstep="1">
  <div class="wizard-step active" data-step="1">
  <h5>1. Jenis Aplikasi Desktop</h5>
  <select class="form-select cost-input" data-cost="type">
    <option value="-1">Pilih...</option>
    <option value="500">Demo Prototype</option>
    <option value="1500">Aplikasi Internal Sederhana</option>
    <option value="3000">POS / Kasir</option>
    <option value="5000">Inventory / Gudang</option>
    <option value="7000">ERP / Sistem Manajemen Lengkap</option>
  </select>
</div>

<div class="wizard-step" data-step="2">
  <h5>2. Dukungan Multi-User (Login)</h5>
  <select class="form-select cost-input" data-cost="auth">
    <option value="-1">Pilih...</option>
    <option value="0">Single User</option>
    <option value="1500">Login Multi-User (Lokal)</option>
    <option value="2500">Login + Hak Akses (Role)</option>
  </select>
</div>

<div class="wizard-step" data-step="3">
  <h5>3. Database</h5>
  <select class="form-select cost-input" data-cost="database">
    <option value="-1">Pilih...</option>
    <option value="1000">SQLite / File-based</option>
    <option value="2000">MySQL / PostgreSQL</option>
    <option value="3500">Multi-Database / Server-Client</option>
  </select>
</div>

<div class="wizard-step" data-step="4">
  <h5>4. Fitur CRUD + Laporan</h5>
  <select class="form-select cost-input" data-cost="crud">
    <option value="-1">Pilih...</option>
    <option value="1000">CRUD Dasar</option>
    <option value="2500">CRUD + Cetak PDF</option>
    <option value="4000">CRUD + Grafik & Ekspor Excel</option>
  </select>
</div>

<div class="wizard-step" data-step="5">
  <h5>5. Installer & Auto-Update</h5>
  <select class="form-select cost-input" data-cost="installer">
    <option value="-1">Pilih...</option>
    <option value="0">Tidak Perlu Installer</option>
    <option value="1500">Installer Saja</option>
    <option value="3000">Installer + Auto Update</option>
  </select>
</div>

<div class="wizard-step" data-step="6">
  <h5>6. Koneksi ke Perangkat (Hardware)</h5>
  <select class="form-select cost-input" data-cost="hardware">
    <option value="-1">Pilih...</option>
    <option value="0">Tidak Ada</option>
    <option value="2000">Printer / Barcode Scanner</option>
    <option value="4000">Timbangan / RFID / Alat Khusus</option>
  </select>
</div>

<div class="wizard-step" data-step="7">
  <h5>7. Mode Offline & Sinkronisasi</h5>
  <select class="form-select cost-input" data-cost="offline">
    <option value="-1">Pilih...</option>
    <option value="0">Hanya Online / Lokal</option>
    <option value="2500">Offline Mode</option>
    <option value="4000">Offline + Sinkronisasi ke Cloud</option>
  </select>
</div>

<div class="wizard-step" data-step="8">
  <h5>8. Sistem Lisensi / Aktivasi</h5>
  <select class="form-select cost-input" data-cost="license">
    <option value="-1">Pilih...</option>
    <option value="0">Tanpa Lisensi</option>
    <option value="1500">Aktivasi Manual</option>
    <option value="3000">Lisensi Online + Tracking</option>
  </select>
</div>

<div class="wizard-step" data-step="9">
  <h5>9. Tampilan & UX</h5>
  <select class="form-select cost-input" data-cost="uiux">
    <option value="-1">Pilih...</option>
    <option value="500">Minimalis</option>
    <option value="1500">Standar Modern</option>
    <option value="2500">Custom Theme / Dark Mode</option>
  </select>
</div>

<div class="wizard-step" data-step="10">
  <h5>10. Deadline Pengerjaan</h5>
  <select class="form-select cost-input" data-cost="timeline">
    <option value="-1">Pilih...</option>
    <option value="0">Santai (2-3 bulan)</option>
    <option value="3000">Normal (1 bulan)</option>
    <option value="6000">Express (1 minggu)</option>
  </select>
</div>



    <!-- Buttons -->
    <div class="d-flex justify-content-between mt-4">
      <button type="button" class="btn btn-secondary prevBtn" >Sebelumnya</button>
      <button type="button" class="btn btn-primary nextBtn" >Berikutnya</button>
    </div>
  </form>

        <div class="subtotalBox alert alert-info mt-3 d-none">
          <strong>Subtotal Sementara:</strong> <span class="subtotal">Rp 0</span>
        </div>

        <div class="finalResult alert alert-success mt-4 d-none">
          <h4>Total Estimasi Biaya:</h4>
          <div class="finalSummary mb-3"></div>
          <p  class="finalCost fs-4 fw-bold"></p>
          <button class="btn btn-outline-primary mt-3" onclick="location.reload()">Ulangi Estimasi</button>
          <button  data-jenis="Aplikasi Desktop" class="btn btn-outline-primary mt-3 bi bi-whatsapp wa-link-pesan-app" >Aku Pesan yang ini!</button>
        </div>

      </div>
    </div>
  </div>
</div>