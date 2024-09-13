<div class="modal fade" id="add-deposit-admin-form-modal" tabindex="-1">
  <form id="add-deposit-admin-form" action="/add-new-deposit" method="post">
 <!-- hidden elemental used -->
 <input type="hidden" id="add-deposit-admin-user-hidden-id" name="id" value="">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Deposit For User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->
<div class="form-group row">
    <label class="col-4">Username :</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
       
        <select id="add-deposit-admin-username" name="username">
          <?php if (count($data_users) > 0): ?>                 
          <?php foreach($data_users as $key): ?>
            <option value="<?= $key->username;?>"><?= $key->username;?></option>
          <?php endforeach; ?>
          <?php endif; ?>
        </select>


      </div>
    </div>
  </div>

 <div class="form-group row">
    <label class="col-4">Paket Pengisian</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-admin-50" type="radio" class="custom-control-input" value="50000"> 
        <label for="add-deposit-admin-50" class="custom-control-label">50rb</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-admin-100" type="radio" class="custom-control-input" value="100000"> 
        <label for="add-deposit-admin-100" class="custom-control-label">100rb</label>
      </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-admin-200" type="radio" class="custom-control-input" value="200000"> 
        <label for="add-deposit-admin-200" class="custom-control-label">200rb</label>
      </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-admin-500" type="radio" class="custom-control-input" value="500000"> 
        <label for="add-deposit-admin-500" class="custom-control-label">500rb</label>
      </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input name="amount" id="add-deposit-admin-1000" type="radio" class="custom-control-input" value="1000000"> 
        <label for="add-deposit-admin-1000" class="custom-control-label">1juta</label>
      </div>
    </div>
  </div> 

<div class="form-group row">
    <label class="col-4">Status :</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
       
        <select id="add-deposit-admin-status" name="status">
         
            <option value="pending">Pending</option>
            <option value="purchased">Purchased</option>
            <option value="cancel">Cancel</option>
         
        </select>


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