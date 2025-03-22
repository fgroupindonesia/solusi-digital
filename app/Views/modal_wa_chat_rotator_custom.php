<div class="modal fade" id="wa-chat-rotator-custom-modal" tabindex="-1">
  <form id="wa-chat-rotator-custom-form" action="/update-wa-chat-rotator" method="post">
    <input id="wa-chat-rotator-custom-user-hidden-id" name="id" type="hidden" value="" class="form-control">

    <input id="wa-chat-rotator-custom-package" type="hidden" >

  <div class="modal-dialog">
    <div class="modal-content modal-wide">
      <div class="modal-header">
        <h5 class="modal-title">WA Chat Rotator</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
 <div class="row">
<div class="col-lg-4">
   <div class="form-group">
                <label for="rotator_mode">Rotator Mode</label>
                <select id="rotator_mode" name="rotator_mode" class="form-control custom-select">
                  <option selected="" disabled="">Pilih Satu</option>
                  <option value="random">random</option>
                  <option value="order">order</option>
                  <option value="schedule">schedule</option>
                  <option value="origin">origin</option>
                  <option value="device">device</option>
                  
                </select>
              </div>

              <div class="form-group">
                <label for="identifier_mode">Identifier Mode</label>
                <select id="identifier_mode" name="identifier_mode" class="form-control custom-select">
                  <option selected="" disabled="">Pilih Satu</option>
                  <option value="manual">manual</option>
                  <option value="button contains">button contains</option>
                  <option value="link contains">link contains</option>
                  <option value="all buttons">all buttons</option>
                  <option value="all links">all links</option>
                </select>
                 <input type="text" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="tulis disini identifier penghubung klik wa di website mu" placeholder="tulis tag disini" id="identifier_tag" name="identifier_tag" class="form-control" >

              </div>
</div>

  <div class="col-lg-8">
          <div class="card card-primary">
           
            <div class="card-body" style="display: block;">
              <div class="form-group">
                <label for="inputName">Nama Tema</label>
                <input type="text" id="custom_name" name="custom_name" class="form-control">
              </div>
              
             

                <div class="form-group">
               
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Messages: </span></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
             
              <div   class="form-group">
                <label for="message" id="label_message" >Format Text:</label>
                <textarea id="message"  name="message" class="message form-control">
                </textarea>
              </div>
            
            </div>
            <!-- /.card-body -->
          </div>

              </div>

              <div class="form-group">
               
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tim CS: </span></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
             
              <div  id="nomor_wa_cs" class="form-group">
                
              </div>
            
            </div>
            <!-- /.card-body -->
          </div>

              </div>

              <div class="form-group">
                

              <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Website: </span></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
             
              <div id="web_url" class="form-group">
                
              </div>
            
            </div>
            <!-- /.card-body -->
          </div>  

              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
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