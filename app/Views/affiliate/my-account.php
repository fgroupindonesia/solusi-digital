﻿<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Responsive Shop Theme">
<meta name="keywords" content="responsive, retina ready, shop bootstrap template, html5, css3">
<meta name="author" content="KingStudio.ro">

<!-- favicon -->
<link rel="icon" href="images/favicon.png">
<!-- page title -->
<title>inCart - Responsive Shop Theme</title>
<!-- bootstrap css -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- css -->
<link href="css/style.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<!-- fonts -->
<link href="../../css?family=Raleway:400,500,700" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='fonts/FontAwesome.otf' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/linear-icons.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
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
                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
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
                            <li class="active"><a href="my-account.html">My Account</a></li>
                            <li><a href="single-post.html">Single Post</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="components.html">Components</a></li>
                        </ul>
                    </li>
                    <li class="dropdown w-image">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="images/eng.png" alt=""> <span class="caret"></span></a>
                        <ul class="dropdown-menu pulse animated">
                            <li><a href="#"><img src="images/fr.png" alt=""> FR</a></li>
                            <li><a href="#"><img src="images/de.png" alt=""> DE</a></li>
                            <li><a href="#"><img src="images/es.png" alt=""> ES</a></li>
                        </ul>
                    </li>    
                </ul>
            </div><!--/ nav-collapse -->
        </div><!-- / container -->
    </nav><!-- / navbar -->

    <div id="page-header" class="my-account">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">My Account</h1>
                </div><!-- / page-header -->
                <p class="slide-text fadeInUp animated second">Your page's description goes here...</p>
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div><!-- / page-header -->

</header>
<!-- / header -->

<!-- content -->

<!-- my-account -->
<section id="my-account">
    <div class="container">
        <div class="row">

            <div class="col-sm-2 account-sidebar">
                <img src="images/account-img.jpg" alt="">
                <p><a href="#personal-info" class="page-scroll">Personal Info</a></p>
                <p><a href="#shipping-info" class="page-scroll">Shipping Info</a></p>
                <p><a href="#my-orders" class="page-scroll">My Orders</a></p>
                <p><a href="#my-reviews" class="page-scroll">My Reviews</a></p>
                <p><a href="#wishlist" class="page-scroll">Wishlist</a></p>
            </div><!-- / account-sidebar -->

            <div class="col-sm-10 account-info">
                <div id="personal-info" class="account-info-content">
                    <h4>Personal Info <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <div class="row">

                        <div class="col-xs-6 col-sm-4 col-md-2">
                            <img src="images/account-img.jpg" alt="">
                            <a href="#x" class="btn btn-primary btn-xs btn-rounded no-margin">Change Image</a>
                        </div>

                        <div class="col-xs-6 col-sm-8 col-md-10">
                            <p>Full Name: <span>Johanna Doe</span></p>
                            <p>Country: <span>USA</span></p>
                            <p>Email: <span>me@mysite.com</span></p>
                            <p>Phone: <span>+0123 456 789</span></p>
                            <p>Date of Birth: <span>Aug. 13, 1991</span></p>
                        </div>

                    </div><!-- / row -->
                </div><!-- / personal-info -->

                <div id="shipping-info" class="account-info-content">
                    <h4>Shipping Info <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p class="space-bottom"><span><strong>Johanna Doe - me@mysite.com</strong></span></p>
                    <p>Country: <span>USA</span></p>
                    <p>State: <span>Florida</span></p>
                    <p>City: <span>Miami</span></p>
                    <p>Address Line: <span>S Miami Ave, SW 20th, Suite 3864</span></p>
                    <p>ZIP Code: <span>33222</span></p>
                    <div class="account-info-footer"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="fa fa-plus"></i><span>Add New Address</span></a></div>
                </div><!-- / shipping-info -->

                <div id="my-orders" class="account-info-content">
                    <h4>My Orders <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p><a href="#x">Order #38726</a> <span>- Paid & Shipped</span> - Tracking No: <span>#TRCK182736</span></p>
                    <p><a href="#x">Order #34823</a> <span>- Completed on 25.10.2016</span></p>
                    <p><a href="#x">Order #23463</a> <span>- Completed on 16.08.2016</span></p>
                </div><!-- / my-orders -->

                <div id="my-reviews" class="account-info-content">
                    <h4>My Reviews <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p><a href="#x">Order #38726</a> - <span>Review: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i></span></p>
                    <p><a href="#x">Order #34823</a> - <span>Review: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span></p>
                    <p><a href="#x">Order #23463</a> - <span>Review: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span></p>
                </div><!-- / my-reviews -->

                <div id="wishlist" class="account-info-content">
                    <h4>Wishlist <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p><a href="#x">Product 1</a> - <span>Price: $29</span></p>
                    <p><a href="#x">Product 2</a> - <span>Price: $59</span></p>
                    <p><a href="#x">Product 3</a> - <span>Price: $69</span></p>
                </div><!-- / wishlist -->

            </div><!-- / account-info -->

        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / my-account -->

<!-- / content -->

<!-- footer -->
<footer class="light-footer">
    <div class="widget-area">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-md-4 widget">
                    <div class="about-widget">
                        <div class="widget-title-image">
                            <img src="images/logo.png" alt="">
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
                    <img src="images/visa.png" alt="">
                    <img src="images/mastercard.png" alt="">
                    <img src="images/discover.png" alt="">
                    <img src="images/paypal.png" alt="">
                </span>
        </div><!-- / container -->
    </div><!-- / footer-info -->
</footer>
<!-- / footer -->

<!-- javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>

<!-- scrolling-nav -->
<script src="js/scrolling-nav.js"></script>
<!-- / scrolling-nav -->

<!-- preloader -->
<script src="js/preloader.js"></script>
<!-- / preloader -->

<!-- / javascript -->
</body>

</html>