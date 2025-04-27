<div class="modal fade" id="jasa-virtualvisitors-form-modal" tabindex="-1">
  <form id="jasa-virtualvisitors-form" action="/order-new-jasa-virtualvisitors" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-virtualvisitors-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
  <input id="jasa-virtualvisitors-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Virtual Visitors</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label class="col-4 col-form-label">Website:</label> <div class="col-8">
       
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
 <div class="form-group row">
    <label for="jasa-virtualvisitors-url" class="col-4 col-form-label">Url Website Anda:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-globe"></i>
          </div>
        </div> 
        <input required id="jasa-virtualvisitors-url" name="url" placeholder="contoh : http://www.websiteku.com" value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jasa-virtualvisitors-namabisnis"  class="col-4 col-form-label">Nama Bisnis/Toko:</label> 
    <div class="col-8">
      <input required id="jasa-virtualvisitors-namabisnis" placeholder="ketik nama bisnis toko anda" name="business_name" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
     
       <?php if($total_packages !=0 ): ?>
      <?php foreach($data_packages as $data_p): ?>
      <div class="custom-control custom-radio custom-control-inline">
        <?php if($data_p->order_type== 'virtualvisitors'): ?>
        <input required name="package" id="jasa-virtualvisitors-paket-<?= $data_p->name; ?>" type="radio" class="custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="jasa-virtualvisitors-paket-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>

      <!-- this is the sample layout
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="jasa-virtualvisitors-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-virtualvisitors-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
      end of sample layout -->

    </div>
  </div> 

  <div class="form-group row">
    <label for="jasa-virtualvisitors-gender-member" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="jasa-virtualvisitors-gender-member" name="gender">
          <option value="lelaki">Laki-laki</option>
         <option value="perempuan">Perempuan</option>
          <option value="perempuan">Mixed</option>
        </select>
      </div>
    </div>
  </div> 

  <div class="form-group row">
  
  </div> 


<!-- this is end of form body -->

      </div> 
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
        
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
</form>
</div>