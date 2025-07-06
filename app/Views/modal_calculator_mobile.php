<div class="modal fade" id="modalEstimatorMobile" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Estimator Biaya Aplikasi Mobile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">

        <!-- Wizard Form -->
        <form class="wizardForm" data-currentstep="1">
          <div id="wizardSteps">
            <!-- Langsung 10 step dimuat di sini -->
            <div class="wizard-step active" data-step="1">
              <h5>1. Jenis Aplikasi</h5>
              <select class="form-select cost-input" data-cost="type">
                <option value="-1">Pilih...</option>
                <option value="500">Demo Prototype</option>
                <option value="1000">Informasi Saja</option>
                <option value="3000">Interaktif (Login, Form, dll)</option>
                <option value="5000">eCommerce / Transaksi</option>
              </select>
            </div>
            <div class="wizard-step" data-step="2">
              <h5>2. Platform</h5>
              <select class="form-select cost-input" data-cost="platform">
                <option value="-1">Pilih...</option>
                <option value="1500">Android</option>
                <option value="1700">iOS</option>
                <option value="4000">Keduanya</option>
              </select>
            </div>
            <div class="wizard-step" data-step="3">
              <h5>3. Jenis Desain UI</h5>
              <select class="form-select cost-input" data-cost="design">
                <option value="-1">Pilih...</option>
                <option value="500">Template Biasa</option>
                <option value="2500">Custom Desain</option>
                <option value="3500">Super Premium Desain</option>
              </select>
            </div>
            <div class="wizard-step" data-step="4">
              <h5>4. Fitur Notifikasi</h5>
              <select class="form-select cost-input" data-cost="notifications">
                <option value="-1">Pilih...</option>
                <option value="0">Tidak</option>
                <option value="1000">Ya</option>
              </select>
            </div>
            <div class="wizard-step" data-step="5">
              <h5>5. Fitur Peta/Lokasi</h5>
              <select class="form-select cost-input" data-cost="maps">
                <option value="-1">Pilih...</option>
                <option value="0">Tidak</option>
                <option value="1200">Ya</option>
              </select>
            </div>
            <div class="wizard-step" data-step="6">
              <h5>6. Backend/Admin Panel</h5>
              <select class="form-select cost-input" data-cost="backend">
                <option value="-1">Pilih...</option>
                <option value="0">Tidak Perlu</option>
                <option value="2500">Perlu</option>
              </select>
            </div>
            <div class="wizard-step" data-step="7">
              <h5>7. Fitur Login Sosial Media</h5>
              <select class="form-select cost-input" data-cost="social-login">
                <option value="-1">Pilih...</option>
                <option value="0">Tidak</option>
                <option value="800">Ya</option>
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
              <h5>9. Fitur Pembayaran</h5>
              <select class="form-select cost-input" data-cost="payment">
                <option value="-1">Pilih...</option>
                <option value="0">Tidak</option>
                <option value="1500">Ya</option>
              </select>
            </div>
            <div class="wizard-step" data-step="10">
              <h5>10. Jadwal Pengerjaan</h5>
              <select class="form-select cost-input" data-cost="timeline">
                <option value="-1">Pilih...</option>
                <option value="0">Santai (2-3 bulan)</option>
                <option value="2000">Cepat (1 bulan)</option>
                <option value="4000">Super Cepat (1 minggu)</option>
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
          <button data-jenis="Mobile App" class="btn btn-outline-primary mt-3 bi bi-whatsapp wa-link-pesan-app" >Aku Pesan yang ini!</button>
        </div>

      </div>
    </div>
  </div>
</div>