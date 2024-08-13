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


 <div class="form-group row">
    <label class="col-4">Paket Pengisian</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-50" type="radio" class="custom-control-input" value="50"> 
        <label for="add-deposit-50" class="custom-control-label">50rb</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-100" type="radio" class="custom-control-input" value="100"> 
        <label for="add-deposit-100" class="custom-control-label">100rb</label>
      </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-200" type="radio" class="custom-control-input" value="200"> 
        <label for="add-deposit-200" class="custom-control-label">200rb</label>
      </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-500" type="radio" class="custom-control-input" value="500"> 
        <label for="add-deposit-500" class="custom-control-label">500rb</label>
      </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-1000" type="radio" class="custom-control-input" value="1000"> 
        <label for="add-deposit-1000" class="custom-control-label">1juta</label>
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