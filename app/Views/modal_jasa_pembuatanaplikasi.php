<div class="modal fade" id="jasa-pembuatanaplikasi-form-modal" tabindex="-1">
  <form id="jasa-pembuatanaplikasi-form" action="/order-new-jasa-pembuatanaplikasi" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-pembuatanaplikasi-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
  <input id="jasa-pembuatanaplikasi-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa Pembuatan Aplikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label class="col-4 col-form-label">Basis Aplikasi:</label> <div class="col-8">
       
      <div class="social-medias round-btn opt-appbase" data-value="java" >
          <img src="/assets/images/java-logo.png" /> <span class="title-btn">Java</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="js" >
          <img src="/assets/images/js-logo.png" /> <span class="title-btn">Javascript</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="cpp" >
          <img src="/assets/images/cpp-logo.png" /> <span class="title-btn">C,C++</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="csharp" >
          <img src="/assets/images/csharp-logo.png" /> <span class="title-btn">C#</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="vb" >
          <img src="/assets/images/vb-logo.png" /> <span class="title-btn">VB.NET</span> 
      </div>
      <div class="social-medias round-btn opt-appbase" data-value="webapp" >
          <img src="/assets/images/web-logo.png" /> <span class="title-btn">Web App</span> 
      </div>
       <div class="social-medias round-btn opt-appbase" data-value="others" >
          <img src="/assets/images/others-logo.png" /> <span class="title-btn">Others</span> 
      </div>

    </div>
  </div>
 
  <div class="form-group row">
    <label for="jasa-pembuatanaplikasi-title"  class="col-4 col-form-label">Nama Aplikasi:</label> 
    <div class="col-8">
      <input id="jasa-pembuatanaplikasi-title" placeholder="ketik nama aplikasi untuk anda" name="title" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="jasa-pembuatanaplikasi-paket-hemat" type="radio" class="custom-control-input" value="hemat"> 
        <label for="jasa-pembuatanaplikasi-paket-hemat" class="custom-control-label">Hemat</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="jasa-pembuatanaplikasi-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-pembuatanaplikasi-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
    </div>
  </div> 


  <div class="form-group row">
    <label class="col-4">Catatan</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <textarea name="notes" rows="10" cols="30" placeholder="Tuliskan aplikasi tersebut tentang apa dan apa tujuan utamanya."></textarea>
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