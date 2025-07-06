<div class="modal fade" id="add-deposit-form-modal" tabindex="-1">
  <form id="add-deposit-form" action="/add-new-deposit" method="post">
 <!-- hidden elemental used -->
  <input id="add-deposit-hidden-id" name="id" type="hidden" value="<?= $user_id ?>" class="form-control">
  <input id="add-deposit-hidden-username" name="username" type="hidden" value="<?= $username ?>" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Deposit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

<section id="deposit-option">
  <div class="form-group row">
    <label class="col-12 col-md-4 col-form-label">Paket Pengisian</label> 
    <div class="col-12 col-md-8">
      <div class="d-flex flex-wrap">
        <div class="custom-control custom-radio custom-control-inline mr-3">
          <input name="amount" id="add-deposit-50" type="radio" class="custom-control-input" value="50000"> 
          <label for="add-deposit-50" class="custom-control-label">50rb</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline mr-3">
          <input name="amount" id="add-deposit-100" type="radio" class="custom-control-input" value="100000"> 
          <label for="add-deposit-100" class="custom-control-label">100rb</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline mr-3">
          <input name="amount" id="add-deposit-200" type="radio" class="custom-control-input" value="200000"> 
          <label for="add-deposit-200" class="custom-control-label">200rb</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline mr-3">
          <input name="amount" id="add-deposit-500" type="radio" class="custom-control-input" value="500000"> 
          <label for="add-deposit-500" class="custom-control-label">500rb</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input name="amount" id="add-deposit-1000" type="radio" class="custom-control-input" value="1000000"> 
          <label for="add-deposit-1000" class="custom-control-label">1juta</label>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- this is end of form body -->
<section id="payment-method">
    <h5>Catatan :</h5>
    <label for="payment-method" class="custom-control-label">Pembayaran via (salah satu) : Bank Transfer/Go Pay/ShopeePay </label>
    <label for="payment-method" class="custom-control-label">Screenshot bukti pembayaran ke whatsapp admin untuk diproses lebih lanjut.</label>
    <iframe id="payment-method-doc" src="<?= base_url(); ?>assets/docs/payment_method_all.pdf" width="100%" height="100%">

    </iframe>
</section>


      </div> 
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
       
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
</form>
</div>