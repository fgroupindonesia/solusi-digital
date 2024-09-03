<div class="modal fade" id="upload-virtualvisitors-form-modal" tabindex="-1">
  <form id="upload-virtualvisitors-form"  >
 <!-- hidden elemental used -->
  <input id="upload-virtualvisitors-hidden-id" name="id" type="hidden" value="<?= $user_id; ?>" class="form-control">
  <input id="upload-virtualvisitors-hidden-username" name="username" type="hidden" value="<?= $username; ?>" class="form-control">
  <input id="upload-virtualvisitors-hidden-order-id" name="order-id" type="hidden" value="<?= $order_id; ?>" class="form-control">
  <input id="upload-virtualvisitors-hidden-campaign-id" name="campaign-id" type="hidden" value="<?= $campaign_id; ?>" class="form-control">
  
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label  class="col-4 col-form-label">1.Get Template &amp; Fill The Data</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-user"></i>
          </div>
        </div> 
        <a href="/assets/bulk/template_data_virtualvisitors.xlsx">Download</a>
      </div>
    </div>
  </div>
 
 <div class="form-group row">
    <label for="upload-virtualvisitors-attachment" class="col-4 col-form-label">2.Choose a Campaign</label> 
    <div class="col-8">
      <div class="input-group">
          <div id="existing-campaign">
          
          <select>
            <?php if(!empty($data_campaign)): ?>
            <?php foreach($data_campaign as $datac): ?>
            <option value="<?= $datac->name ;?>"><?= $datac->name ;?></option>
          <?php endforeach; ?>
           <?php else : ?>
            <option value=''> </option>
            <?php endif; ?>
            <option value="new">buat baru</option>
          </select>

          <a id="delete-campaign" style="<?=$s = (empty($data_campaign)) ? 'display:none' : '' ;?>" href="" >Delete</a>

          </div>

          <div id="new-campaign">
            <input id="name-campaign" type="text" placeholder="berikan nama campaign anda!" >
            <a id="save-campaign" href="" >Save</a> | 
            <a id="cancel-campaign" href="" >Cancel</a>
          </div>

      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label for="upload-virtualvisitors-attachment" class="col-4 col-form-label">3.Upload</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="upload-virtualvisitors-attachment" name="virtualvisitorsfile" type="file" >
      </div>
    </div>
  </div> 

  

   <div id="virtualvisitors-progress" class="form-group row">
    <label  class="col-4 col-form-label">Progress</label> 
    <div class="col-8">
      <img id="status-virtualvisitors-loading" src="/assets/images/loading.gif" >
      <img id="status-virtualvisitors-error" src="/assets/images/error.png" >
    </div>
  </div>



<!-- this is end of form body -->

      </div> 
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
        <button type="button" class="btn btn-secondary btn-close-custom" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</form>
</div>