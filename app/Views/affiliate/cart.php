﻿<!DOCTYPE html>
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
    <div class="top-menu top-menu-inverse">
        <div class="container">
            <p>
                <span class="left">Free Worldwide shipping on orders over <span class="text-primary"><strong>$100</strong></span>!</span>
                <span class="right">
                    <a href="my-account.html"><i class="lnr lnr-user"></i> <span>My Account</span></a>
                    <a href="login-register.html"><i class="lnr lnr-lock"></i> <span>Login / Register</span></a>
                    <a href="shopping-cart.html"><i class="lnr lnr-cart"></i> <span>Shopping Cart (2)</span></a>
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
                <a class="navbar-brand" href="index.html"><img src="<?=base_url();?>/assets/affiliate/images/logo.png" alt=""></a>
            </div><!-- / navbar-header -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop <span class="caret"></span></a>
                        <ul class="dropdown-menu pulse animated">
                            <li><a href="shop-right.html">Shop: Right Sidebar</a></li>
                            <li><a href="shop-left.html">Shop: Left Sidebar</a></li>
                            <li><a href="shop-full.html">Shop: Full Width</a></li>
                            <li><a href="shop-filter.html">Shop: Filterable</a></li>
                            <li><a href="single-product.html">Single Product</a></li>
                            <li class="active"><a href="shopping-cart.html">Shopping Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu pulse animated">
                            <li><a href="login-register.html">Login / Register</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="single-post.html">Single Post</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="components.html">Components</a></li>
                        </ul>
                    </li>
                    <li class="dropdown w-image">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url();?>/assets/affiliate/images/eng.png" alt=""> <span class="caret"></span></a>
                        <ul class="dropdown-menu pulse animated">
                            <li><a href="#"><img src="<?=base_url();?>/assets/affiliate/images/fr.png" alt=""> FR</a></li>
                            <li><a href="#"><img src="<?=base_url();?>/assets/affiliate/images/de.png" alt=""> DE</a></li>
                            <li><a href="#"><img src="<?=base_url();?>/assets/affiliate/images/es.png" alt=""> ES</a></li>
                        </ul>
                    </li>    
                </ul>
            </div><!--/ nav-collapse -->
        </div><!-- / container -->
    </nav><!-- / navbar -->

    <div id="page-header" class="shopping-cart">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">Shopping Cart</h1>
                </div><!-- / page-header -->
                <p class="slide-text fadeInUp animated second">Page description goes here...</p>
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div><!-- / page-header -->

</header>
<!-- / header -->

<!-- content -->

<!-- shopping-cart -->
<div id="shopping-cart">
    <div class="container">
        <!-- shopping cart table -->
        <table class="shopping-cart">
            <thead>
                <tr>
                    <th class="image">&nbsp;</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr class="cart-item">
                    <td class="image"><a href="#"><img src="<?=base_url();?>/assets/affiliate/images/product-small1.jpg" alt=""></a></td>
                    <td><a href="single-product.html">Women's Shirt</a></td>
                    <td>$59</td>
                    <td class="qty"><input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4"></td>
                    <td>$59</td>
                    <td class="remove"><a href="#x" class="btn btn-danger-filled x-remove">×</a></td>
                </tr>
                <tr class="cart-item">
                    <td class="image"><a href="#"><img src="<?=base_url();?>/assets/affiliate/images/product-small2.jpg" alt=""></a></td>
                    <td><a href="single-product.html">Women's Jeans</a></td>
                    <td>$69</td>
                    <td class="qty"><input type="number" step="1" min="0" name="cart" value="2" title="Qty" class="input-text qty text" size="4"></td>
                    <td>$138</td>
                    <td class="remove"><a href="#x" class="btn btn-danger-filled x-remove">×</a></td>
                </tr>
            </tbody>
        </table>
        <!-- / shopping cart table -->

        <div class="row cart-footer">
            <div class="coupon col-sm-6">
                <div class="input-group">
                    <input type="text" class="form-control rounded" id="coupon-code" placeholder="Coupon Code">
                    <span class="input-group-btn">
                    <button class="btn btn-primary-filled btn-rounded" type="button"><i class="lnr lnr-tag"></i> <span>Apply Coupon</span></button>
                    </span>
                </div>
            </div><!-- / input-group -->
            <div class="update-cart col-sm-6">
                <button class="btn btn-default-filled btn-rounded" type="button"><i class="lnr lnr-sync"></i> <span>Update Cart</span></button>
            </div><!-- / update-cart -->

            <div class="col-sm-6 cart-total">
                <h4>Cart Total</h4>
                <p>Subtotal: <span>$197</span></p>
                <p>Shipping: <span>Free</span></p>
                <p>Total: <span>$197</span></p>
            </div><!-- / cart-total -->

            <div class="col-sm-6 cart-checkout">
                <a href="shop-right.html" class="btn btn-default-filled btn-rounded"><i class="lnr lnr-cart"></i> <span>Continue Shopping</span></a>
                <a href="checkout.html" class="btn btn-primary-filled btn-rounded"><i class="lnr lnr-exit"></i> <span>Proceed to Checkout</span></a>
            </div><!-- / cart-checkout -->


        </div><!-- / row -->
    </div><!-- / container -->
