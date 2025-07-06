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

<!-- shop 3col -->
<section id="shop">
    <div class="container">
        <div class="row">

            <!-- sidebar-area -->
            <div class="col-sm-4 col-md-3 sidebar-area">

                <!-- filter-by-price widget -->
                <div class="widget">
                    <h5 class="widget-title">Filter by Price</h5>

                    <div id="slider-range"></div>
    
                    <p class="price-values">
                        Rp. <span id="min-price"><?= $minPrice ?? 0; ?></span> - Rp. <span id="max-price"><?= $maxPrice ?? 10000000; ?></span>
                    </p>
                    <!-- / filter-by-price widget -->

                    <button id="btn-shop-filter" class="btn-primary"> Apply Filter </button>
                </div>
                <!-- / widget -->

                <!-- price-filter widget -->
               <div class="price-filter widget">
                <h5 class="widget-title">Price Filter</h5>

                <p class="filter-item <?= $filter0To10 ?? ''; ?>">
                    <a href="/shop?minPrice=0&maxPrice=10000">Rp.0-10.000</a>
                </p><!-- / filter-item -->

                <p class="filter-item <?= $filter10To50 ?? ''; ?>">
                    <a href="/shop?minPrice=10000&maxPrice=50000">Rp.10.000-50.000</a>
                </p><!-- / filter-item -->

                <p class="filter-item <?= $filter50To100 ?? ''; ?>">
                    <a href="/shop?minPrice=50000&maxPrice=100000">Rp.50.000-100.000</a>
                </p><!-- / filter-item -->

                <p class="filter-item <?= $filter100To250 ?? ''; ?>">
                    <a href="/shop?minPrice=100000&maxPrice=250000">Rp.100.000-250.000</a>
                </p><!-- / filter-item -->

                <p class="filter-item <?= $filter250To500 ?? ''; ?>">
                    <a href="/shop?minPrice=250000&maxPrice=500000">Rp.250.000-500.000</a>
                </p><!-- / filter-item -->

                <p class="filter-item <?= $filter500To1M ?? ''; ?>">
                    <a href="/shop?minPrice=500000&maxPrice=1000000">Rp.500.000-1.000.000</a>
                </p><!-- / filter-item -->

                <p class="filter-item <?= $filter1MTo5M ?? ''; ?>">
                    <a href="/shop?minPrice=1000000&maxPrice=5000000">Rp.1.000.000-5.000.000</a>
                </p><!-- / filter-item -->

                <p class="filter-item <?= $filterAbove5M ?? ''; ?>">
                    <a href="/shop?minPrice=5000000">&gt; Rp.5.000.000</a>
                </p><!-- / filter-item -->

            </div>

                <!-- / price-filter widget -->

                

                <!-- categries widget -->
                <div class="categories-sidebar-widget widget no-border">
                    <h5 class="widget-title">Kategori</h5>

                    <?php if(isset($data_product_categories)): ?>
                    <?php foreach($data_product_categories as $dapc): ?>
                    <p class="product-category">
                        <a href="/shop/cat/<?= urlencode($dapc->slug);?>"><?= $dapc->category_name;?></a>
                        <span class="pull-right">(<?= $dapc->total_products; ?>)</span>
                    </p><!-- / category -->
                    <?php endforeach; ?>
                    <?php endif; ?>

                   <!-- / category -->

                </div>
                <!-- / categories-sidebar-widget -->

                <!-- tags-sidebar-widget -->
                <div class="tags-sidebar-widget widget">
                    <div class="widget-title">
                        <h5 class="widget-title">Konsultasi Langsung</h5>
                    </div>
                    <p>
    <a href="https://wa.link/5bbmxy" class="btn btn-xs btn-primary-filled btn-rounded"><i class="fab fa-whatsapp"></i> CS #01</a>
    <a href="https://wa.link/fm9y5m" class="btn btn-xs btn-primary-filled btn-rounded"><i class="fab fa-whatsapp"></i> CS #02</a>
