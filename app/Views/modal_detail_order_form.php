<div class="modal fade" id="detail-order-form-modal" tabindex="-1">
  <form id="detail-order-form" action="/update-settings" method="post">
 <!-- hidden elemental used -->
  <input id="detail-order-hidden-id" name="id" type="hidden" class="form-control">
  <input id="detail-order-hidden-username" name="username" type="hidden"  class="form-control">
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

  <section id="detail-order-comment">
    <h3>Comment</h3>
     <!-- single part started -->
   

    <div class="form-group row">
    <label for="detail-order-comment-title" class="col-4 col-form-label">Title</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-comment-title" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-comment-url" class="col-4 col-form-label">URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-comment-url" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-comment-social-media" class="col-4 col-form-label">Social Media</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-comment-social-media" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-comment-package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-comment-package" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-comment-notes" class="col-4 col-form-label">Notes</label> 
    <div class="col-8">
      <div class="input-group">
       
         <input readonly id="detail-order-comment-notes" type="text" class="form-control">
       
      </div>
    </div>
  </div>

  <!-- single part ended -->

  </section>
   
   
  
  <section id="detail-order-follow-marketplace">
    <h3>Follow Market Place</h3>

<!-- single part started -->
   
  <div class="form-group row">
    <label for="detail-order-follow-marketplace-shop-name" class="col-4 col-form-label">Shop Name</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-follow-marketplace-shop-name" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-follow-marketplace-url" class="col-4 col-form-label">URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-follow-marketplace-url" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-follow-marketplace-marketplace" class="col-4 col-form-label">Marketplace</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-follow-marketplace-marketplace" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-follow-marketplace-package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-follow-marketplace-package" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-follow-marketplace-gender" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-follow-marketplace-gender" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-follow-marketplace-notes" class="col-4 col-form-label">Notes</label> 
    <div class="col-8">
      <div class="input-group">
       
         <input readonly id="detail-order-follow-marketplace-notes" type="text" class="form-control">
       
      </div>
    </div>
  </div>


  <!-- single part ended -->


  </section>

  <section id="detail-order-rating">
    <h3>Rating Gmaps</h3>

<!-- single part started -->
   
  <div class="form-group row">
    <label for="detail-order-rating-business-name" class="col-4 col-form-label">Business Name</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-rating-business-name" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-rating-url" class="col-4 col-form-label">URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-rating-url" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-rating-social-media" class="col-4 col-form-label">Social Media</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-rating-social-media" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-rating-package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-rating-package" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-rating-gender" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-rating-gender" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-rating-notes" class="col-4 col-form-label">Notes</label> 
    <div class="col-8">
      <div class="input-group">
       
         <input readonly id="detail-order-rating-notes" type="text" class="form-control">
       
      </div>
    </div>
  </div>


  <!-- single part ended -->

  </section>

  <section id="detail-order-subscriber">
    <h3>Subscriber</h3>

  <!-- single part started -->
   <div class="form-group row">
    <label for="detail-order-subscriber-account-name" class="col-4 col-form-label">Account Name</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-subscriber-account-name" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-subscriber-url" class="col-4 col-form-label">URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-subscriber-url" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-subscriber-social-media" class="col-4 col-form-label">Social Media</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-subscriber-social-media" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-subscriber-package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-subscriber-package" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-subscriber-gender" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
       
         <input readonly id="detail-order-subscriber-gender" type="text" class="form-control">
       
      </div>
    </div>
  </div>

  <!-- single part ended -->

  </section>

  <section id="detail-order-view">
    <h3>View Content</h3>

 <!-- single part started -->
   
    <div class="form-group row">
    <label for="detail-order-view-title" class="col-4 col-form-label">Title</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-view-title" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-view-url" class="col-4 col-form-label">URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-view-url" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-view-social-media" class="col-4 col-form-label">Social Media</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-view-social-media" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-view-package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-view-package" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-view-gender" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-view-gender" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-view-question" class="col-4 col-form-label">Question</label> 
    <div class="col-8">
      <div class="input-group">
       
         <input readonly id="detail-order-view-question" type="text" class="form-control">
       
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-view-valid-answer" class="col-4 col-form-label">Valid Answer</label> 
    <div class="col-8">
      <div class="input-group">
       
         <input readonly id="detail-order-view-valid-answer" type="text" class="form-control">
       
      </div>
    </div>
  </div>

  <!-- single part ended -->

  </section>

  <section id="detail-order-wishlist-marketplace">
    <h3>Wishlist Market Place</h3>

<!-- single part started -->
   
  <div class="form-group row">
    <label for="detail-order-wishlist-marketplace-shop-name" class="col-4 col-form-label">Shop Name</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-wishlist-marketplace-shop-name" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-wishlist-marketplace-url" class="col-4 col-form-label">URL</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-wishlist-marketplace-url" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-wishlist-marketplace-marketplace" class="col-4 col-form-label">Marketplace</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-wishlist-marketplace-marketplace" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-wishlist-marketplace-package" class="col-4 col-form-label">Package</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-wishlist-marketplace-package" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="detail-order-wishlist-marketplace-gender" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i ></i>
          </div>
        </div> 
        <input readonly id="detail-order-wishlist-marketplace-gender" type="text" class="form-control">
      </div>
    </div>
  </div>

   <div class="form-group row">
    <label for="detail-order-wishlist-marketplace-notes" class="col-4 col-form-label">Notes</label> 
    <div class="col-8">
      <div class="input-group">
       
         <input readonly id="detail-order-wishlist-marketplace-notes" type="text" class="form-control">
       
      </div>
    </div>
  </div>


  <!-- single part ended -->


  </section>

<!-- this is end of form body -->

      </div> 
      <div class="modal-footer">
         <img class="modal-loading" src="/assets/plugins/images/loading.gif" >
       
      </div>
    </div>
  </div>
</form>
</div>