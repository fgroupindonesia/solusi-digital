<div class="modal fade" id="format-os-form-modal" tabindex="-1">
  <form id="format-os-form" action="/add-new-format-os" method="post">
 <!-- hidden elemental used -->
  <input id="format-os-hidden-id" name="id" type="hidden" value="" class="form-control">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Format OS Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label for="format-os-model" class="col-4 col-form-label">Model PC/Laptop</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="format-os-model" required name="model" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="format-os-descriptions" class="col-4 col-form-label">Descriptions</label> 
    <div class="col-8">
      <input id="format-os-descriptions" required name="descriptions" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="format-os-delivery" class="col-4 col-form-label">Delivery</label> 
    <div class="col-8">
      <select id="format-os-delivery" name="delivery">
        <option value="none">-</option>
        <option value="pickup">Pickup Oleh Teknisi saja</option>
        <option value="drop">Antar Sendiri &amp; Drop Nanti</option>
        <option value="pickup-drop">Pickup &amp; Drop Oleh Teknisi</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="format-os-contact-person-type" class="col-4 col-form-label">Data Contact Person</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="contact_person_type" id="format-os-contact-person-type-self" type="radio" class="custom-control-input" value="self"> 
        <label for="format-os-contact-person-type-self" class="custom-control-label">Sendiri</label>
        <input name="contact_person_type" id="format-os-contact-person-type-other" type="radio" class="custom-control-input" value="other"> 
        <label for="format-os-contact-person-type-other" class="custom-control-label">Orang Lain</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="format-os-contact-person-name" class="col-4 col-form-label">Contact Person Name</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="format-os-contact-person-name" name="contact_person_name" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="format-os-contact-person-wa" class="col-4 col-form-label">Whatsapp</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="format-os-contact-person-wa" name="contact_person_wa" type="text" class="form-control">
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