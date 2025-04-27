<div class="modal fade" id="landingpage-form-modal" tabindex="-1">
  <form id="landingpage-form" action="/order-new-landingpage" method="post">
    <input id="landingpage-user-hidden-id" name="id" type="hidden" value="" class="form-control">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Landing Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  <div class="form-group row">
    <label for="package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <?php if(is_array($data_packages)): ?>
      <?php foreach($data_packages as $data_p): ?>
      <div class="custom-control custom-radio custom-control-inline">
        <?php if($data_p->order_type== 'landingpage'): ?>
        <input required name="package" id="landingpage-package-<?= $data_p->name; ?>" type="radio" class="custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="landingpage-package-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="theme" class="col-4 col-form-label">Theme</label> 
    <div class="col-8">
       <?php if(is_array($data_themeslp)): ?>
      
      <div class="custom-control custom-radio custom-control-inline">
        <select id="landingpage-theme" name="theme" class="form-control">
          <option >Pilih Satu </option>
          <?php foreach($data_themeslp as $data_p): ?>          
          <option value="<?= $data_p->name ;?>"
          data-url="<?= $data_p->url;?>" 
            data-preview="<?= $data_p->file_preview;?>" > 
            <?= $data_p->name; ?> 
          </option>
          <?php endforeach; ?>
        </select>
      </div>
      
      <?php endif; ?>
      <div id="preview-container" class="mt-3" style="display:none;">
        <a id="preview-link" href="" target="_blank">
        <img src="" class="img-thumbnail" width="200" id="screenshot_landingpage"  >
        </a>
      </div>

    </div>
  </div>
  <div class="form-group row">
    <label for="integrasi" class="col-4 col-form-label">Integrasi</label> 
    <div class="col-8">
      <select id="integrasi" name="integrasi" class="form-control">
        <option value="tidak">Tidak</option>
        <option value="ya">Ya</option>
      </select>
    </div>
  </div>
  
<div class="form-group row">
    <label class="col-4 col-form-label">Platform Integrasi:</label> <div class="col-8">
       
      <div class="social-medias round-btn opt-appbase" data-value="wordpress" >
          <img src="/assets/images/wp-logo.png" /> 
          <span class="title-btn">Wordpress</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="joomla" >
          <img src="/assets/images/joomla-logo.png" /> 
          <span class="title-btn">Joomla</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="drupal" >
          <img src="/assets/images/drupal-logo.png" /> 
          <span class="title-btn">Drupal</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="laravel" >
          <img src="/assets/images/laravel-logo.png" /> 
          <span class="title-btn">Laravel</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="codeigniter" >
          <img src="/assets/images/codeigniter-logo.png" /> 
          <span class="title-btn">Codeigniter</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="custom" >
          <img src="/assets/images/globe-logo.png" /> 
          <span class="title-btn">Custom</span> 
      </div>

    </div>
  </div>

      </div> <!-- this is end of modal-body -->
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
       
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
</form>
</div>