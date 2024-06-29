<div class="modal fade" id="setting-form-modal" tabindex="-1">
  <form id="setting-form" action="/update-settings" method="post">
 <!-- hidden elemental used -->
  <input id="setting-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Settings</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label for="setting-username" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-user"></i>
          </div>
        </div> 
        <input id="setting-username" name="username" value="<?= $username ?>" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="setting-pass" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="setting-pass" name="pass" type="password" value="<?= $pass ?>" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="setting-email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="setting-email" name="email" type="email" value="<?= $email ?>" class="form-control">
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label for="setting-occupation" class="col-4 col-form-label">Occupation</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="setting-occupation" name="occupation" type="text" value="<?= $occupation ?>" class="form-control">
      </div>
    </div>
  </div> 

 <div class="form-group row">
    <label class="col-4">Sex</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="sex" id="setting-sex-male" <?= $sex_male_radio ?> type="radio" class="custom-control-input" value="male"> 
        <label for="setting-sex-male" class="custom-control-label">male</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="sex" id="setting-sex-female" <?= $sex_female_radio ?> type="radio" class="custom-control-input" value="female"> 
        <label for="setting-sex-female" class="custom-control-label">female</label>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label for="setting-whatsapp" class="col-4 col-form-label">Whatsapp</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="setting-whatsapp" name="whatsapp" type="text" value="<?= $whatsapp ?>" class="form-control">
      </div>
    </div>
  </div> 


<!-- this is end of form body -->

      </div> 
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
        <button type="button" class="btn btn-secondary btn-close-custom" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
</form>
</div>