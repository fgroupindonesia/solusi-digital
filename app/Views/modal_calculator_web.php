<div class="modal fade" id="modalEstimatorWeb" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Estimator Biaya Sistem Web</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">

        <!-- Wizard Form -->
         <form class="wizardForm" data-currentstep="1">
   <div id="wizardSteps">
  <div class="wizard-step active" data-step="1">
    <h5>1. Jenis Web App</h5>
    <select class="form-select cost-input" data-cost="type">
      <option value="-1">Pilih...</option>
      <option value="500">Demo Prototype</option>
      <option value="1000">Company Profile</option>
      <option value="2500">Portal Informasi (CMS)</option>
      <option value="5000">eCommerce / Toko Online</option>
      <option value="7000">Booking / Order System</option>
    </select>
  </div>

  <div class="wizard-step" data-step="2">
    <h5>2. Fitur Login & Registrasi</h5>
    <select class="form-select cost-input" data-cost="auth">
      <option value="-1">Pilih...</option>
      <option value="0">Tidak Perlu</option>
      <option value="1200">Ya, Login Biasa</option>
      <option value="2000">Ya, Login + Social Media</option>
    </select>
  </div>

  <div class="wizard-step" data-step="3">
    <h5>3. Dashboard Admin</h5>
    <select class="form-select cost-input" data-cost="admin">
      <option value="-1">Pilih...</option>
      <option value="0">Tidak Perlu</option>
      <option value="2500">Admin Sederhana</option>
      <option value="4000">Admin Lengkap (CRUD, Statistik)</option>
    </select>
  </div>

  <div class="wizard-step" data-step="4">
    <h5>4. Desain Responsif</h5>
    <select class="form-select cost-input" data-cost="responsive">
      <option value="-1">Pilih...</option>
      <option value="0">Tidak, hanya Desktop</option>
      <option value="1000">Ya, Responsif Mobile</option>
    </select>
  </div>

  <div class="wizard-step" data-step="5">
    <h5>5. CMS Integration</h5>
    <select class="form-select cost-input" data-cost="cms">
      <option value="-1">Pilih...</option>
      <option value="0">Tidak Perlu</option>
      <option value="1500">Ya, WordPress / Custom CMS</option>
    </select>
  </div>

  <div class="wizard-step" data-step="6">
    <h5>6. Fitur Integrasi Pembayaran</h5>
    <select class="form-select cost-input" data-cost="payment">
      <option value="-1">Pilih...</option>
      <option value="0">Tidak</option>
      <option value="2000">Ya</option>
    </select>
  </div>

  <div class="wizard-step" data-step="7">
    <h5>7. Integrasi API Eksternal</h5>
    <select class="form-select cost-input" data-cost="api">
      <option value="-1">Pilih...</option>
      <option value="0">Tidak</option>
      <option value="1500">Ya, 1-2 API</option>
      <option value="3000">Ya, Banyak API</option>
    </select>
  </div>

  <div class="wizard-step" data-step="8">
    <h5>8. Fitur Bahasa</h5>
    <select class="form-select cost-input" data-cost="language">
      <option value="-1">Pilih...</option>
      <option value="0">Satu Bahasa</option>
      <option value="1000">Multi-Bahasa</option>
    </select>
  </div>

  <div class="wizard-step" data-step="9">
    <h5>9. Jumlah Modul/Halaman</h5>
    <select class="form-select cost-input" data-cost="pages">
      <option value="-1">Pilih...</option>
      <option value="1000">1-5 Halaman</option>
      <option value="2000">6-10 Halaman</option>
      <option value="4000">Lebih dari 10 Halaman</option>
    </select>
  </div>

  <div class="wizard-step" data-step="10">
    <h5>10. Deadline Pengerjaan</h5>
    <select class="form-select cost-input" data-cost="timeline">
      <option value="-1">Pilih...</option>
      <option value="0">Fleksibel (2-3 bulan)</option>
      <option value="2500">Normal (1 bulan)</option>
      <option value="5000">Express (1 minggu)</option>
    </select>
  </div>
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
          <p class="finalCost fs-4 fw-bold"></p>
          <button class="btn btn-outline-primary mt-3" onclick="location.reload()">Ulangi Estimasi</button>
          <button data-jenis="Sistem Web" class="btn btn-outline-primary mt-3 bi bi-whatsapp wa-link-pesan-app" >Aku Pesan yang ini!</button>
           
        </div>

      </div>
    </div>
  </div>
</div>