<div class="modal fade" id="user-form-modal" tabindex="-1">
  <form id="user-form" action="/add-new-user" method="post">
    <input id="user-hidden-id" name="id" type="hidden" value="" class="form-control">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
  <div class="form-group row">
    <label for="username" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="username" name="username" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="pass" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="pass" name="pass" type="password" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="occupation" class="col-4 col-form-label">Occupation</label> 
    <div class="col-8">
      <input id="occupation" name="occupation" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-envelope"></i>
          </div>
        </div> 
        <input id="email" name="email" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="whatsapp" class="col-4 col-form-label">Whatsapp</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-mobile"></i>
          </div>
        </div> 
        <input id="whatsapp" name="whatsapp" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Sex</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="sex" id="user_sex_male" type="radio" class="custom-control-input" value="male"> 
        <label for="user_sex_male" class="custom-control-label">male</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="sex" id="user_sex_female" type="radio" class="custom-control-input" value="female"> 
        <label for="user_sex_female" class="custom-control-label">female</label>
      </div>
    </div>
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