<div class="modal fade" id="jasa-subscriber-form-modal" tabindex="-1">
  <form id="jasa-subscriber-form" action="/order-new-jasa-subscriber" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-subscriber-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
<input id="jasa-subscriber-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Subscriber &amp; Follower</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label class="col-4 col-form-label">Pilih Sosial Media:</label> <div class="col-8">
        <div class="social-medias round-btn opt-social" data-value="instagram" >
          <img src="/assets/images/instagram-logo.png" /> <span class="title-btn">Instagram</span> </div>  
        <div class="social-medias round-btn opt-social" data-value="tiktok" >
          <img src="/assets/images/tiktok-logo.png" /> <span class="title-btn">Tiktok </span> </div>
         <div class="social-medias round-btn opt-social" data-value="youtube" >
          <img src="/assets/images/youtube-logo.png" /> <span class="title-btn">Youtube </span> </div>
      <div class="social-medias round-btn opt-social" data-value="x" >
          <img src="/assets/images/twitter-x-logo.png" /> <span class="title-btn">X</span> </div>  
    </div>
  </div>
 <div class="form-group row">
    <label for="jasa-subscriber-url" class="col-4 col-form-label">Url Sosial Media:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-globe"></i>
          </div>
        </div> 
        <input required id="jasa-subscriber-url" name="url" placeholder="contoh : http://www.facebook.com/mypage" value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jasa-subscriber-namaakun"  class="col-4 col-form-label">Nama Akun:</label> 
    <div class="col-8">
      <input required id="jasa-subscriber-namaakun" placeholder="ketik nama akun anda" name="account_name" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
      
      <?php if($total_packages !=0 ): ?>
      <?php foreach($data_packages as $data_p): ?>
      <div class="custom-control custom-radio custom-control-inline">
        <?php if($data_p->order_type== 'subscriber'): ?>
        <input required name="package" id="jasa-subscriber-paket-<?= $data_p->name; ?>" type="radio" class="custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="jasa-subscriber-paket-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>

      <!-- this is the sample layout
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="jasa-subscriber-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-subscriber-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
      end of sample layout -->

    </div>
  </div> 

  <div class="form-group row">
    <label for="jasa-subscriber-gender-member" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="jasa-subscriber-gender-member" name="gender">
          <option value="lelaki">Laki-laki</option>
         <option value="perempuan">Perempuan</option>
        </select>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label class="col-4 red-text-bold">PERHATIAN</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
         <p class="warning-text"> Jika Channel / akun Sosial media anda berisi konten tentang spesifik perempuan/lelaki saja, maka pilihlah gender subscriber yang pas itu saja. Hal ini meminimalisir penurunan follower/subscriber pada saat order diproses oleh sistem.
      </p>
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