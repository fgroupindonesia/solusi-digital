<div class="modal fade" id="wa-chat-rotator-modal" tabindex="-1">
    <form id="wa-chat-rotator-form" action="/order-new-wa-chat-rotator" method="post">
 <!-- hidden elemental used -->
  <input id="wa-chat-rotator-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
  <input id="wa-chat-rotator-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">WA Chat Rotator</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
 <div class="form-group row">
    <label class="col-4">Paket</label> 
    <div class="col-8">
      
    <?php if($total_packages !=0 ): ?>
      <?php foreach($data_packages as $data_p): ?>
      <div class="custom-control custom-radio custom-control-inline">
        <?php if($data_p->order_type== 'wa_chat_rotator'): ?>
        <input required name="package" data-harga="<?= $data_p->total_price; ?>" data-paket="<?= $data_p->name; ?>" id="wa-chat-rotator-paket-<?= $data_p->name; ?>" type="radio" class="wa-rotator-paket custom-control-input" value="<?= $data_p->name; ?>"> 
        <label for="wa-chat-rotator-paket-<?= $data_p->name; ?>" class="custom-control-label"><?= $data_p->name; ?></label>
        <?php endif;?>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>

      <!-- this is sample item layout 
      <div class="custom-control custom-radio custom-control-inline">
        <input name="package" id="wa-chat-rotator-paket-bisnis" type="radio" class="custom-control-input" value="bisnis"> 
        <label for="wa-chat-rotator-paket-bisnis" class="custom-control-label">Bisnis</label>
      </div>
      end of sample item layout -->

    </div>
  </div> 

<div class="form-group row">
    <label  class="col-4 col-form-label">Keterangan:</label> 
    <div class="col-8">
       <p class="warning-text"> Pilihan paket ini disesuaikan dengan kebutuhan anda: <br/>
        <div id="deskripsi-gratis">
          <h4>Harga : <span id="harga-paket-gratis"></span> </h4>
            <ul class="tersedia">
              <li>Bisa dipasang di 1 website</li>
              <li>Mode Rotator Acak / Terurut</li>
              <li>1 Tim CS untuk max 2 nomor WA</li>
              <li>Setelah Daftar langsung pakai</li>
            </ul>
            <ul class="coret">
              <li>Fitur Tambahan</li>
              <li>Support Teknis</li>
            <ul>
        </div>

        <div id="deskripsi-bisnis">
          <h4>Harga : <span id="harga-paket-bisnis"></span> </h4>
            <ul class="tersedia">
              <li>Semua Fitur Gratis Plus</li>
              <li>Bisa dipasang di 3 website</li>
              <li>Mode Rotator Acak / Terurut / Jadwal Jam</li>
              <li>1 Tim CS untuk max 20 nomor WA</li>
              <li>Support Teknis gratis</li>
            </ul>
            <ul class="coret">
              <li>Fitur Khusus</li>
            <ul>
        </div>

          <div id="deskripsi-developer">
            <h4>Harga : <span id="harga-paket-developer"></span> </h4>
            <ul class="tersedia">
              <li>Semua Fitur Bisnis Plus</li>
              <li>Bisa dipasang di unlimited website</li>
              <li>Mode Rotator + Kategori Perangkat / Wilayah</li>
               <li>1 Tim CS untuk max 100 nomor WA</li>
              <li>Support Teknis gratis + Bantuan setup</li>
              <li>Fitur Khusus</li>
            </ul>
            
        </div>

          <div id="deskripsi-vip">
            <h4>Harga : <span id="harga-paket-vip"></span> </h4>
            <ul class="tersedia">
              <li>Semua Fitur Developer Plus</li>
              <li>Mode Rotator + Integrasi Sync Perangkat</li>
              <li>Tracking Data Form</li>
              <li>Self Hosted</li>
              <li>Fitur Extra Khusus</li>
            </ul>
            
        </div>


       </p>
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