</div>
<!-- / shopping-cart -->

<!-- / content -->

<!-- footer -->
<footer class="light-footer">
    <div class="widget-area">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-md-4 widget">
                    <div class="about-widget">
                        <div class="widget-title-image">
                            <img src="<?=base_url();?>/assets/affiliate/images/logo.png" alt="">
                        </div>
                        <p>Praesent sed congue ipsum. Nullam tempus ornare est, non aliquet velit tincidunt elementum. Nulla at risus ut felis eleifend. Nulla non lacinia. Integer est lacus, ultricies sed feugiat id, maximus nec.</p>
                    </div><!-- / about-widget -->
                </div><!-- / widget -->
                <!-- / first widget -->

                <div class="col-sm-6 col-md-2 widget">
                    <div class="widget-title">
                        <h4>Brands</h4>
                    </div>
                    <div class="link-widget">
                        <div class="info">
                            <a href="#x">Marco REA</a>
                        </div>
                        <div class="info">
                            <a href="#x">3Days</a>
                        </div>
                        <div class="info">
                            <a href="#x">La Barcelona</a>
                        </div>
                        <div class="info">
                            <a href="#x">Lora Towers</a>
                        </div>
                        <div class="info">
                            <a href="#x">Ginneys</a>
                        </div>
                    </div>
                </div><!-- / widget -->
                <!-- / second widget -->

                <div class="col-sm-6 col-md-2 widget">
                    <div class="widget-title">
                        <h4>Support</h4>
                    </div>
                    <div class="link-widget">
                        <div class="info">
                            <a href="#x">Privacy Policy</a>
                        </div>
                        <div class="info">
                            <a href="#x">Shipping & Return</a>
                        </div>
                        <div class="info">
                            <a href="#x">Terms & Conditions</a>
                        </div>
                        <div class="info">
                            <a href="faq.html">F.A.Q</a>
                        </div>
                        <div class="info">
                            <a href="contact.html">Contact</a>
                        </div>
                    </div>
                </div><!-- / widget -->
                <!-- / third widget -->

                <div class="col-sm-6 col-md-4 widget">
                    <div class="widget-title">
                        <h4>Get in Touch</h4>
                    </div>
                    <div class="contact-widget">
                        <div class="info">
                            <p><i class="lnr lnr-map-marker"></i><span>Miami, S Miami Ave, SW 20th.</span></p>
                        </div>
                        <div class="info">
                            <a href="tel:+0123456789"><i class="lnr lnr-phone-handset"></i><span>+0123 456 789</span></a>
                        </div>
                        <div class="info">
                            <a href="mailto:hello@yoursite.com"><i class="lnr lnr-envelope"></i><span>office@yoursite.com</span></a>
                        </div>
                        <div class="info">
                            <p class="social pull-left">
                                <a class="no-margin" href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </p>
                        </div>
                    </div><!-- / contact-widget -->
                </div><!-- / widget -->
                <!-- / fourth widget -->

            </div><!-- / row -->
        </div><!-- / container -->
    </div><!-- / widget-area -->
    <div class="footer-info">
        <div class="container">
                <div class="pull-left">
                    <p>© 2016 - <strong>inCart</strong> - Responsive Shop Theme.</p>
                </div>
                <span class="pull-right">
                    <img src="<?=base_url();?>/assets/affiliate/images/visa.png" alt="">
                    <img src="<?=base_url();?>/assets/affiliate/images/mastercard.png" alt="">
                    <img src="<?=base_url();?>/assets/affiliate/images/discover.png" alt="">
                    <img src="<?=base_url();?>/assets/affiliate/images/paypal.png" alt="">
                </span>
        </div><!-- / container -->
    </div><!-- / footer-info -->
</footer>
<!-- / footer -->

<!-- javascript -->
<script src="<?=base_url();?>/assets/affiliate/js/jquery.min.js"></script>
<script src="<?=base_url();?>/assets/affiliate/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>/assets/affiliate/js/jquery.easing.min.js"></script>

<!-- preloader -->
<script src="<?=base_url();?>/assets/affiliate/js/preloader.js"></script>
<!-- / preloader -->

<!-- / javascript -->
</body>

</html>