<div class="modal fade" id="detail-order-form-modal" tabindex="-1">
  <form id="detail-order-form" action="/update-settings" method="post">
 <!-- hidden elemental used -->
  <input id="detail-order-hidden-id" name="id" type="hidden" class="form-control">
  <input id="detail-order-hidden-username" name="username" type="hidden"  class="form-control">
  <input id="detail-order-hidden-order-type" name="order-type" type="hidden" class="form-control">
  
 <!-- hidden elemental used -->

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<!-- the form body started from here -->

 <div class="form-group row">
    <label for="detail-order-username" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-user"></i>
          </div>
        </div> 
        <input readonly id="detail-order-username" name="username" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-date-created" class="col-4 col-form-label">Date Created</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-calendar"></i>
          </div>
        </div> 
        <input readonly id="detail-order-date-created" name="date_created" type="text" class="form-control">
      </div>
    </div>
  </div>

<?php include('inner_modal_detail_order_ketik_document.php'); ?>
<?php include('inner_modal_detail_order_format_os.php'); ?>
<?php include('inner_modal_detail_order_pembuatanaplikasi.php'); ?>
<?php include('inner_modal_detail_order_upgrade_fituraplikasi.php'); ?>
<?php include('inner_modal_detail_order_virtualvisitors.php'); ?>
<?php include('inner_modal_detail_order_comment.php'); ?>
<?php include('inner_modal_detail_order_follow_marketplace.php'); ?>
<?php include('inner_modal_detail_order_wishlist_marketplace.php'); ?>
<?php include('inner_modal_detail_order_rating.php'); ?>
<?php include('inner_modal_detail_order_subscriber.php'); ?>
<?php include('inner_modal_detail_order_view.php'); ?>
<?php include('inner_modal_detail_order_uploadaplikasi.php'); ?>
<?php include('inner_modal_detail_order_wa_chat_rotator.php'); ?>
<?php include('inner_modal_detail_order_landingpage.php'); ?>
  

   <?php if($role == 'admin'): ?> 
<section id="detail-order-admin" class="my-4">
  <div class="d-flex justify-content-end gap-3">
    <button type="button" id="btn-end-result-show" class="btn btn-primary">
      End Result
    </button>
    <button type="button" id="btn-revisions-show" class="btn btn-warning">
      Revision
    </button>
  </div>
</section>
  <?php endif; ?>



<!-- this is end of form body -->

      </div> 
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
       
      </div>
    </div>
  </div>
</form>
</div>