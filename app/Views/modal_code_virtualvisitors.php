<div class="modal fade" id="code-virtualvisitors-form-modal" tabindex="-1">
  <form id="code-virtualvisitors-form" action="/update-settings" method="post">
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Virtual Visitors Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label  class="col-form-label">1. Copy (CSS) link :</label> 
    <br>
    <textarea rows="3" cols="25"><link href="https://cdn.fgroupindonesia.com/virtualvisitors/css/theme-virtualvisitors.css" rel="stylesheet"></textarea>
         
  </div>
 
<div class="form-group row">
    <label >2. Pick an active campaign: 
      <div id="existing-campaign-code">
        <select >
          <?php if(!empty($data_campaign)): ?>
            <?php foreach($data_campaign as $datac): ?>
            <option value="<?= $datac->name ;?>"><?= $datac->name ;?></option>
          <?php endforeach; ?>
           <?php else : ?>
            <option value=''> </option>
            <?php endif; ?> 
      </select>
    </div>
      </label>
    <label  class="col-form-label">3. Copy (Javascript) link :</label> 

    <br>
    <textarea id="code-js-virtualvisitors" rows="3" cols="25"><script src="https://cdn.fgroupindonesia.com/virtualvisitors/js?id=12391"></script></textarea>
         
  </div>

<div class="form-group row">
  <span>And Paste them all before your &lt;&sol;body&gt; inside your Website </span>
</div>

<!-- this is end of form body -->

      </div> 
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
        <button type="button" class="btn btn-secondary btn-close-custom" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</form>
</div>