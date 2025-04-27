<div class="modal fade" id="jasa-follow-marketplace-form-modal" tabindex="-1">
  <form id="jasa-follow-marketplace-form" action="/order-new-jasa-follow-marketplace" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-follow-marketplace-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
 <input id="jasa-follow-marketplace-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Follow Marketplace</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label class="col-4 col-form-label">Pilih Marketplace:</label> <div class="col-8">
        <div class="social-medias round-btn opt-social" data-value="bukalapak">
          <img src="/assets/images/bukalapak-logo.png" /> <span class="title-btn">Bukalapak</span> </div>
        <div class="social-medias round-btn opt-social" data-value="blibli" >
          <img src="/assets/images/blibli-logo.png" /> <span class="title-btn">BliBli</span> </div>
        <div class="social-medias round-btn opt-social" data-value="lazada" >
          <img src="/assets/images/lazada-logo.png" /> <span class="title-btn">Lazada</span> </div>
        <div class="social-medias round-btn opt-social" data-value="tokopedia" >
          <img src="/assets/images/tokped-logo.png" /> <span class="title-btn">Tokopedia</span> </div>
    </div>
  </div>
 <div class="form-group row">
    <label for="jasa-follow-marketplace-url" class="col-4 col-form-label">Url Marketplace Anda:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-globe"></i>
          </div>
        </div> 
        <input required id="jasa-follow-marketplace-url" name="url" placeholder="contoh : http://www.shopee.co.id/tokokulaku" value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jasa-follow-marketplace-shopname"  class="col-4 col-form-label">Nama Toko:</label> 
    <div class="col-8">
      <input required id="jasa-follow-marketplace-shopname" placeholder="ketik nama toko anda" name="shop_name" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
      <?php if($total_packages !=0 ): ?>
      <?php foreach($data_packages as $data_p): ?>
      <div class="custom-control custom-radio custom-control-inline">
        <?php if($data_p->order_type== 'follow_marketplace'): ?>
        <input required name="package" id="jasa-follow-marketplace-paket-<?= $data_p->name; ?>" type="radio" class="custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="jasa-follow-marketplace-paket-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>

      <!-- this is the sample layout
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="jasa-follow-marketplace-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-follow-marketplace-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
       end of sample layout --> 

    </div>
  </div> 

  <div class="form-group row">
    <label for="jasa-follow-marketplace-gender-member" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="jasa-follow-marketplace-gender-member" name="gender">
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
        <textarea required name="notes" rows="10" cols="30" placeholder="Tuliskan catatan bagi komentator tentang jenis atau gaya penyampaian yang ingin disertakan."></textarea>
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