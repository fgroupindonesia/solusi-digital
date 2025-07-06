<div class="modal fade" id="ketik-dokumen-form-modal" tabindex="-1">
  <form id="ketik-dokumen-form" action="/order-new-ketik-document" method="post">
 <!-- hidden elemental used -->
  <input id="ketik-dokumen-hidden-id" name="id" type="hidden" value="" class="form-control">
  <input name="form_type" value="ketik_document" type="hidden">
  <input name="username" value="<?= $username; ?>" type="hidden">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ketik Document Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

  <div class="form-group row">
    <label for="ketik-dokumen-package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <select id="ketik-dokumen-package" name="package">
        <option value="none">-</option>
        <?php if(!empty($data_packages)) : ?>
          <?php foreach($data_packages as $dpack):?>
              <?php if($dpack->order_type == 'ketik_document') : ?>
                <option name="package" data-harga="<?= $dpack->total_price;?>" value="<?= $dpack->name ?>"> <?= $dpack->name; ?></option>
              <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
  </div>

   <div class="form-group row">
    <label for="ketik-dokumen-price" class="col-4 col-form-label">Harga :</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="ketik-dokumen-price" readonly type="text" class="form-control">
      </div>
    </div>
  </div>

 <div class="form-group row">
    <label for="ketik-dokumen-name" class="col-4 col-form-label">Nama Document</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="ketik-dokumen-name" required name="document_name" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="ketik-dokumen-total-pages" class="col-4 col-form-label">Total Pages</label> 
    <div class="col-8">
      <input id="ketik-dokumen-total-pages" required name="total_pages" type="number" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="ketik-dokumen-date-limit" class="col-4 col-form-label">Date Limit</label> 
    <div class="col-8">
      <input id="ketik-dokumen-date-limit" required name="date_limit" type="date" class="form-control">
    </div>
  </div>
 
  <div class="form-group row">
    <label for="ketik-dokumen-descriptions" class="col-4 col-form-label">Descriptions</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="ketik-dokumen-descriptions" name="descriptions" type="text" class="form-control">
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