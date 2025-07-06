<!DOCTYPE html>
<html lang="en">

<head>

<?php include('header.php'); ?>

</head>

<body>

<!-- preloader -->
<div id="preloader">
    <div class="spinner spinner-round"></div>
</div>
<!-- / preloader -->

<!-- header -->
<header>
    
    <?php include('nav-head.php'); ?>

</header>
<!-- / header -->

<!-- content -->

<!-- shop single-product -->
<section id="shop">
    <div class="container">
        <div class="row">

            <!-- product content area -->
            <div class="col-sm-6 col-md-7 content-area">
                <div class="product-content-area">
                    <div id="product-slider" class="carousel slide" data-ride="carousel">
                        <!-- wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?=base_url();?>/assets/affiliate/images/product-slide1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?=base_url();?>/assets/affiliate/images/product-slide2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?=base_url();?>/assets/affiliate/images/product-slide3.jpg" alt="">
                            </div>
                        </div>
                        <!-- / wrapper for slides -->

                        <!-- controls -->
                        <a class="left carousel-control" href="#product-slider" role="button" data-slide="prev">
                            <span class="lnr lnr-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#product-slider" role="button" data-slide="next">
                            <span class="lnr lnr-chevron-right" aria-hidden="true"></span>
                        </a>
                        <!-- / controls -->
                    </div><!-- / product-slider -->

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a class="other-tab" href="#description" role="tab" data-toggle="tab" aria-expanded="true">Description</a></li>
                        <li class=""><a class="other-tab" href="#info" role="tab" data-toggle="tab" aria-expanded="false">Product Info</a></li>
                        <li class=""><a id="link-tab-review-shops" href="#reviews" role="tab" data-toggle="tab" aria-expanded="false">Reviews (<?= ($data_rating) ? count($data_rating) : 0; ?>)</a></li>
                    </ul>
                    <!-- / nav-tabs -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane animated fadeIn active" id="description">
                            <p><?= $data_product->description ?? ''; ?></p>
                        </div>
                        <!-- / description-tab -->

                        <div role="tabpanel" class="tab-pane animated fadeIn" id="info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Sizes:</th>
                                                <td>Small, Medium, Large</td>
                                            </tr>
                                            <tr>
                                                <th>Colors:</th>
                                                <td>Grey, Black, Blue</td>
                                            </tr>
                                            <tr>
                                                <th>Fabric:</th>
                                                <td>100% Cotton</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Weight:</th>
                                                <td>0.34 Kg</td>
                                            </tr>
                                            <tr>
                                                <th>Made In:</th>
                                                <td>USA</td>
                                            </tr>
                                            <tr>
                                                <th>More Info:</th>
                                                <td>Fusce ipsum felis.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- / row -->
                        </div>
                        <!-- / info-tab -->

                        <div role="tabpanel" class="tab-pane animated fadeIn" id="reviews">
                            <div class="reviews">
                                <?php if(!empty($data_rating)) : ?>
                                <?php foreach($data_rating as $dr): ?>
                                <div class="review-author pull-left">
                                  <img src="<?=base_url();?>/assets/affiliate/images/author1.jpg" alt="">
                                </div>
                                <div class="review-content">
                                    <h4 class="review-title no-margin"><?= $dr->username; ?></h4>
                                    <div class="review-stars">
                                        <span class="product-rating">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        </span>
                                    </div><!-- / review-stars -->
                                    <p><?= $dr->comment; ?></p>
                                    <cite> - <?= $dr->date_created; ?></cite>
                                </div><!-- / review-content -->

                                <div class="space-25">&nbsp;</div>

                            <?php endforeach; ?>
                            <?php endif; ?>

                             
                            </div><!-- / reviews -->
                        </div>
                        <!-- / reviews-tab -->
                    </div>
                    <!-- / tab-content -->
                </div><!-- / product-content-area -->

                <!-- add review -->
               <div id="add-review" style="display: none;" class="space-top-30">
                    <h4>Tinggalkan Rating &amp; Komentar</h4>

                    <!-- Hidden inputs for backend data -->
                    <input type="hidden" id="product_id" value="<?= $data_product->product_id; ?>"> <!-- Replace with actual -->
                    <input type="hidden" id="user_id" value="<?= $user_id ?? '' ; ?>">    <!-- Replace with actual -->

                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div id="star-rating">
                                <span class="fa fa-star" data-value="1"></span>
                                <span class="fa fa-star" data-value="2"></span>
                                <span class="fa fa-star" data-value="3"></span>
                                <span class="fa fa-star" data-value="4"></span>
                                <span class="fa fa-star" data-value="5"></span>
                            </div>
                            <input type="hidden" id="rating" value="0">
                        </div>

                        <div class="col-sm-12 mb-3">
                            <textarea id="review" rows="5" class="form-control" placeholder="*Write your review..." required></textarea>
                        </div>

                        <div class="col-sm-12">
                            <button type="button" id="submit-review" class="btn btn-primary">Submit Review</button>
                        </div>
                    </div>
                </div>
                <!-- / add review -->

                   

            </div>
            <!-- / project-content-area -->

            <!-- project sidebar area -->
            <div class="col-sm-6 col-md-5 product-sidebar">
                <div class="product-details">
                    <h4><?= $data_product->name ?? ''; ?></h4>
                    <p><?= $data_product->short_info ?? '' ; ?></p>
                    <h4 class="space-top-30">Product Info</h4>
                    <div class="product-info">
                        <div class="info">
                            <p><i class="lnr lnr-tag"></i><span>Price: Rp.<?= $data_product->base_price ?? ''; ?></span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-heart"></i><span>Category: <a href="#"> <?= $data_product->category_name ?? '' ;?></a></span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-menu"></i><span>SKU: 3872473225</span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-star"></i><span>Ratings: 
                                <?php if(!empty($rating_overall)): ?>
                                <?php for($i=1; $i<$rating_overall; $i++): ?>
                                <i class="fa fa-star"></i>
                                <?php endfor; ?>
                                <?php endif; ?>
                            </span></p>
                        </div>
                    </div><!-- / project-info -->

                    <div class="buy-product">
                        <div class="options">
                            <input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4">
                            <span class="selectors">
                                <select class="selectpicker">
                                    <optgroup label="Size:">
                                        <option>Small</option>
                                        <option>Medium</option>
                                        <option>Large</option>
                                    </optgroup>
                                </select>
                                <select class="selectpicker two">
                                    <optgroup label="Color:">
                                        <option>Grey</option>
                                        <option>Black</option>
                                        <option>Blue</option>
                                    </optgroup>
                                </select>
                            </span>
                        </div>
                        <!-- / options -->

                        <div class="space-25">&nbsp;</div>

                        <a href="shopping-cart.html" class="btn btn-primary-filled btn-rounded"><i class="lnr lnr-cart"></i><span> Add to Cart</span></a>
                        <a href="checkout.html" class="btn btn-success-filled btn-rounded"><i class="lnr lnr-heart"></i><span> Buy Now</span></a>
                    </div>

                    <div class="info-buttons">
                        
                        <a href="https://wa.link/5bbmxy" class="btn btn-primary btn-rounded"><i class="lnr lnr-phone-handset"></i><span> Konsultasi Langsung</span></a>
                    </div><!-- / info-buttons -->

                </div><!-- product-details -->

            </div><!-- / col-sm-4 col-md-3 -->
            <!-- / project sidebar area -->

        </div><!-- / row -->

        <div id="related-products">
            <h4 class="space-left space-bottom-30">Related Products</h4>
            <div class="row">

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <span class="sale-label">SALE</span>
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="<?=base_url();?>/assets/affiliate/images/f-product2.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                            <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price"><del>$49</del> <span class="sale-price">$29</span></h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="<?=base_url();?>/assets/affiliate/images/f-product3.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                                <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price">$99</h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="<?=base_url();?>/assets/affiliate/images/f-product4.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                            <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price">$29</h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="<?=base_url();?>/assets/affiliate/images/f-product6.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                            <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price">$39</h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

            </div><!-- / row -->
        </div><!-- / related-products -->
    </div><!-- / container -->
</section>
<!-- / shop single-product -->

<?php include('modal_pengajuan_product.php'); ?>
<!-- / content -->

<!-- footer -->
<footer class="light-footer">
    <?php include('footer.php'); ?>
</footer>
<!-- / footer -->

<!-- javascript -->
<?php include('scripts.php'); ?>
<script src="/assets/affiliate/js/reviews.js?v=<?= $v;?>"></script>

</body>

</html>