<div class="modal fade" id="jasa-view-form-modal" tabindex="-1">
  <form id="jasa-view-form" action="/update-settings" method="post">
 <!-- hidden elemental used -->
  <input id="jasa-view-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Jasa View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label for="jasa-view-sosial-media" class="col-4 col-form-label">Keterangan:</label> 
    <div class="col-8">
       <p class="warning-text"> Advertiser akan memberikan pertanyaan yang ada hubungannya dengan video atau halaman website yang akan dilihat oleh para viewers. Kemudian berikanlah pertanyaan yang sulit untuk dijawab bagi para viewers tersebut. Tujuannya agar para viewers bertahan lama melihat konten videonya. <br/>
       <strong>Contoh : 'berapa dosis obat dalam video tersebut?'</strong> dst... </p>
    </div>
  </div>
 <div class="form-group row">
    <label for="jasa-view-url" class="col-4 col-form-label">Url Video:</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-globe"></i>
          </div>
        </div> 
        <input id="jasa-view-url" name="url" placeholder="contoh : http://www.facebook.com/v/v1238" value="" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jasa-view-videokonten"  class="col-4 col-form-label">Judul Video/Konten:</label> 
    <div class="col-8">
      <input id="jasa-view-videokonten" placeholder="ketik judul video konten anda" name="videokonten" type="text" value="" class="form-control">
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="paket" id="jasa-view-paket-hemat" type="radio" class="custom-control-input" value="hemat"> 
        <label for="jasa-view-paket-hemat" class="custom-control-label">Hemat</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="paket" id="jasa-view-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="jasa-view-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label for="jasa-view-gender-member" class="col-4 col-form-label">Gender:</label> 
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
    <label class="col-4">Pertanyaan:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <textarea rows="4" cols="30" placeholder="Tuliskan pertanyaan disini."></textarea>
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label class="col-4">Opsi Jawaban A:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="text" placeholder="contoh : Jojon" >
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label class="col-4">Opsi Jawaban B:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="text" placeholder="contoh : Neni" >
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label class="col-4">Opsi Jawaban C:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="text" placeholder="contoh : Roni" >
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label class="col-4">Opsi Jawaban D:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="text" placeholder="contoh : Buyung" >
      </div>
    </div>
  </div> 

  <div class="form-group row">
    <label class="col-4">Jawaban Yang Benar:</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jawaban-benar" id="jasa-view-jawaban-a" type="radio" class="custom-control-input" value="a"> 
        <label for="jasa-view-jawaban-a" class="custom-control-label">A</label>
        <input name="jawaban-benar" id="jasa-view-jawaban-b" type="radio" class="custom-control-input" value="b"> 
        <label for="jasa-view-jawaban-b" class="custom-control-label">B</label>
        <input name="jawaban-benar" id="jasa-view-jawaban-c" type="radio" class="custom-control-input" value="c"> 
        <label for="jasa-view-jawaban-c" class="custom-control-label">C</label>
        <input name="jawaban-benar" id="jasa-view-jawaban-d" type="radio" class="custom-control-input" value="d"> 
        <label for="jasa-view-jawaban-d" class="custom-control-label">D</label>
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