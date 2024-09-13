<div class="modal fade" id="jasa-komen-form-modal" tabindex="-1">
  <form id="jasa-komen-form" action="/order-new-jasa-comment" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-komen-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
  <input id="jasa-komen-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Komen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label  class="col-4 col-form-label">Pilih Sosial Media:</label> <div class="col-8">
        <div class="social-medias round-btn opt-social" data-value="instagram-post">
          <img src="/assets/images/instagram-logo.png" /> <span class="title-btn">Instagram Post</span> </div>
        <div class="social-medias round-btn opt-social" data-value="instagram-live">
          <img src="/assets/images/instagram-logo.png" /> <span class="title-btn">Instagram Live</span> </div>
        <div class="social-medias round-btn opt-social" data-value="tiktok-post">
          <img src="/assets/images/tiktok-logo.png" /> <span class="title-btn">Tiktok Post</span> </div>
        <div class="social-medias round-btn opt-social" data-value="tiktok-live">
          <img src="/assets/images/tiktok-logo.png" /> <span class="title-btn">Tiktok Live</span> </div>
       <div class="social-medias round-btn opt-social" data-value="shopee-live">
          <img src="/assets/images/shopee-logo.png" /> <span class="title-btn">Shopee Live</span> </div>
     <div class="social-medias round-btn opt-social" data-value="youtube-live">
          <img src="/assets/images/youtube-logo.png" /> <span class="title-btn">Youtube Live</span> </div>
      <div class="social-medias round-btn opt-social" data-value="facebook">
          <img src="/assets/images/fb-logo.png" /> <span class="title-btn">Facebook</span> </div>    
      <div class="social-medias round-btn opt-social" data-value="x">
          <img src="/assets/images/twitter-x-logo.png" /> <span class="title-btn">X</span> </div>  
    </div>
  </div>
 <div class="form-group row">
    <label for="jasa-komen-url" class="col-4 col-form-label">Url Sosial Media Anda:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-globe"></i>
          </div>
        </div> 
        <input required id="jasa-komen-url" name="url" placeholder="contoh : http://www.facebook.com/mypage" value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jasa-komen-videokonten"  class="col-4 col-form-label">Judul Video/Konten:</label> 
    <div class="col-8">
      <input required id="jasa-komen-videokonten" placeholder="ketik judul video konten anda" name="title" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
     <?php if($total_packages !=0 ): ?>
      <?php foreach($data_packages as $data_p): ?>
      <div class="custom-control custom-radio custom-control-inline">
        <?php if($data_p->order_type== 'comment'): ?>
        <input required name="package" id="jasa-komen-paket-<?= $data_p->name; ?>" type="radio" class="custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="jasa-komen-paket-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
      
      <!-- this is the sample layout item   
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="jasa-komen-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-komen-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
      end of the sample layout item -->

    </div>
  </div> 

  <div class="form-group row">
    <label for="jasa-komen-gender-member" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="jasa-komen-gender-member" name="gender">
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
        <textarea required id="jasa-komen-notes" name="notes" rows="10" cols="30" placeholder="Tuliskan catatan bagi komentator tentang jenis atau gaya penyampaian yang ingin disertakan."></textarea>
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