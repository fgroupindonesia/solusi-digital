<div class="modal fade" id="app-form-modal" tabindex="-1">
  <form id="app-form" action="/add-new-app" method="post">
 <!-- hidden elemental used -->
  <input id="app-hidden-id" name="id" type="hidden" value="" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">App Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label for="apps_name" class="col-4 col-form-label">App Name</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-file"></i>
          </div>
        </div> 
        <input id="apps_name" name="apps_name" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="descriptions" class="col-4 col-form-label">Descriptions</label> 
    <div class="col-8">
      <input id="descriptions" name="descriptions" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="icon" class="col-4 col-form-label">Icon (*.png)</label> 
    <div class="col-8">
      <input id="icon" name="icon" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="best_screenshot" class="col-4 col-form-label">Best Screenshot</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-camera"></i>
          </div>
        </div> 
        <input id="best_screenshot" name="best_screenshot" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="privacy_url" class="col-4 col-form-label">Privacy URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">http://</div>
        </div> 
        <input id="privacy_url" name="privacy_url" type="text" class="form-control">
      </div>
    </div>
  </div> 
  <!-- only for admin purposes -->
  <?php if($role == 'admin') : ?>
  <div class="form-group row">
    <label for="username_owned" class="col-4 col-form-label">Username Owned</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="username_owned" name="username_owned" >
            <?php foreach ($data_users as $v): ?>
              <option data-id="<?= $v->id ?>" value="<?= $v->username ?>"><?= $v->username ?></option>
            <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div> 
<?php endif; ?>
  <!-- only for admin purposes -->

  <!-- for non-admin purposes such as client -->
  <?php if($role!='admin'): ?>
 <input name="user_id" type="hidden" id="app-hidden-user-id" value="<?= $user_id ?>" >
 <input name="username_owned" type="hidden" id="app-hidden-username-owned" value="<?= $username ?>" >
  <?php endif; ?>
  <!-- only for client purposes -->

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