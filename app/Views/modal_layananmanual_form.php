<div class="modal fade" id="layananmanual-form-modal" tabindex="-1">
  <form enctype="multipart/form-data" id="layananmanual-form" action="/add-new-layananmanual" method="post">
 <!-- hidden elemental used -->
  <input id="layananmanual-hidden-id" name="id" type="hidden" value="" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Layanan Manual Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label for="jenis_layanan" class="col-4 col-form-label">Jenis Layanan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-star"></i>
          </div>
        </div> 
        <select id="jenis_layanan" name="jenis_layanan" class="form-control">
          <option value="format-os-laptop">Format OS - Laptop</option>
          <option value="format-os-pc">Format OS - PC</option>
          <option value="ketik-dokumen-indonesia" >Ketik Dokumen - Indonesia</option>
          <option value="ketik-dokumen-inggris">Ketik Dokumen - Inggris</option>
          <option value="ketik-dokumen-terjemah">Ketik Dokumen - Terjemah</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="quantity" class="col-4 col-form-label">Quantity</label> 
    <div class="col-8">
      <input id="quantity" name="quantity" min="1" type="number" class="form-control">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="lampiran" class="col-4 col-form-label">Lampiran</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-file"></i>
          </div>
        </div> 
        <input id="lampiran" name="lampiran" type="file" class="form-control">
        <a id="link_lampiran" href="">Preview</a>
      </div>
    </div>
  </div>
 


  <!-- only for admin purposes -->
  <?php if($role == 'admin') : ?>
  <div class="form-group row">
    <label for="username_owned" class="col-4 col-form-label">Username Owned</label> 
    <div class="col-8">
      <div class="input-group">
        <select id="username_owned" name="username_owned" >
            <?php foreach ($data_users as $v): ?>
              <option data-id="<?= $v->id ?>" value="<?= $v->username ?>"><?= $v->username ?></option>
            <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div> 
<?php endif; ?>
  <!-- only for admin purposes -->

  <!-- for non-admin purposes such as client -->
  <?php if($role!='admin'): ?>
 <input name="user_id" type="hidden" id="layananmanual-hidden-user-id" value="<?= $user_id ?>" >
 <input name="username_owned" type="hidden" id="layananmanual-hidden-username-owned" value="<?= $username ?>" >
  <?php endif; ?>
  <!-- only for client purposes -->

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