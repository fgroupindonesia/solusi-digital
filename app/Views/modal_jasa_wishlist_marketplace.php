<div class="modal fade" id="jasa-wishlist-marketplace-form-modal" tabindex="-1">
  <form id="jasa-wishlist-marketplace-form" action="/update-settings" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-wishlist-marketplace-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Wishlist Marketplace</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label for="jasa-wishlist-marketplace-shoptype" class="col-4 col-form-label">Pilih Marketplace:</label> <div class="col-8">
        <div class="social-medias round-btn" >
          <img src="/assets/images/bukalapak-logo.png" /> <span class="title-btn">Bukalapak</span> </div>
        <div class="social-medias round-btn" >
          <img src="/assets/images/blibli-logo.png" /> <span class="title-btn">BliBli</span> </div>
        <div class="social-medias round-btn" >
          <img src="/assets/images/lazada-logo.png" /> <span class="title-btn">Lazada</span> </div>
        <div class="social-medias round-btn" >
          <img src="/assets/images/tokped-logo.png" /> <span class="title-btn">Tokopedia</span> </div>
    </div>
  </div>
 <div class="form-group row">
    <label for="jasa-wishlist-marketplace-url" class="col-4 col-form-label">Url Marketplace Anda:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-globe"></i>
          </div>
        </div> 
        <input id="jasa-wishlist-marketplace-url" name="url" placeholder="contoh : http://www.shopee.co.id/tokokulaku" value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jasa-wishlist-marketplace-shopname"  class="col-4 col-form-label">Nama Toko:</label> 
    <div class="col-8">
      <input id="jasa-wishlist-marketplace-shopname" placeholder="ketik nama toko anda" name="shopname" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="paket" id="jasa-wishlist-marketplace-paket-hemat" type="radio" class="custom-control-input" value="hemat"> 
        <label for="jasa-wishlist-marketplace-paket-hemat" class="custom-control-label">Hemat</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="paket" id="jasa-wishlist-marketplace-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-wishlist-marketplace-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label for="jasa-wishlist-marketplace-gender-member" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <select name="gender-member">
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
        <textarea rows="10" cols="30" placeholder="Tuliskan catatan bagi komentator tentang jenis atau gaya penyampaian yang ingin disertakan."></textarea>
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