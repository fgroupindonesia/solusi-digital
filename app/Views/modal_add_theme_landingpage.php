<div class="modal fade" id="theme-landingpage-form-modal" tabindex="-1">
  <form id="theme-landingpage-form" action="/add-new-theme-landingpage" method="post">

 <!-- hidden elemental used -->
  <input id="theme-landingpage-hidden-id" name="id" type="hidden" value="" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Theme Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label for="theme_name" class="col-4 col-form-label">Theme Name</label> 
    <div class="col-8">
      <div class="input-group">
         
        <input id="theme_name" name="name" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-4 col-form-label">Descriptions</label> 
    <div class="col-8">
      <input id="description" name="description" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="file_preview" class="col-4 col-form-label">Preview (png/jpg)</label> 
    <div class="col-8">
      <input id="file_preview" name="file_preview" type="file" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="genre" class="col-4 col-form-label">Genre</label> 
    <div class="col-8">
      <div class="input-group">
       
        <select id="genre" name="genre" class="form-control">
          <option value="free">Free</option>
          <option value="premium">Premium</option>
        </select>
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