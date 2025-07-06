<div class="modal fade" id="wa-chat-rotator-schedule-modal" tabindex="-1">
  <form id="wa-chat-rotator-schedule-form" action="/update-wa-chat-rotator-cs-schedule" method="post">
    
    <input type="hidden" name="cs_id" value="" id="wa-chat-rotator-schedule-cs-id" >
    

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Schedule : <span id="wa-chat-rotator-schedule-cs-name"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  <div class="form-group row">
    <label for="cs_number" class="col-4 col-form-label">CS Number</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="cs_number" name="cs_number" type="text" readonly class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="cs_day_mode" class="col-4 col-form-label">Day Mode</label> 
    <div class="col-8">
      <select id="cs_day_mode" name="cs_day_mode" class="form-control">
        <option value="custom">custom</option>
        <option value="all">7 days</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="occupation" class="col-4 col-form-label">Hari Terpilih</label> 
    <div class="col-8 day-container">
      <input name="cs_days_selected[]" type="checkbox" value="senin" class="cs_days_selected form-check-input">Senin <br>
      <input name="cs_days_selected[]" type="checkbox" value="selasa" class="cs_days_selected form-check-input">Selasa <br>
      <input name="cs_days_selected[]" type="checkbox" value="rabu" class="cs_days_selected form-check-input">Rabu <br>
      <input name="cs_days_selected[]" type="checkbox" value="kamis" class="cs_days_selected form-check-input">Kamis <br>
      <input name="cs_days_selected[]" type="checkbox" value="jumat" class="cs_days_selected form-check-input">Jum'at <br>
      <input name="cs_days_selected[]" type="checkbox" value="sabtu" class="cs_days_selected form-check-input">Sabtu <br>
      <input name="cs_days_selected[]" type="checkbox" value="minggu" class="cs_days_selected form-check-input">Minggu <br>
    </div>
  </div>
  <div class="form-group row">
    <label for="hour_open" class="col-4 col-form-label">Jam Buka</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="hour_open" name="hour_open" class="form-control">

        </select>
      </div>
    </div>
  </div>
   <div class="form-group row">
    <label for="hour_closed" class="col-4 col-form-label">Jam Nutup</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="hour_closed" name="hour_closed" class="form-control">
            
        </select>
      </div>
    </div>
  </div>

      </div> <!-- this is end of modal-body -->
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
        <input type="submit" class="btn btn-primary btn-save" value="Save">
      </div>
    </div>
  </div>
</form>
</div>