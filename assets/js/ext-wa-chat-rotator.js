
  let currentStep = 1;
  let csIndex = 0;
  let currentMode = "";

  function showStep(step) {
    $(".step").removeClass("active");
    $("#step" + step).addClass("active");
  }

  function nextStep() {
    if (currentStep === 1 && !validateJenisRotator()) return;
    
    if (currentStep < 3) {
      currentStep++;
      showStep(currentStep);
    }
  }

  function prevStep() {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  }

  function handleModeChange(mode) {
    currentMode = mode;
    updateAllCSFields();
  }

  function addInput(containerId, name) {
    const input = `<input type="text" name="${name}" placeholder="cth: https://linklainnya.com">`;
    $("#" + containerId).append(input);
  }

  function addCSNumber() {
    csIndex++;
    const csHtml = `
      <div class="cs-box">
        <h4>Nomor CS #${csIndex}</h4>
        <label>Nomor WA:</label>
        <input type="text" name="nomor_wa_cs[]" placeholder="628xxxxxxx" required>

        <div class="cs-schedule">
          <label>Hari:</label>
          <select name="schedule_day[]">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
            <option value="Minggu">Minggu</option>
          </select>
          <label>Jam Mulai:</label>
          <input type="time" name="schedule_start[]">
          <label>Jam Selesai:</label>
          <input type="time" name="schedule_end[]">
        </div>

        <div class="cs-origin">
          <label>Kota/Area:</label>
          <input type="text" name="origin_area[]" placeholder="Jakarta, Surabaya...">
        </div>

        <div class="cs-device">
          <label>Device:</label>
          <select name="device_type[]">
            <option value="android">Android</option>
            <option value="iphone">iPhone</option>
            <option value="general">General</option>
            <option value="laptop">Laptop/Desktop</option>
          </select>
        </div>

        <button type="button" class="btn btn-secondary remove-cs">🗑 Hapus CS</button>
      </div>
    `;
    $("#csList").append(csHtml);
    updateAllCSFields();
  }

  function updateAllCSFields() {
    $(".cs-box").each(function () {
      const $box = $(this);
      $box.find(".cs-schedule").toggle(currentMode === "schedule");
      $box.find(".cs-origin").toggle(currentMode === "origin");
      $box.find(".cs-device").toggle(currentMode === "device");
    });
  }

  function validateAndNext() {
  if (currentStep === 2 && !validateCSFields()) {
    alert("Harap lengkapi semua data CS sebelum melanjutkan.");
    return;
  }
  nextStep();
}


function validateJenisRotator() {
  const mode = $("#modeSelect").val();
  const tema = $("input[name='tema']").val().trim();
  const message = $('#format-text-wa').val().trim();

  if (!mode) {
    alert("Silakan pilih jenis rotator terlebih dahulu.");
    return false;
  }

  if (tema === "") {
    alert("Silakan isi nama tema terlebih dahulu.");
    return false;
  }

  if (message === "") {
    alert("Silakan isi pesan teks terlebih dahulu.");
    return false;
  }

  return true;
}


  function validateCSFields() {
  let isValid = true;

  $(".cs-box").each(function () {
    const nomor = $(this).find('input[name="nomor_wa_cs[]"]').val().trim();

    if (nomor === "") {
      isValid = false;
    }

    if (currentMode === "schedule") {
      const start = $(this).find('input[name="schedule_start[]"]').val();
      const end = $(this).find('input[name="schedule_end[]"]').val();
      if (!start || !end) isValid = false;
    }

    if (currentMode === "origin") {
      const origin = $(this).find('input[name="origin_area[]"]').val().trim();
      if (origin === "") isValid = false;
    }

    if (currentMode === "device") {
      const device = $(this).find('select[name="device_type[]"]').val();
      if (!device) isValid = false;
    }
  });

  return isValid;
}


  $(document).on("click", ".remove-cs", function () {
    $(this).closest(".cs-box").remove();
  });

  // Handle mode select onchange
  $(document).ready(function () {
    $("#modeSelect").change(function () {
      handleModeChange($(this).val());
    });

    $('.link-wizard').on('click', function(e){

    

      e.preventDefault();

      let idna = $(this).attr('data-id');

      $('#wa-chat-rotator-wizard-modal').modal('show');
      $('#wa-chat-rotator-wizard-user-hidden-id').val(idna);

   

    });

  });