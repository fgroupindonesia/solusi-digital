<div class="modal fade" id="jasa-rating-form-modal" tabindex="-1">
  <form id="jasa-rating-form" action="/order-new-jasa-rating" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-rating-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
  <input id="jasa-rating-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Rating &amp; Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label class="col-4 col-form-label">Sosial Media:</label> <div class="col-8">
       
      <div class="social-medias round-btn opt-social" data-value="google-map" >
          <img src="/assets/images/gmaps-logo.png" /> <span class="title-btn">Google Map</span> </div>  
    </div>
  </div>
 <div class="form-group row">
    <label for="jasa-rating-url" class="col-4 col-form-label">Url Sosial Media Anda:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-globe"></i>
          </div>
        </div> 
        <input required id="jasa-rating-url" name="url" placeholder="contoh : http://www.gmaps.com/abcdefg" value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jasa-rating-namabisnis"  class="col-4 col-form-label">Nama Bisnis/Toko:</label> 
    <div class="col-8">
      <input required id="jasa-rating-namabisnis" placeholder="ketik nama bisnis toko anda" name="business_name" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
      
    <?php if($total_packages !=0 ): ?>
      <?php foreach($data_packages as $data_p): ?>
      <div class="custom-control custom-radio custom-control-inline">
        <?php if($data_p->order_type== 'rating'): ?>
        <input required name="package" id="jasa-rating-paket-<?= $data_p->name; ?>" type="radio" class="custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="jasa-rating-paket-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>

      <!-- this is the sample layout
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="jasa-rating-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-rating-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
      end of sample layout -->

    </div>
  </div> 

  <div class="form-group row">
    <label for="jasa-rating-gender-member" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="jasa-rating-gender-member" name="gender">
          <option value="lelaki">Laki-laki</option>
         <option value="perempuan">Perempuan</option>
        </select>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label class="col-4">Catatan</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <textarea required name="notes" rows="10" cols="30" placeholder="Tuliskan catatan bagi komentator tentang jenis atau gaya penyampaian yang ingin mereka tuliskan."></textarea>
      </div>
    </div>
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