</p>
                </div>
                <!-- / tags-sidebar-widget -->

            </div><!-- / sidebar-area -->

            <div class="col-sm-8 col-md-9 content-area">
               <p class="shop-results">
                <?php if($totalItems>0): ?>
    Menampilkan <strong><?= $start ?></strong> - <strong><?= $end ?></strong>
    dari <strong><?= $totalItems ?></strong> items.
                <?php elseif(empty($maxPrice) && $totalItems==0) : ?>
                Tidak ada data di <br>Angka Terendah Minimum Rp.<?=$minPrice ;?>!

                <?php else  : ?>

                <?php if($totalItems==0):?>    
                Tidak ada data di <br>Kisaran Range Rp.<?=$minPrice ;?> - Rp.<?=$maxPrice ;?>!
                <?php endif; ?>

                <?php endif; ?>

                    <span class="pull-right">
                       <select id="select-sort-shop" class="selectpicker">
                        <optgroup label="Sort By:">
                            <option value="default" <?= $sort_mode == 'default' ? 'selected' : '' ?>>Default</option>
                            <option value="popular" <?= $sort_mode == 'popular' ? 'selected' : '' ?>>Populer</option>
                            <option value="newest" <?= $sort_mode == 'newest' ? 'selected' : '' ?>>Terbaru</option>
                            <option value="rating" <?= $sort_mode == 'rating' ? 'selected' : '' ?>>Rating</option>
                            <option value="lowest_price" <?= $sort_mode == 'lowest_price' ? 'selected' : '' ?>>Harga Rendah</option>
                            <option value="highest_price" <?= $sort_mode == 'highest_price' ? 'selected' : '' ?>>Harga Termahal</option>
                        </optgroup>
                    </select>

                    </span>
                </p>
                <div id="grid" class="row">
                    <?php if(isset($data_products)): ?>
                    <?php if(count($data_products)>0): ?>
                    <?php foreach($data_products as $dp): ?>
                    <!-- product -->
                    <div class="col-xs-6 col-md-4 product">
                        <a href="/shop/product?id=<?=$dp->product_id;?>" class="product-link"></a>
                        <!-- / product-link -->
                        <img src="<?=$dp->image_url; ?>" alt="">
                        <!-- / product-image -->

                        <!-- product-hover-tools -->
                        <div class="product-hover-tools">
                            <a href="/shop/product?id=<?=$dp->product_id;?>" class="view-btn">
                                <i class="lnr lnr-eye"></i>
                            </a>
                            <a href="#" data-product-id="<?=$dp->product_id;?>" class="add-to-cart">
                                <i class="lnr lnr-cart"></i>
                            </a>
                        </div><!-- / product-hover-tools -->

                        <!-- product-details -->
                        <div class="product-details">
                            <h3 class="product-title"><?= $dp->product_name ;?></h3>
                            <h6 class="product-price"><?= $dp->base_price; ?></h6>
                        </div><!-- / product-details -->
                    </div><!-- / product -->
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endif; ?>

                    <!-- grid-resizer -->
                    <div class="col-xs-6 col-md-4 shuffle_sizer"></div>
                    <!-- / grid-resizer -->

                </div><!-- / row -->

                <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?= $currentPage - 1 ?>" class="btn btn-direction btn-default btn-rounded">
                        <i class="lnr lnr-chevron-left"></i>
                    </a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?>" class="btn btn-default btn-rounded <?= $i == $currentPage ? 'btn-active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?= $currentPage + 1 ?>" class="btn btn-direction btn-default btn-rounded">
                        <i class="lnr lnr-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>


            </div><!-- / content-area -->

        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / shop 3col -->

<?php include('modal_pengajuan_product.php'); ?>
<!-- / content -->

<!-- footer -->
<footer class="light-footer">
    <?php include('footer.php'); ?>
</footer>
<!-- / footer -->

<!-- javascript -->
<?php include('scripts.php'); ?>

</body>

</html>