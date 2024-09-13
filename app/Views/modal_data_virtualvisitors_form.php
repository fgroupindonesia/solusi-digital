<div class="modal fade" id="data-virtualvisitors-form-modal" tabindex="-1">
  <form id="data-virtualvisitors-form" action="/add-new-data-virtualvisitors" method="post">
    <!-- data hidden for data-virtualvisitors-form is located here started -->
    <input id="virtualvisitors-hidden-id" name="id" type="hidden" value="" class="form-control">
    <input id="virtualvisitors-hidden-username" name="username" type="hidden" value="<?= $username; ?>" class="form-control">
    <!-- data hidden for data-virtualvisitors-form is located here done -->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Virtual Visitors Data Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  <div class="form-group row">
    <label for="client_name" class="col-4 col-form-label">Client Name</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="client_name" name="client_name" type="text" class="form-control">
      </div>
    </div>
  </div>

 <div class="form-group row">
    <label  class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">

        <input id="data_virtualvisitors_gender_male" name="gender" type="radio" value="lelaki" class="form-control">
        Lelaki<br>
        <input id="data_virtualvisitors_gender_female" name="gender" type="radio" value="perempuan" class="form-control">
        Perempuan<br>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="city" class="col-4 col-form-label">City</label> 
    <div class="col-8">
      <input id="city" name="city" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="product_bought" class="col-4 col-form-label">Product Bought</label> 
    <div class="col-8">
      <input id="product_bought" name="product_bought" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="product_url" class="col-4 col-form-label">URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-envelope"></i>
          </div>
        </div> 
        <input id="product_url" name="product_url" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="theme" class="col-4 col-form-label">Theme</label> 
    <div class="col-8">
      <div class="input-group">
        <select name="theme1">
          <option value="default">default</option>
          <option value="snowy">snowy</option>
          <option value="summer">summer</option>
          <option value="winter">winter</option>
          <option value="rainy">rainy</option>
          <option value="hotspring">hotspring</option>
        </select>
          <select name="theme2">
          <option value="none">no icon</option>
          <option value="gender">gender</option>
          <option value="arrow">arrow</option>
        </select>
        <input id="theme_display" name="theme_display" type="text" class="form-control">
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