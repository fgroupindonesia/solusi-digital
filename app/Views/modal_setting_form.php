<div class="modal fade" id="setting-form-modal" tabindex="-1">
  <form id="setting-form" action="/update-settings" method="post">
    <input id="setting-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">

    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Fullname -->
          <div class="row mb-3">
            <label for="setting-fullname" class="col-sm-4 col-form-label">Fullname</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="setting-fullname" name="fullname" value="<?= $fullname ?>">
            </div>
          </div>

          <!-- Username -->
          <div class="row mb-3">
            <label for="setting-username" class="col-sm-4 col-form-label">Username</label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" id="setting-username" name="username" value="<?= $username ?>">
              </div>
            </div>
          </div>

          <!-- Password -->
          <div class="row mb-3">
            <label for="setting-pass" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="setting-pass" name="pass" value="<?= $pass ?>">
            </div>
          </div>

          <!-- Email -->
          <div class="row mb-3">
            <label for="setting-email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="setting-email" name="email" value="<?= $email ?>">
            </div>
          </div>

          <!-- Occupation -->
          <div class="row mb-3">
            <label for="setting-occupation" class="col-sm-4 col-form-label">Occupation</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="setting-occupation" name="occupation" value="<?= $occupation ?>">
            </div>
          </div>

          <!-- Sex -->
          <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Sex</label>
            <div class="col-sm-8 d-flex align-items-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="setting-sex-male" value="male" <?= $sex_male_radio ?>>
                <label class="form-check-label" for="setting-sex-male">Male</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="setting-sex-female" value="female" <?= $sex_female_radio ?>>
                <label class="form-check-label" for="setting-sex-female">Female</label>
              </div>
            </div>
          </div>

          <!-- Whatsapp -->
          <div class="row mb-3">
            <label for="setting-whatsapp" class="col-sm-4 col-form-label">Whatsapp</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="setting-whatsapp" name="whatsapp" value="<?= $whatsapp ?>">
            </div>
          </div>

          <hr>
          <!-- Admin Mode -->
          
        <?php if($role == 'admin'): ?>
       
         <!-- Notification -->
          <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Email Notification</label>
            <div class="col-sm-8 d-flex align-items-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="email_notif" id="email-notif-on" value="on" <?= $email_notif_on ?>>
                <label class="form-check-label" for="email-notif-on">On</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="email_notif" id="email-notif-off" value="off" <?= $email_notif_off ?>>
                <label class="form-check-label" for="email-notif-off">Off</label>
              </div>
            </div>
          </div>

           <!-- Approval Mode -->
          <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Approval Mode</label>
            <div class="col-sm-8 d-flex align-items-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="approval_mode" id="approval_mode_auto" value="automatic" <?= $approval_mode_auto ?>>
                <label class="form-check-label" for="approval_mode_auto">Automatic</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="approval_mode" id="approval_mode_manual" value="manual" <?= $approval_mode_manual ?>>
                <label class="form-check-label" for="approval_mode_manual">Manual</label>
              </div>
            </div>
          </div>
        <?php endif; ?>

        </div>



        <div class="modal-footer">
          <img class="modal-loading" src="/assets/plugins/images/loading.gif" alt="Loading..." style="height: 25px;">
          <input type="submit" class="btn btn-save btn-primary" value="Save changes">
        </div>
      </div>
    </div>
  </form>
</div>
