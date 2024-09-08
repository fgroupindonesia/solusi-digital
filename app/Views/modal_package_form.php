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
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-mobile"></i>
          </div>
        </div> 
        <select id="order_type" name="order_type" type="text" class="form-control">
          
          <option value="virtualvisitors">Virtual Visitors</option>
          <option value="view">View</option>
          <option value="follow_marketplace">Follow Marketplace</option>
          <option value="wishlist_marketplace">Wishlist Marketplace</option>
          <option value="subscriber">Subscriber</option>
          <option value="rating">Rating</option>
          <option value="comment">Comment</option>
          <option value="pembuatanaplikasi">Pembuatan Aplikasi</option>
          <option value="upgrade_fituraplikasi">Upgrade Fitur Aplikasi</option>
          
        </select>
      </div>
    </div>
  </div>
 
 

      </div> <!-- this is end of modal-body -->
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
        <button type="button" class="btn btn-secondary btn-close-custom" data-bs-dismiss="modal" >Close</button>
        <input type="submit" class="btn btn-primary btn-save" value="Save changes">
      </div>
    </div>
  </div>
</form>
</div>