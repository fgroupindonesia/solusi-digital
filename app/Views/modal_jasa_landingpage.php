<div class="modal fade" id="landingpage-form-modal" tabindex="-1">
  <form id="landingpage-form" action="/order-new-landingpage" method="post">

    <input id="landingpage-hidden-username" name="username" type="hidden" value="<?= $username; ?>" class="form-control">

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
        <?php if($data_p->order_type== 'landing_page'): ?>
        <input data-harga="<?=$data_p->total_price; ?>" required data-entity="landing_page" required name="package" id="landingpage-package-<?= $data_p->name; ?>" type="radio" class="radio-package custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="landingpage-package-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

   <div class="form-group row">
            <label for="landingpage-price" class="col-4 col-form-label">Harga :</label>
            <div class="col-8">
              <div class="input-group">
                <input id="landingpage-price" readonly type="text" class="form-control">
              </div>
            </div>
          </div> 

 

  <div class="form-group row">
    <label for="landingpage-integrasi" class="col-4 col-form-label">Integrasi</label> 
    <div class="col-8">
      <select id="landingpage-integrasi" name="integrasi" class="form-control">
        <option value="tidak">Tidak</option>
        <option value="ya">Ya</option>
      </select>
    </div>
  </div>
  
<div class="form-group row landingpage-platform-integrasi-wrapper d-none" >
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