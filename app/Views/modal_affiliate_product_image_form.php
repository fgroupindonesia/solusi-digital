<div class="modal fade" id="product-image-modal" tabindex="-1" aria-labelledby="product-image-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="product-image-modal-label">Manage Product Images</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="product-image-form" enctype="multipart/form-data">
          <input type="hidden" id="product-image-product-id" name="product_id">
          <input type="hidden" id="product-image-id" name="id">


          <div class="mb-3">
            <label for="product-image-file" class="form-label">Upload Image File</label>
            <input class="form-control" type="file" id="product-image-file" name="image_file" accept="image/*">
          </div>

          <div class="mb-3">
            <label for="product-image-title" class="form-label">Image Title (Optional)</label>
            <input type="text" class="form-control" id="product-image-title" name="image_title" placeholder="e.g., Front View">
          </div>

          <div class="mb-3">
            <label for="product-image-description" class="form-label">Image Description (Optional)</label>
            <textarea class="form-control" id="product-image-description" name="image_description" rows="3" placeholder="A brief description of the image"></textarea>
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="product-image-is-thumbnail" value="1" name="is_thumbnail">
            <label class="form-check-label" for="product-image-is-thumbnail">Set as Thumbnail</label>
            <small class="form-text text-muted">Check this if this image should be the main thumbnail for the product.</small>
          </div>

          <hr>

          <h5>Existing Images:</h5>
          <div id="product-images-container" class="row row-cols-1 row-cols-md-3 g-4">
            <p id="product-no-images-message">No images found for this product.</p>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <img class="modal-loading" src="/assets/plugins/images/loading.gif" alt="Loading..." style="height: 25px;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="product-image-form" class="btn btn-primary" id="save-image-button">Save Image</button>
      </div>
    </div>
  </div>
</div>