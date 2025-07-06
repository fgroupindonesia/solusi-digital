<div class="modal fade" id="product-affiliate-form-modal" tabindex="-1">
  <form id="product-affiliate-form" action="/add-new-affiliate-product" method="post">
    <input id="product-affiliate-hidden-id" name="id" type="hidden" value="<?= $product_id ?? '' ?>" class="form-control">

    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Product Affiliate Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="row mb-3">
            <label for="product-name" class="col-sm-4 col-form-label">Product Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="product-name" name="name" value="<?= $product_name ?? '' ?>">
            </div>
          </div>

          <div class="row mb-3">
            <label for="product-category" class="col-sm-4 col-form-label">Category</label>
            <div class="col-sm-8">
              <select class="form-select" id="product-category" name="category">
                <option value="">Select a Category</option>
                <?php if(isset($data_product_categories)) : ?>
                  <?php foreach($data_product_categories as $data_pc): ?>
                    <option value="<?= htmlspecialchars($data_pc->name); ?>"
                      <?= (isset($product_category) && $product_category == $data_pc->name) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($data_pc->name); ?>
                    </option>
                  <?php endforeach; ?>
                <?php endif; ?>
                <option value="add_new_category">-- Add New Category --</option>
              </select>
              <div id="new-category-input-group" class="input-group mt-2" style="display: none;">
                <input type="text" class="form-control" id="new-category-name" placeholder="Enter new category name">
                <button class="btn btn-primary" type="button" id="add-category-btn">Add</button>
              </div>
              <small id="new-category-error" class="text-danger" style="display: none;">Category name cannot be empty.</small>
            </div>
          </div>

          <div class="row mb-3">
            <label for="product-description" class="col-sm-4 col-form-label">Description</label>
            <div class="col-sm-8">
              <textarea class="form-control" id="product-description" name="description" rows="3"><?= $product_description ?? '' ?></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label for="product-base-price" class="col-sm-4 col-form-label">Base Price</label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" step="0.01" class="form-control" id="product-base-price" name="base_price" value="<?= $base_price ?? '' ?>">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8 d-flex align-items-center gap-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="product-status-active" value="active" <?= (isset($product_status) && $product_status == 'active') ? 'checked' : '' ?>>
                <label class="form-check-label" for="product-status-active">Active</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="product-status-inactive" value="inactive" <?= (isset($product_status) && $product_status == 'inactive') ? 'checked' : '' ?>>
                <label class="form-check-label" for="product-status-inactive">Inactive</label>
              </div>
            </div>
          </div>

          <?php if (isset($role) && $role == 'admin'): ?>
            <hr>
            <div class="row mb-3">
              <label for="admin-commission" class="col-sm-4 col-form-label">Admin Commission (%)</label>
              <div class="col-sm-8">
                <div class="input-group">
                  <input type="number" step="0.5" class="form-control" id="admin-commission" name="admin_commission" value="<?= $admin_commission ?? '' ?>">
                  <span class="input-group-text">%</span>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>

        <div class="modal-footer">
          <img class="modal-loading" src="/assets/plugins/images/loading.gif" alt="Loading..." style="height: 25px;">
          <input type="submit" class="btn btn-save btn-primary" value="Save Product">
        </div>
      </div>
    </div>
  </form>
</div>