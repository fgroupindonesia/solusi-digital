<div class="top-menu top-menu-inverse">
        <div class="container">
            <p>
                <span class="left">Yuk Belanja dari sekarang, mumpung <span class="text-primary"><strong>PROMO 90%</strong></span>!</span>
                <span class="right">
                    
                    <?php if(!isset($username)): ?>
                        <a id="login-link" href="/shop/login"><i class="lnr lnr-lock"></i> <span>Login / Register</span></a>
                    <?php else : ?>
                        <a id="my-account-link" href="#"><i class="lnr lnr-user"></i> <span>My Account</span></a>
                        <a href="/shop/cart"><i class="lnr lnr-cart"></i> <span>Shopping Cart 
                            (<b id="total_cart_items"><?= $total_cart_items ;?></b>)
                        </span></a>
                    <?php endif; ?>
                    
                </span>
            </p>
        </div><!-- / container -->
    </div><!-- / top-menu-inverse -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <h1 class="page-title fadeInDown animated first"><?= $shop_title ?? 'Solusi Digital' ;?></h1>
            </div><!-- / navbar-header -->
        <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li><a href="/shop"><i class="fa-solid fa-house me-1"></i> Home</a></li>
        <li><a href="/shop/promo"><i class="fa-solid fa-tag me-1"></i> Promo</a></li>
        <li><a href="/shop/lokasi"><i class="fa-solid fa-location-dot me-1"></i> Lokasi Kami</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-circle-question me-1"></i> Bantuan <span class="caret"></span></a>
            <ul class="dropdown-menu pulse animated">
                <li><a href="/shop/ketentuan"><i class="fa-solid fa-file-contract me-1"></i> Ketentuan</a></li>
                <li><a href="#" data-toggle="modal" data-target="#productSubmissionModal"><i class="fa-solid fa-box-open me-1"></i> Pengajuan Produk</a></li>
                <li><a href="https://wa.link/5bbmxy"><i class="fa-solid fa-headset me-1"></i> Konsultasi Langsung</a></li>
            </ul>
        </li>
    </ul>
</div>
        </div><!-- / container -->
    </nav><!-- / navbar -->

    <div id="page-header" class="shop-left">
        <div class="container">
            <div class="page-header-content text-center">
                <!-- / page-header -->
                
            </div><!-- / page-header-content -->
        </div><!-- / container -->

        <input type="hidden" class="bg-images" value="<?= $shop_banner_1 ?? 'assets/images/banner_gold_1.png' ;?>">
        <input type="hidden" class="bg-images" value="<?= $shop_banner_2 ?? 'assets/images/banner_gold_2.png' ;?>">
        <input type="hidden" class="bg-images" value="<?= $shop_banner_3 ?? 'assets/images/banner_gold_3.png' ;?>">
    </div><!-- / page-header -->