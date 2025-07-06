<div class="modal fade" id="product-image-gallery-modal" tabindex="-1" aria-labelledby="product-image-gallery-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="product-image-gallery-modal-label">Product Image Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-start mb-3">
                    <button type="button" class="btn btn-primary btn-sm" data-id="" id="add-new-image-btn">
                        <i class="bi bi-plus-circle me-1"></i> Add New Image
                    </button>
                </div>

                <template id="image-card-template">
                    <div class="col position-relative product-image-item">
                        <button type="button" class="btn-close-image-overlay btn-close" aria-label="Delete image" data-image-id="">
                        </button>

                        <a href="#" data-lightbox="product-gallery" data-title="" class="open-full-screen-image-direct"> <img src="" class="img-fluid rounded" alt="Product Image" style="width: 100%; height: 150px; object-fit: cover;">
                        </a>
                        <div class="product-image-overlay d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-sm btn-info me-2 edit-image-btn"
                                data-image-id="" data-product-id="" title="Edit Image">
                                <i class="bi bi-pencil"></i>
                            </button>
                            </div>
                        <div class="image-info-overlay position-absolute w-100 p-1 text-white bg-dark bg-opacity-75" style="bottom: 0; left: 0; font-size: 0.8em;">
                        </div>
                    </div>
                </template>

                <div id="product-images-grid-content" class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-3">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>