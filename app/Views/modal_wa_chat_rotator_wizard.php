<div class="modal fade" id="wa-chat-rotator-wizard-modal" tabindex="-1">
  <form id="wa-chat-rotator-wizard-form" action="/update-wa-chat-rotator" method="post">
    <input id="wa-chat-rotator-wizard-user-hidden-id" name="id" type="hidden" value="" class="form-control">

    <input id="wa-chat-rotator-wizard-package" type="hidden" >

  <div class="modal-dialog">
    <div class="modal-content modal-wide">
      <div class="modal-header">
        <h5 class="modal-title">WA Chat Rotator</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
       <div class="container wizard">
  <form id="waWizardForm" action="/update-wa-chat-rotator" method="POST">
    
    <!-- Step 1 -->
    <div class="step active" id="step1">
      <h3 class="mb-3">1. Pilih Jenis Rotator</h3>

      <div class="mb-3">
        <label class="form-label">Jenis Rotator:</label>
        <select class="form-select" name="rotator_mode" id="modeSelect" required>
          <option selected disabled>Pilih Salah Satu</option>
          <option value="random">🔀 Random</option>
          <option value="order">🔢 Urutan CS</option>
          <option value="schedule">🕒 Schedule</option>
          <option value="origin">📍 Kota</option>
          <option value="device">📱  Perangkat</option>
        </select>
      </div>

       <div class="mb-3">
        <label class="form-label">Mode:</label>
        
                <select name="identifier_mode" class="identifier_mode form-control custom-select">
                  <option selected="" disabled="">Pilih Satu</option>
                  <option value="manual">manual</option>
                  <option value="button contains">button contains</option>
                  <option value="link contains">link contains</option>
                  <option value="all buttons">all buttons</option>
                  <option value="all links">all links</option>
                </select>
                 <input type="text" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="tulis disini identifier penghubung klik wa di website mu" placeholder="tulis tag disini"  name="identifier_tag" class="form-control identifier_tag" >
      </div>

      <div class="mb-3">
        <label class="form-label">Nama Tema:</label>
        <input type="text" class="form-control" name="tema" required placeholder="Contoh: Tema Lebaran">
      </div>

      <div class="mb-3">
        <label class="form-label">Pesan Teks:</label>
        <textarea id="format-text-wa" class="form-control" name="message" rows="3" required placeholder="Tulis pesan awal chat..."></textarea>
      </div>

      <button type="button" class="btn btn-primary" onclick="nextStep()">Lanjut</button>
    </div>



    <!-- Step 2 -->
    <div class="step" id="step2">
      <h3 class="mb-3">2. Tambah Nomor CS</h3>

      <div id="csList"></div>

      <button type="button" class="btn btn-outline-primary mb-3" onclick="addCSNumber()">+ Tambah CS</button><br>

      <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" onclick="prevStep()">Kembali</button>
        <button type="button" class="btn btn-primary" onclick="validateAndNext()">Lanjut</button>
      </div>
    </div>

    <!-- Step 3 -->
    <div class="step" id="step3">
      <h3 class="mb-3">3. Masukkan Website</h3>

      <div id="websites" class="mb-3">
        <input type="text" class="form-control mb-2" name="web_url[]" placeholder="cth: https://tokoku.com" required>
      </div>

      <button type="button" class="btn btn-outline-primary mb-3" onclick="addInput('websites', 'web_url[]')">+ Tambah Link</button><br>

      <input type="hidden" name="identifier_mode" value="all buttons">
      <input type="hidden" name="identifier_tag" value="">
      <input type="hidden" name="custom_name" value="Tema Otomatis">

      <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" onclick="prevStep()">Kembali</button>
        <button type="submit" class="btn btn-success btn-save">Simpan Pengaturan</button>
      </div>
    </div>
  </form>
</div>

      </div> <!-- this is end of modal-body -->
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
        
      </div>
    </div>
  </div>
</form>
</div>