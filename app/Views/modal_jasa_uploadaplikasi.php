<div class="modal fade" id="jasa-upload-aplikasi-form-modal" tabindex="-1">
  <form id="uploadaplikasi-form" action="/order-new-jasa-uploadaplikasi" method="post" enctype="multipart/form-data">
    <!-- hidden elemental used -->
    <input id="app-hidden-id" name="id" type="hidden" value="" class="form-control">
    <!-- hidden elemental used -->

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Jasa Upload Aplikasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- the form body started from here -->
          <div class="form-group row">
            <label for="uploadaplikasi-package" class="col-4 col-form-label">Package</label>
            <div class="col-8">
              <select required id="uploadaplikasi-package" name="package">
                <option value="none">-</option>
                <?php if(!empty($data_packages)) : ?>
                  <?php foreach($data_packages as $dpack):?>
                    <?php if($dpack->order_type == 'uploadaplikasi') : ?>
                      <option name="package" data-harga="<?= $dpack->total_price;?>" value="<?= $dpack->name ?>"> <?= $dpack->name; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="uploadaplikasi-price" class="col-4 col-form-label">Harga :</label>
            <div class="col-8">
              <div class="input-group">
                <input id="uploadaplikasi-price" readonly type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="uploadaplikasi-app-name" class="col-4 col-form-label">App Name</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-file"></i>
                  </div>
                </div>
                <input required id="uploadaplikasi-app-name" name="uploadaplikasi-app-name" type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="uploadaplikasi-description" class="col-4 col-form-label">Descriptions</label>
            <div class="col-8">
              <input id="uploadaplikasi-description" name="uploadaplikasi-description" type="text" class="form-control">
            </div>
          </div>

          <!-- ICON -->
          <div class="form-group row">
            <label for="uploadaplikasi-icon" class="col-4 col-form-label">Icon (*.png) 16x16px / 32x32px</label>
            <div class="col-8">
              <input id="uploadaplikasi-icon" name="uploadaplikasi-icon" type="file" accept=".png" class="form-control">
              <img id="preview-icon" src="#" alt="Preview Icon" style="display:none; max-height: 100px; margin-top: 10px;" />
            </div>
          </div>

          <!-- SCREENSHOT -->
          <div class="form-group row">
            <label for="uploadaplikasi-screenshot" class="col-4 col-form-label">Best Screenshot (*.jpg or *.png) 800x600px / 1920x1080px</label>
            <div class="col-8">
              <input id="uploadaplikasi-screenshot" name="uploadaplikasi-screenshot" type="file" accept="image/*" class="form-control">
              <img id="preview-screenshot" src="#" alt="Preview Screenshot" style="display:none; max-height: 100px; margin-top: 10px;" />
            </div>
          </div>

          <div class="form-group row">
            <label for="uploadaplikasi-privacy-url" class="col-4 col-form-label">Privacy URL</label>
            <div class="col-8">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">http://</div>
                </div>
                <input id="uploadaplikasi-privacy-url" name="uploadaplikasi-privacy-url" type="text" class="form-control">
              </div>
            </div>
          </div>

          <!-- only for admin purposes -->
          <?php if($role == 'admin') : ?>
          <div class="form-group row">
            <label for="username_owned" class="col-4 col-form-label">Username Owned</label>
            <div class="col-8">
              <div class="input-group">
                <select id="username_owned" name="username_owned">
                  <?php foreach ($data_users as $userna): ?>
                    <option data-id="<?= $userna->id ?>" value="<?= $userna->username ?>"><?= $userna->username ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if($role != 'admin'): ?>
            <input name="user_id" type="hidden" id="uploadaplikasi-hidden-user-id" value="<?= $user_id ?>">
            <input name="username_owned" type="hidden" id="uploadaplikasi-hidden-username-owned" value="<?= $username ?>">
          <?php endif; ?>
          <!-- end of form body -->
        </div>
        <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
      
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
      </div>
    </div>
  </form>
</div>
