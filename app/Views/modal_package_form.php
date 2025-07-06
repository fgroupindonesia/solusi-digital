<div class="modal fade" id="package-form-modal" tabindex="-1">
  <form id="package-form" action="/add-new-package" method="post">
    <input id="user-hidden-id" name="id" type="hidden" value="" class="form-control">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Package Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Name</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="name" name="name" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="quota_package" class="col-4 col-form-label">Quota</label> 
    <div class="col-8">
      <input id="quota_package" name="quota" type="number" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="base_price_package" class="col-4 col-form-label">Base Price</label> 
    <div class="col-8">
      <input id="base_price_package" name="base_price" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="total_price_package" class="col-4 col-form-label">Total Price</label> 
    <div class="col-8">
      <div class="input-group">
         
        <input id="total_price_package" name="total_price" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="order_type" class="col-4 col-form-label">Order Type
    </label> 
    <div class="col-8">
      <div class="input-group">
       <div class="input-group-text">
            <i class="fa fa-mobile"></i>
          </div>
       <select id="order_type" name="order_type" class="form-control">
          <?php if(!empty($data_order_types)): ?>
            <?php foreach($data_order_types as $dot): ?>
              <option value="<?=$dot->slug_name;?>"><?= ucwords($dot->name);?></option>
            <?php endforeach; ?>
          <?php endif; ?>
         
          <option value="add_new">-- Add New Item --</option>
        </select>

        
        
      </div>
    </div>
  </div>
 
  <div id="add-new-order-type-container" style="display:none; margin-top: 10px;">
        <input type="text" id="new-order-type" class="form-control" placeholder="Enter new order type">
        <button type="button" id="btn-add-new-order-type" class="btn btn-success mt-2">Update</button>
      </div>

 

      </div> <!-- this is end of modal-body -->
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
       
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
</form>
</div>