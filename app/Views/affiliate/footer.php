<div class="widget-area">
        <div class="container">
            <div class="row">

              <div class="col-sm-6 col-md-4 widget">
  <div class="about-widget">
    <div class="widget-title-image" style="display: flex; align-items: center; gap: 10px;">
      <img src="<?=base_url();?>assets/images/solusi-digital-logo.png" alt="" style="width: 32px; height: auto;">
      <h3 style="margin: 0;">Solusi Digital</h3>
    </div>
    <p>sebuah platform online dari FGroupIndonesia menawarkan berbagai layanan teknologi informasi, mulai dari konsultasi IT untuk mengatasi tantangan bisnis hingga berbagai layanan online lengkap lainnya!</p>
  </div><!-- / about-widget -->
</div>
<!-- / widget -->
                <!-- / first widget -->

                <div class="col-sm-6 col-md-2 widget">
                    <div class="widget-title">
                        <h4>Kategori Top</h4>
                    </div>
                    <div class="link-widget">
                        <?php if(!empty($data_category_top)): ?>
                        <?php foreach($data_category_top as $dcat): ?>
                        <div class="info">
                            <a href="/shop/cat/<?=urlencode($dcat->slug);?>"><?=$dcat->name;?></a>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div><!-- / widget -->
                <!-- / second widget -->

                <div class="col-sm-6 col-md-2 widget">
                    <div class="widget-title">
                        <h4>Bantuan</h4>
                    </div>
                    <div class="link-widget">
                        <div class="info">
                            <a href="/shop/ketentuan">Ketentuan</a>
                        </div>
                        <div class="info">
                            <a href="#x" data-toggle="modal" data-target="#productSubmissionModal" >Pengajuan Produk</a>
                        </div>
                        <div class="info">
                            <a href="https://wa.link/5bbmxy">Konsultasi</a>
                        </div>
                    </div>
                </div><!-- / widget -->
                <!-- / third widget -->

            <div class="col-sm-6 col-md-4 widget">
  <div class="widget-title">
    <h4>Main Office</h4>
  </div>
  <div class="contact-widget">
    <div class="contact-address info">
      <p>
        <i class="lnr lnr-map-marker"></i>
        <span>
          Jl. Parahyangan Raya no.18,<br>
          Komp. Pangheger Permai I,<br>
          Ujung Berung, Bandung 40614.
        </span>
      </p>
    </div>
    <div class="info">
      <a href="tel:+6285795569337">
        <i class="lnr lnr-phone-handset"></i>
        <span>+62857-9556-9337</span>
      </a>
    </div>
    <div class="info">
      <a href="mailto:support@fgroupindonesia.com">
        <i class="lnr lnr-envelope"></i>
        <span>support@fgroupindonesia.com</span>
      </a>
    </div>
    <div class="info">
      <p class="social">
        <a class="no-margin" href="https://facebook.com/fgroupindonesia"><i class="fa-brands fa-facebook me-2"></i></a>
        <a href="https://twitter.com/fgroupindonesia"><i class="fa-brands fa-x-twitter me-2"></i></a>
        <a href="https://youtube.com/fgroupindonesia"><i class="fa-brands fa-youtube me-2"></i></a>
        <a href="https://instagram.com/fgroup.indonesia"><i class="fa-brands fa-instagram me-2"></i></a>
        </p>
    </div>
  </div>
</div>

<!-- / widget -->
                <!-- / fourth widget -->

            </div><!-- / row -->
        </div><!-- / container -->
    </div><!-- / widget-area -->
    <div class="footer-info">
        <div class="container">
                <div class="pull-left">
                    <p>Sejak 2013 - <?= date('Y'); ?> <strong>| Solusi Digital</strong> - © FGroupIndonesia.</p>
                </div>
                <span class="pull-right">
                    <img src="<?=base_url();?>/assets/affiliate/images/visa.png" alt="">
                    <img src="<?=base_url();?>/assets/affiliate/images/mastercard.png" alt="">
                    <img src="<?=base_url();?>/assets/affiliate/images/discover.png" alt="">
                    <img src="<?=base_url();?>/assets/affiliate/images/paypal.png" alt="">
                </span>
        </div><!-- / container -->
    </div><!-- / footer-info -->