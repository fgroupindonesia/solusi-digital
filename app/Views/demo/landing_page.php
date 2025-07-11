<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8">

  <base href="">

  <title>Vvveb Landing - Homepage</title>

  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="canonical" href="">

  <link id="landing-css" href="css/style.bundle.css" rel="stylesheet" media="screen">
  <link id="vvvebjs-css" href="css/fonts.css" rel="stylesheet" media="screen">
  <link id="vvvebjs-css" href="css/custom.css" rel="stylesheet" media="screen">





  <style>
    :root {
      /*--bs-font-headings:'Inter';*/
    }

    .hero-3 {}
  </style>




  <link rel="sitemap" type="application/xml" title="Sitemap" href="/feed/index">
  <link rel="alternate" type="application/rss+xml" title="Feed" href="/feed/posts" />
  <link rel="alternate" type="application/rss+xml" title="Comments Feed" href="/feed/comments" />
  <link rel="alternate" type="application/rss+xml" title="Products" href="/feed/products" />

  <link rel="icon" type="image/x-icon" href="../../media/favicon.ico" data-v-global-site.favicon>

  <link rel="manifest" href="/manifest.webmanifest">

  <link rel="alternate" hreflang="" href="" />
</head>


<body class="home">
  <nav class="navigation-3 clearfix fixed-top transparent" title="navigation-3" data-v-save-global="index.html,.navigation-3">

    <div id="top" class="top-nav clearfix" data-bs-theme="dark">
      <div class="container">
        <div class="d-flex justify-content-between  flex-md-row d-flex flex-column flex-md-row">
          <div class="nav">
            <ul class="list-inline" data-v-component-site>
              <li class="list-inline-item" data-v-if="site.description.phone-number">
                <a href="tel:5511112377" class="p-2 p-md-0" title="Phone" data-v-site-description-phone-number>
                  <i class="la la-phone"></i>
                  <span class=" text-muted" data-v-site-description-phone-number>+55 (111) 123 777</span>
                </a>
              </li>
              <li class="list-inline-item" class="p-2 p-md-0" data-v-if="site.contact-email">
                <a href="mailto:contact@mysite.com" title="Email" data-v-site-contact-email>
                  <i class="la la-envelope"></i>
                  <span class=" text-muted" data-v-site-contact-email>contact@mysite.com</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="nav">
            <ul class="list-inline">
              <!--
					<li class="list-inline-item"><a id="wishlist-total" title="Wish List (0)"><i class="la la-heart"></i> <span class="">Favorites</span></a></li>
					<li class="list-inline-item"><a title="Checkout"><i class="la la-share"></i> <span class="">Checkout</span></a></li>
					<li class="list-inline-item">
						<div class="dropdown">
							<a href="" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"><i class="la la-user"></i> <span class="">My Account</span></i></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a class="dropdown-item">Register</a></li>
								<li><a class="dropdown-item">Login</a></li>
							</ul>
						</div>
					</li>
					-->
              <li class="list-inline-item">
                <div data-v-component-currency>
                  <form method="post" enctype="multipart/form-data" id="form-currency">

                    <a class="dropdown-toggle p-2 p-md-0" data-bs-toggle="dropdown" role="button" title="Currency" aria-expanded="false">
                      <!-- <i class="la la-dollar-sign me-1"></i> -->
                      <span class="" data-v-currency-info-name>USD</span>
                    </a>


                    <div class="dropdown-menu dropdown-menu-end">

                      <div data-v-currency>
                        <button class="dropdown-item" type="submit" value="EUR" name="currency" data-v-currency-code>
                          <span data-v-currency-sign_start>€</span>
                          <span data-v-currency-sign_end>€</span>
                          <span class="ms-1" data-v-currency-name>Euro</span>
                        </button>
                      </div>

                      <div data-v-currency>
                        <button class="dropdown-item" type="submit" value="GBP" name="currency" data-v-currency-code>
                          <span data-v-currency-sign_start>£</span>
                          <span data-v-currency-sign_end>£</span>
                          <span class="ms-1" data-v-currency-name>Pound Sterling</span>
                        </button>
                      </div>

                      <div data-v-currency>
                        <button class="dropdown-item" type="submit" value="USD" name="currency" data-v-currency-code>
                          <span data-v-currency-sign_start>$</span>
                          <span data-v-currency-sign_end>$</span>
                          <span class="ms-1" data-v-currency-name>US Dollar</span>
                        </button>
                      </div>

                    </div>
                  </form>
                </div>
              </li>
              <li class="list-inline-item">
                <div data-v-component-language>
                  <form method="post" enctype="multipart/form-data" id="form-language">

                    <a class="dropdown-toggle p-2 p-md-0" data-bs-toggle="dropdown" role="button" title="Language" aria-expanded="false">
                      <!-- <i class="la la-flag me-1"></i> -->
                      <!-- 
									<img src="" data-v-language-info-img>
									-->
                      <span class="" data-v-language-info-name>English</span>
                    </a>


                    <div class="dropdown-menu dropdown-menu-end">

                      <div data-v-language>
                        <button class="dropdown-item" type="submit" value="eng" name="language" data-v-language-code>
                          <!-- <i class="la la-flag la-lg me-2"></i> -->
                          <img src="" loading="lazy" class="me-1" data-v-language-img>

                          <!-- <a href="" data-v-language-url> -->
                          <span data-v-language-name>English</span>
                          <!-- </a> -->
                        </button>
                      </div>

                      <div data-v-language>
                        <button class="dropdown-item" type="submit" value="ro" name="language" data-v-language-code>
                          <!-- <i class="la la-flag la-lg me-2"></i> -->
                          <img src="" loading="lazy" class="me-1" data-v-language-img>
                          <!-- <a href="" data-v-language-url>  -->
                          <span data-v-language-name>Romanian</span>
                          <!-- </a>  -->
                        </button>
                      </div>

                    </div>
                  </form>
                </div>
              </li>
              <li class="list-inline-item">

                <a id="color-theme-switch" class="p-2 p-md-0" role="button" title="Switch sidebar color theme">
                  <i class="la la-sun la-lg"></i>
                </a>

              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="navbar navbar-expand-md navbar-dark">

      <div class="container">

        <div data-v-component-site>
          <a class="navbar-brand" href="/" data-url data-v-url-params='{"host":"www.*.*"}'>
            <span class="visually-hidden">Logo</span>
            <img src="img/logo.png" alt="Site logo" loading="lazy" class="logo-default" data-v-site-logo>
            <img src="img/logo.png" alt="Site logo sticky" loading="lazy" class="logo-sticky" data-v-site-logo-sticky>
            <img src="img/logo-white.png" alt="Site logo dark" loading="lazy" class="logo-default-dark" data-v-site-logo-dark>
            <img src="img/logo-white.png" alt="Site logo dark sticky" loading="lazy" class="logo-default-dark-sticky" data-v-site-logo-dark-sticky>
          </a>
        </div>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar" data-v-component-menu="header" data-v-slug="main-menu">
          <ul class="navbar-nav ms-auto" data-v-menu-items>
            <li class="nav-item dropdown position-static" data-v-menu-item data-v-class-if-has-dropdown="category.children > 0" data-v-class-if-position-static="category.has-text">

              <a class="nav-link dropdown-toggle" data-v-class-if-dropdown-toggle="category.children > 0" data-v-class-if-active="category.active" aria-expanded="false" data-v-menu-item-url>
                <span data-v-menu-item-name data-v-if-not="category.type = 'text'"></span>
                <span data-v-menu-item-content>
                  <p>
                    <img src="/media/vvveb.svg" height="24" alt="" class="me-2">Mega menu
                  </p>
                </span>
              </a>

              <div class="dropdown-menu" data-v-menu-item-recursive>
                <div data-v-menu-item class="nav-item" data-v-class-if-dropdown="category.children > 0">
                  <a class="dropdown-item" data-v-class-if-active="category.active" href="https://github.com/givanz/VvvebJs/wiki" data-v-menu-item-url>
                    <span data-v-menu-item-name data-v-if-not="category.type = 'text'"></span>
                    <span data-v-if="category.content" data-v-menu-item-content>
                      <div class="row">
                        <div class="col-6 align-self-center">
                          <img src="img/demo/video-1.webp" alt="Post" width="250" loading="lazy" class="rounded img-fluid">
                        </div>
                        <div class="col-6">
                          <h4>Features</h4>
                          <p class="text-muted">Just a few mentions, but there is more</p>
                          <ul class="list-unstyled">
                            <li class="text-primary">Page builder</li>
                            <li class="text-primary">Mega menu</li>
                            <li class="text-primary">Multi language</li>
                            <li class="text-primary">Advanced SEO</li>
                            <li class="text-primary">Ecommerce</li>
                          </ul>
                        </div>
                      </div>
                    </span>
                  </a>
                </div>
                <div data-v-menu-item class="nav-item" data-v-class-if-dropdown="category.children > 0">
                  <a class="dropdown-item" href="https://github.com/givanz/VvvebJs/wiki" data-v-class-if-active="category.active" data-v-menu-item-url>
                    <span data-v-menu-item-name data-v-if-not="category.type = 'text'">Developer Documentation</span>
                    <span data-v-menu-item-content></span>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown" data-v-menu-item>
              <a class="nav-link dropdown-toggle" href="https://blog.vvveb.com" data-v-menu-item-url>
                <span data-v-menu-item-name>Blog</span>
              </a>

              <div class="dropdown-menu" data-v-menu-item-recursive>
                <div data-v-menu-item class="nav-item" data-v-class-if-dropdown="category.children > 0">
                  <a class="dropdown-item" href="https://github.com/givanz/VvvebJs/wiki" data-v-menu-item-url>
                    <span data-v-menu-item-name data-v-if-not="category.type = 'text'">User Documentation</span>
                    <span data-v-menu-item-content></span>
                  </a>
                </div>
                <div data-v-menu-item class="nav-item" data-v-class-if-dropdown="category.children > 0">
                  <a class="dropdown-item" href="https://github.com/givanz/VvvebJs/wiki" data-v-menu-item-url>
                    <span data-v-menu-item-name data-v-if-not="category.type = 'text'">Developer Documentation</span>
                    <span data-v-menu-item-content></span>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item" data-v-menu-item>
              <a class="nav-link" href="https://www.vvveb.com/page/contact" data-v-menu-item-url>
                <span data-v-menu-item-name>Contact</span>
              </a>
            </li>
            <li class="nav-item" data-v-menu-item>
              <a class="nav-link" href="https://www.vvveb.com" data-v-menu-item-url>
                <span data-v-menu-item-name>About us</span>
              </a>
            </li>
            <li class="nav-toggle">
              <!-- User Login Info -->
              <div class="dropdown nav-item">
                <a class="dropdown-toggle nav-link " href role="button" id="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false" data-v-url="user/index">
                  <!-- <img src="img/user.svg" loading="lazy" width="20" alt> -->
                  <i class="la la-lg la-user"></i>
                  <span class="visually-hidden">User</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end login-box user-box p-4" aria-labelledby="user-dropdown">

                  <div data-v-component-user>

                    <div class="notifications" data-v-notifications>

                      <div class="alert alert-danger d-flex alert-dismissable" role="alert" data-v-notification-error data-v-type="login">

                        <div class="icon align-middle me-2">
                          <i class="align-middle la la-2x lh-1 la-exclamation-triangle"></i>
                        </div>

                        <div class="flex-grow-1 align-self-center text-small">
                          <div>
                            <div data-v-notification-text>
                              This is a placeholder for a notification message.
                            </div>
                          </div>
                        </div>


                        <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">
                            <!-- <i class="la la-times"></i> -->
                          </span>
                        </button>
                      </div>

                      <div class="alert alert-success d-flex  alert-dismissable d-flex" role="alert" data-v-notification-success data-v-type="login">

                        <div class="icon align-middle me-2">
                          <i class="align-middle la la-2x lh-1 la-check-circle"></i>
                        </div>

                        <div class="flex-grow-1 align-self-center align-middle" data-v-notification-text>
                          This is a placeholder for a success message.
                        </div>

                        <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">
                            <!-- <i class="la la-times"></i> -->
                          </span>
                        </button>
                      </div>

                      <div class="alert alert-primary d-flex alert-dismissable d-flex" role="alert" data-v-notification-info data-v-type="login">

                        <div class="icon align-middle me-2">
                          <i class="align-middle la la-2x lh-1  la-info-circle"></i>
                        </div>

                        <div class="flex-grow-1 align-self-center" data-v-notification-text>
                          This is a placeholder for a info message.
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">
                            <!-- <i class="la la-times"></i> -->
                          </span>
                        </button>
                      </div>

                    </div>

                    <form action method="post" enctype="multipart/form-data" data-v-url="user/login/index" data-v-vvveb-action="login" data-v-vvveb-on="submit" class="login-form">

                      <input type="hidden" name="csrf" data-v-csrf>

                      <div class="login-form" data-v-if-not="component.user_id">

                        <div class="mb-3">
                          <label class="form-label" for="input-email">E-Mail Address</label>
                          <input type="email" name="email" value placeholder="E-Mail Address" id="user-email" class="form-control" data-v-user-email required>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="input-password">Password</label>

                          <div class="input-group">
                            <input type="password" minlength="4" autocorrect="off" autocomplete="current-password" class="form-control" placeholder="Password" id="user-password" name="password" value="" aria-label="Password" required>
                            <button class="btn px-3 border border-start-0" type="button" onclick="togglePasswordInput(this, 'user-password')">
                              <i class="la la-eye-slash"></i>
                            </button>
                          </div>
                        </div>

                        <button type="submit" value="Login" class="btn btn-primary py-2 btn-login w-100">

                          <span class="loading d-none">
                            <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true">
                            </span>
                            <span>Authenticating</span>...
                          </span>

                          <span class="button-text">
                            Login <i class="la la-arrow-right ms-2"></i>
                          </span>

                        </button>
                        <div class="my-2"></div>
                        <a href="/user/reset" data-v-url="user/reset/index" class="my-2">Forgot your password?</a>

                        <div class="my-2"></div>
                        <!--
		<a>
			<span class="btn btn-secondary btn-sm">
				  <i class="lab la-google la-lg"></i>
			</span>
		</a>
		<a>
			<span class="btn btn-secondary btn-sm">
			  <i class="lab la-facebook la-lg"></i>
			</span>
		</a> -->
                        <hr>
                        <span>Don’t have an account?</span>
                        <br>
                        <a href="/user/signup" data-v-url="user/signup/index">Register Account</a>
                        <span class="text-body-tertiary">|</span>
                        <a href="/user/login" data-v-url="user/login/index">Login</a>

                      </div>


                      <div class="user-form" data-v-if="component.user_id">
                        <div class="text-center">Welcome <b data-v-user-first_name data-filter-capitalize>John</b>
                          <b data-v-user-last_name data-filter-capitalize>Doe</b>
                        </div>

                        <div class="dropdown-divider opacity-50 my-3"></div>

                        <ul class="m-3 list-unstyled">
                          <li>
                            <a href="user" data-v-url="user/index">
                              <i class="la la-user la-lg text-muted m-1"></i>
                              <span>My account</span>
                            </a>
                          </li>
                          <li>
                            <a href="user/comments" data-v-url="user/comments/index">
                              <i class="la la-comment la-lg text-muted m-1"></i>
                              <span>Comments</span>
                            </a>
                          </li>
                          <li>
                            <a href="user/orders" data-v-url="user/orders/index">
                              <i class="la la-shopping-bag la-lg text-muted m-1"></i>
                              <span>Orders</span>
                            </a>
                          </li>
                          <li>
                            <a href="user/downloads" data-v-url="user/downloads/index">
                              <i class="la la-hand-holding-heart la-lg text-muted m-1"></i>
                              <span>Downloads</span>
                            </a>
                          </li>
                          <li>
                            <a href="user/wishlist" data-v-url="user/wishlist/index">
                              <i class="la la-download la-lg text-muted m-1"></i>
                              <span>Wishlist</span>
                            </a>
                          </li>
                          <li>
                            <a href="user/profile" data-v-url="user/profile/index">
                              <i class="la la-cogs la-lg text-muted m-1"></i>
                              <span>Profile</span>
                            </a>
                          </li>
                        </ul>


                        <input type="hidden" name="logout">

                        <button type="submit" value="logout" class="btn btn-sm btn-primary w-100">

                          <span class="loading d-none">
                            <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true">
                            </span>
                            <span>Loading ...</span>...
                          </span>

                          <span class="button-text">
                            <i class="la la-sign-out-alt la-lg m-1"></i>
                            <span>Log out</span>
                            </a>
                          </span>

                        </button>
                      </div>
                    </form>


                  </div>
                </div>
              </div>

            </li>
            <li class="nav-toggle">
              <!-- Cart Area -->
              <div class="dropdown nav-item mini-cart" data-v-component-cart>

                <a class="dropdown-toggle cart-info nav-link " href role="button" id="cart-dropdown" data-bs-toggle="dropdown" aria-expanded="false" data-v-url="cart/cart/index">
                  <!-- <img src="img/bag.svg" width="20" alt> -->
                  <i class="la la-lg la-shopping-bag"></i>
                  <span class="visually-hidden">Cart</span>
                  <strong class="text-top text-bold" data-v-total_items data-v-if="cart.total_items > 0"></strong>
                </a>


                <div class="dropdown-menu dropdown-menu-end cart-box" aria-labelledby="cart-dropdown">

                  <div>
                    <div class="table-responsive">
                      <table class="table cart-table align-middle mb-0">
                        <tbody>


                          <tr data-v-cart-product>
                            <td class="text-center">
                              <a href="#40" data-v-cart-product-url>
                                <img src="img/demo/product.webp" alt="Product name" class="img-rounded" loading="lazy" data-v-cart-product-image width=50>
                              </a>
                            </td>
                            <td class="text-start">
                              <a href="#40" class="d-block" data-v-cart-product-url data-v-cart-product-name>
                                Product name
                              </a>

                              <span data-v-cart-product-quantity>1</span>
                              <i class="la la-times text-muted"></i>
                              <span data-v-cart-product-price_tax_formatted>$123.20</span>

                              <div class="option" data-v-if="product.option">
                                <div class="" data-v-product-option>
                                  <span data-v-product-option-option>Color</span>: <span data-v-product-option-name>Red</span>
                                  <span data-v-if="value.price">(<span data-v-product-option-price></span>)</span>
                                </div>
                                <div class="" data-v-product-option>
                                  <span data-v-product-option-option>Size</span>: <span data-v-product-option-name>XL</span>
                                  <span data-v-if="value.price">(<span data-v-product-option-price></span>)</span>
                                </div>
                                <div class="" data-v-product-option>
                                  <span data-v-product-option-option>Material</span>: <span data-v-product-option-name>Wool</span>
                                  <span data-v-if="value.price">(<span data-v-product-option-price></span>)</span>
                                </div>
                              </div>

                              <div class="subscription" data-v-if="product.subscription">
                                <span>Subscription plan</span>:
                                <span data-v-cart-product-subscription_name>Subscription plan</span>
                              </div>
                            </td>
                            <td class="text-end">
                              <a class="btn btn-outline-secondary btn-sm border-0" data-v-vvveb-action="removeFromCart" data-v-cart-product-remove-url>
                                <i class="la la-times"></i>
                              </a>
                            </td>
                          </tr>
                          <tr data-v-cart-product>
                            <td class="text-center">
                              <a href="#40" data-v-cart-product-url>
                                <img src="img/demo/product.webp" alt="Product name" class="img-rounded" loading="lazy" data-v-cart-product-image width=50>
                              </a>
                            </td>
                            <td class="text-start">
                              <a href="#40" class="d-block" data-v-cart-product-url data-v-cart-product-name>
                                Product name
                              </a>

                              <span data-v-cart-product-quantity>1</span>
                              <i class="la la-times text-muted"></i>
                              <span data-v-cart-product-price_tax_formatted>$123.20</span>


                            </td>
                            <td class="text-end">
                              <a class="btn btn-outline-secondary btn-sm border-0" data-v-vvveb-action="removeFromCart" data-v-cart-product-remove-url>
                                <i class="la la-times"></i>
                              </a>
                            </td>
                          </tr>
                          <tr data-v-if-not="cart.total_items">
                            <td colspan="100">
                              <div class="d-flex  p-2">
                                <div class="text-center p-2 opacity-75">
                                  <!-- <img src="img/bag.svg" width="20" alt> -->
                                  <i class="la la-2x la-shopping-bag"></i>
                                </div>
                                <div class="p-2">
                                  <strong>Empty cart</strong>
                                  <br>
                                  <span class="text-muted">No products added yet!</span>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>

                      </table>
                    </div>

                    <div class="p-3 pt-0 border-top" data-v-if="cart.total_items">
                      <div class="table-responsive mb-2" data-v-cart-totals>
                        <table class="table mb-0 cart-table cart-total" cellspacing="0">
                          <tfoot>
                            <tr data-v-cart-total>
                              <td colspan="5" class="text-end">
                                <small data-v-cart-total-title>Sub-Total</small>:
                              </td>
                              <td class="text-end">
                                <span data-v-cart-total-text data-v-if="total.text"> - </span>
                                <span data-v-cart-total-value_formatted data-v-if="total.value > 0">$101.00</span>
                              </td>
                            </tr>
                            <tr data-v-cart-total>
                              <td colspan="5" class="text-end">
                                <small>Eco Tax (2.00):</small>
                              </td>
                              <td class="text-end">$2.00</td>
                            </tr>
                            <tr data-v-cart-total>
                              <td colspan="5" class="text-end">
                                <small>VAT (19%):</small>
                              </td>
                              <td class="text-end">$20.20</td>
                            </tr>
                            <tr data-v-cart-total>
                              <td colspan="5" class="text-end">
                                <small>Total:</small>
                              </td>
                              <td class="text-end">$123.20</td>
                            </tr>
                            <tr>
                              <td colspan="5" class="text-end">Total:</td>
                              <td class="text-end" data-v-grand-total_formatted>$0</td>
                            </tr>
                          </tfoot>

                        </table>
                      </div>

                    </div>

                    <div class="row mt-2 g-2 px-3 pb-2" data-v-if="cart.total_items">
                      <div class="col-6">
                        <a href="" class="btn btn-light btn-sm border w-100" data-v-url="cart/cart/index" data-url>
                          <i class="la la-shopping-cart la-lg"></i>
                          <span>View cart</span>
                        </a>
                      </div>
                      <div class="col-6">
                        <a href="" class="btn btn-primary btn-sm w-100" data-v-url="checkout/checkout/index">
                          <span>Checkout</span>
                          <i class="la la-arrow-right la-lg"></i>
                        </a>
                      </div>
                    </div>


                  </div>
                </div>

              </div>

            </li>
          </ul>

          <button class="btn btn-outline-secondary border-0" type="submit" title="Search" data-bs-toggle="modal" data-bs-target="#searchModal">
            <div class="la-flip-horizontal">
              <i class="la la-search la-lg" aria-hidden="true"></i>
            </div>
          </button>

          <!--
	<div class="search-area toggle-hover">
		<form action="/search" method="get" data-v-action="/search">
			<input type="hidden" name="route" value="search">
			<div class="input-group">
				<input type="search" name="search" class="form-control" id="headerSearch" placeholder="Type for search" data-v-vvveb-action="search" data-v-vvveb-on="keyup">
				<button class="btn border-0" type="submit" title="Search">
					<div class="la-flip-horizontal">
						<i class="la la-search la-lg" aria-hidden="true"></i>
					</div>
				</button>
			</div>			  
		</form>
	</div>
-->
        </div>


        <!--
			  <div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ms-auto">
				  <li class="nav-item">
					<a class="nav-link" href="#features">Features <span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="https://themes.vvveb.com">Themes</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="https://plugins.vvveb.com">Plugins</a>
				  </li>
				  <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Resources</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
					  <a class="dropdown-item" target="_blank"  href="https://github.com/givanz/VvvebJs/wiki">User Documentation</a>
					  <a class="dropdown-item" target="_blank"  href="https://github.com/givanz/VvvebJs/wiki">Developer Documentation</a>
					</div>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" target="_blank" href="https://github.com/givanz/VvvebJs">Github</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="contact.html">Contact</a>
				  </li>
				  <li class="nav-item active">
					<a class="nav-link" href="https://vvveb.com/download.php">Download for free</a>
				  </li>			  
				</ul>
			  </div>
			  -->
      </div>

    </div>

  </nav>


  <header class="hero-3" aria-label="hero-3">

    <div class="container">
      <div>
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-lg-12">
            <h1 class="heading mb-3 display-4" data-aos="fade-up" data-aos-delay="100">The next generation website builder</h1>
            <div class="col-lg-8 mx-auto">
              <h2 class="h3" data-aos="fade-up" data-aos-delay="100">Powerful and easy to use drag and drop website builder for blogs, presentation or ecommerce stores.</h2>
            </div>

            <div class="buttons" data-aos="fade-up" data-aos-delay="300">
              <a href="https://www.vvveb.com" class="btn btn-primary">
                <span>&#9889;</span>
                <span>Free Download</span>
                <b>›</b>
              </a>
              <a href="https://demo.vvveb.com" class="btn btn-white">Live Demo</a>
            </div>


          </div>
        </div>
      </div>
    </div>

    <div class="separator bottom">

      <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 41" width="100%" height="100" fill="var(--bs-body-bg)" preserveAspectRatio="none">
        <defs></defs>
        <title>rough-edges-bottom</title>
        <path d="M0,185l125-26,33,17,58-12s54,19,55,19,50-11,50-11l56,6,60-8,63,15v15H0Z" transform="translate(0 -159)" />
      </svg>

    </div>
    <!--
   <div class="separator top">
		
		<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 41" width="100%" height="200" preserveAspectRatio="none"><defs><style>.cls-1{fill:var(--bs-body-bg);}</style></defs><title>rough-edges-bottom</title><path class="cls-1" d="M0,185l125-26,33,17,58-12s54,19,55,19,50-11,50-11l56,6,60-8,63,15v15H0Z" transform="translate(0 -159)"/></svg>
		
    </div>
-->
    <div class="overlay">
    </div>

    <div class="background-container">

      <img src="img/demo/hero-3.webp" alt="Hero background">

    </div>

  </header>


  <section class="showcase-3" aria-label="showcase-3">
    <div class="container">
      <div class="row g-1 justify-content-center">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="feature" data-aos="fade-up" data-aos-delay="100">
            <div class="font-container text-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="72" height="72" color="#1064ea" fill="#1064ea">
                <polyline points="336 176 225.2 304 176 255.8" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline>
                <path d="M463.1,112.37C373.68,96.33,336.71,84.45,256,48,175.29,84.45,138.32,96.33,48.9,112.37,32.7,369.13,240.58,457.79,256,464,271.42,457.79,479.3,369.13,463.1,112.37Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
              </svg>
            </div>
            <h3>
              Better Security
            </h3>
            <p class="text-center">Vvveb is 100% safe against sql injections, a vulerability that affects most CMS.</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="feature" data-aos="fade-up" data-aos-delay="200">
            <div class="font-container text-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="icons" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="72" height="72" color="#1064ea" fill="#1064ea">
                <path d="M419.1,337.45a3.94,3.94,0,0,0-6.1,0c-10.5,12.4-45,46.55-45,77.66,0,27,21.5,48.89,48,48.89h0c26.5,0,48-22,48-48.89C464,384,429.7,349.85,419.1,337.45Z" style="fill:none;stroke:currentColor;stroke-miterlimit:10;stroke-width:32px"></path>
                <path d="M387,287.9,155.61,58.36a36,36,0,0,0-51,0l-5.15,5.15a36,36,0,0,0,0,51l52.89,52.89,57-57L56.33,263.2a28,28,0,0,0,.3,40l131.2,126a28.05,28.05,0,0,0,38.9-.1c37.8-36.6,118.3-114.5,126.7-122.9,5.8-5.8,18.2-7.1,28.7-7.1h.3A6.53,6.53,0,0,0,387,287.9Z" style="fill:none;stroke:currentColor;stroke-miterlimit:10;stroke-width:32px"></path>
              </svg>
            </div>
            <h3>
              Unlimited customization
            </h3>
            <p class="text-center">Vvveb uses only html for templating for maximum flexibility.</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="feature" data-aos="fade-up" data-aos-delay="300">
            <div class="font-container text-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="icons" width="72" height="72" color="#1064ea" fill="#1064ea" stroke-width="28">
                <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" fill-rule="evenodd" d="M80,176a16,16,0,0,0-16,16V408c0,30.24,25.76,56,56,56H392c30.24,0,56-24.51,56-54.75V192a16,16,0,0,0-16-16Z"></path>
                <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" fill-rule="evenodd" d="M160,176V144a96,96,0,0,1,96-96h0a96,96,0,0,1,96,96v32"></path>
              </svg>
            </div>
            <h3>
              Advanced Ecommerce
            </h3>
            <p class="text-center">Vvveb is a full featured ecommerce platform with advanced functionality.</p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
          <div class="feature" data-aos="fade-up" data-aos-delay="400">
            <div class="font-container text-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="72" height="72" color="#1064ea" fill="#1064ea">
                <path d="M80,464V68.14a8,8,0,0,1,4-6.9C91.81,56.66,112.92,48,160,48c64,0,145,48,192,48a199.53,199.53,0,0,0,77.23-15.77A2,2,0,0,1,432,82.08V301.44a4,4,0,0,1-2.39,3.65C421.37,308.7,392.33,320,352,320c-48,0-128-32-192-32s-80,16-80,16" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path>
              </svg>
            </div>
            <h3>
              Full Localization
            </h3>
            <p class="text-center">Publish content in multiple languages or sell in different currencies.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="features-1 bg-alternate" aria-label="features-1">
    <div class="container">
      <div class="row wrap">
        <div class="col-md-7 align-self-center">
          <div class="max-box">
            <span class="badge  bg-success rounded-pill px-3">new</span>
            <h2 class="fw-medium">Code editor with syntax highglighting that updates in real time</h2>
            <div class="mt-4">
              <p>The html for sections blocks and components and this template are built using Bootstrap.</p>
              <p>Use any of the hundreds fonts from google fonts for your design.</p>
              <p>Powerful and easy to use drag and drop builder for blogs, websites or ecommerce stores.</p>
            </div>
            <a tile="Code editor features" role="button">
              <span>Learn More</span>
              <i class="la la-long-arrow-alt-right ms-1"></i>
            </a>
          </div>
        </div>
        <div class="col-md-5">
          <img src="img/illustrations.co/118-macbook.svg" alt="Macbook" loading="lazy" class="img-fluid" />
        </div>
      </div>
      <div class="row wrap">
        <div class="col-md-5">
          <img src="img/illustrations.co/day95-app-development.svg" alt="App development" loading="lazy" class="img-fluid" />
        </div>
        <div class="col-md-7 align-self-center">
          <div class="max-box ms-auto">
            <span class="badge  bg-success rounded-pill px-3">on sale</span>
            <h2 class="fw-medium">Intuitive building with simple drag and drop for sections, components and blocks</h2>
            <div class="mt-4">
              <p>The html for sections blocks and components and this template are built using Bootstrap.</p>
              <p>Use any of the hundreds fonts from google fonts for your design.</p>
              <p>Powerful and easy to use drag and drop builder for blogs, websites or ecommerce stores.</p>
            </div>
            <a title="Drag and drop" role="button">
              <span>Learn More</span>
              <i class="la la-long-arrow-alt-right ms-1"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="products-1" aria-label="latest-products-1">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading text-center">
            <h2 class="text-center display-6 mb-1 fw-bold">Popular Products</h2>
            <p class="lead text-center text-muted mb-4">Best quality at the lowest price.</p>
          </div>
        </div>
      </div>
    </div>


    <div class="container" data-v-component-products="popular" data-v-limit="8" data-v-variant_price="true" data-v-image_size="medium">
      <div class="row">



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



        <div class="col-md-3" data-v-product>

          <article class="single-product-wrapper">
            <!-- Product Image -->
            <a href="product/product.html" data-v-product-url> </a>
            <div class="product-image">
              <a href="product/product.html" data-v-product-url>

                <img src="img/demo/product.webp" loading="lazy" data-v-product-alt alt="" data-v-size="thumb" loading="lazy" data-v-product-image />

                <!-- Hover Thumb -->
                <img class="hover-img" src="img/demo/product-2.webp" loading="lazy" data-v-product-alt alt="" loading="lazy" data-v-size="thumb" data-v-product-image-1 />
              </a>

              <!-- Favourite -->
              <div class="product-favourite">
                <a href="product/product.html" class="la la-heart" data-v-vvveb-action="addToWishlist" data-v-product-add_wishlist_url>
                  <span></span>
                </a>
              </div>

              <!-- Compare -->
              <div class="product-compare">
                <a href="product/product.html" class="la la-random" data-v-vvveb-action="addToCompare" data-v-product-add_compare_url>
                  <span></span>
                </a>
              </div>

              <div class="badges">
                <span class="badge text-bg-secondary" data-v-if="prod.old_price > 0">Sale</span>
              </div>
            </div>

            <!-- Product Description -->
            <div class="product-content">

              <a href="product/product.html" class="text-body" data-v-product-url>
                <span data-v-product-name>Product 8</span>
              </a>

              <p data-v-if="prod.min_price > 0">
                <span class="text-muted small">From</span>
                <span class="product-price" data-v-product-min_price_tax_formatted>100.0000</span>
              </p>

              <div data-v-if-not="prod.min_price">
                <p class="product-price old-price" data-v-if="prod.old_price > 0" data-v-product-old_price_tax_formatted>100.0000</p>
                <p class="product-price" data-v-if="prod.price > 0" data-v-product-price_tax_formatted>100.0000</p>
              </div>

              <!-- Hover Content -->
              <div class="hover-content" data-v-if="prod.price > 0 && !prod.has_variants">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                  <input type="hidden" name="product_id" value="" data-v-product-product_id />

                  <a href="javascript:void();" class="btn btn-secondary btn-sm w-100 disabled" data-v-if="prod.stock_quantity < 1">
                    <span class="button-text">
                      Out of stock
                    </span>
                  </a>

                  <a href="" class="btn btn-primary btn-sm w-100" data-v-if="prod.stock_quantity > 0" data-v-product-add_cart_url data-v-vvveb-action="addToCart" data-product_id="1">

                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"> </span>
                      <span>Add to cart</span>
                    </span>

                    <span class="button-text">
                      <i class="la la-lg la-shopping-bag"></i>
                      <span>Add to cart</span>
                    </span>

                  </a>
                </div>
              </div>

            </div>
          </article>


        </div>



      </div>
    </div>
  </section>


  <section class="testimonials-1 bg-alternate" aria-label="testimonials-1">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-md-7 text-center">
          <h2 class="text-center display-6 mb-1 fw-bold">Some of our users</h2>
          <p class="lead text-center text-muted mb-4">Hear what our users have to say</p>
        </div>
      </div>

      <div class="row text-center">


        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="rounded border testimonial">

            <svg enable-background="new 0 0 33 25" version="1.1" viewBox="0 0 33 25" width="42" height="42" fill="#0d6efd" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g>
                <path d="M18.006,6.538c0-1.973,0.662-3.554,1.988-4.743c1.326-1.19,2.977-1.785,4.947-1.785   c2.517,0,4.488,0.799,5.916,2.397C32.285,4.004,33,6.13,33,8.782c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.061,4.743c-1.188,1.258-2.43,2.244-3.723,2.958c-1.291,0.714-2.413,1.239-3.365,1.581l-3.265-5.508   c1.36-0.545,2.517-1.412,3.468-2.602c0.953-1.19,1.496-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.724-1.786   C18.566,10.09,18.006,8.509,18.006,6.538z M0.359,6.538c0-1.973,0.663-3.554,1.989-4.743C3.674,0.604,5.324,0.01,7.295,0.01   c2.518,0,4.488,0.799,5.916,2.397c1.429,1.597,2.143,3.723,2.143,6.375c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.06,4.743c-1.188,1.258-2.431,2.244-3.724,2.958C6.004,24.133,4.883,24.658,3.93,25l-3.264-5.508   c1.36-0.545,2.516-1.412,3.467-2.602c0.953-1.19,1.497-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.723-1.786   C0.92,10.09,0.359,8.509,0.359,6.538z"></path>
              </g>
            </svg>

            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui.</p>

            <img src="img/sections/team/1.webp" alt="team" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow border rounded-3" loading="lazy">

            <h3 class="mb-0">John Doe</h3>
            <span class="small text-uppercase text-muted">Company Inc.</span>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="rounded border testimonial">

            <svg enable-background="new 0 0 33 25" version="1.1" viewBox="0 0 33 25" width="42" height="42" fill="#0d6efd" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g>
                <path d="M18.006,6.538c0-1.973,0.662-3.554,1.988-4.743c1.326-1.19,2.977-1.785,4.947-1.785   c2.517,0,4.488,0.799,5.916,2.397C32.285,4.004,33,6.13,33,8.782c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.061,4.743c-1.188,1.258-2.43,2.244-3.723,2.958c-1.291,0.714-2.413,1.239-3.365,1.581l-3.265-5.508   c1.36-0.545,2.517-1.412,3.468-2.602c0.953-1.19,1.496-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.724-1.786   C18.566,10.09,18.006,8.509,18.006,6.538z M0.359,6.538c0-1.973,0.663-3.554,1.989-4.743C3.674,0.604,5.324,0.01,7.295,0.01   c2.518,0,4.488,0.799,5.916,2.397c1.429,1.597,2.143,3.723,2.143,6.375c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.06,4.743c-1.188,1.258-2.431,2.244-3.724,2.958C6.004,24.133,4.883,24.658,3.93,25l-3.264-5.508   c1.36-0.545,2.516-1.412,3.467-2.602c0.953-1.19,1.497-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.723-1.786   C0.92,10.09,0.359,8.509,0.359,6.538z"></path>
              </g>
            </svg>


            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui.</p>
            <img src="img/sections/team/2.webp" alt="team" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow border rounded-3" loading="lazy">

            <h3 class="mb-0">Jane Doe</h3>
            <span class="small text-uppercase text-muted">Company Inc.</span>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="rounded border testimonial">

            <svg enable-background="new 0 0 33 25" version="1.1" viewBox="0 0 33 25" width="42" height="42" fill="#0d6efd" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g>
                <path d="M18.006,6.538c0-1.973,0.662-3.554,1.988-4.743c1.326-1.19,2.977-1.785,4.947-1.785   c2.517,0,4.488,0.799,5.916,2.397C32.285,4.004,33,6.13,33,8.782c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.061,4.743c-1.188,1.258-2.43,2.244-3.723,2.958c-1.291,0.714-2.413,1.239-3.365,1.581l-3.265-5.508   c1.36-0.545,2.517-1.412,3.468-2.602c0.953-1.19,1.496-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.724-1.786   C18.566,10.09,18.006,8.509,18.006,6.538z M0.359,6.538c0-1.973,0.663-3.554,1.989-4.743C3.674,0.604,5.324,0.01,7.295,0.01   c2.518,0,4.488,0.799,5.916,2.397c1.429,1.597,2.143,3.723,2.143,6.375c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.06,4.743c-1.188,1.258-2.431,2.244-3.724,2.958C6.004,24.133,4.883,24.658,3.93,25l-3.264-5.508   c1.36-0.545,2.516-1.412,3.467-2.602c0.953-1.19,1.497-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.723-1.786   C0.92,10.09,0.359,8.509,0.359,6.538z"></path>
              </g>
            </svg>


            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui.</p>

            <img src="img/sections/team/3.webp" alt="team" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow border rounded-3" loading="lazy">

            <h3 class="mb-0">John Doe</h3>
            <span class="small text-uppercase text-muted">Company Inc.</span>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="rounded border testimonial">

            <svg enable-background="new 0 0 33 25" version="1.1" viewBox="0 0 33 25" width="42" height="42" fill="#0d6efd" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g>
                <path d="M18.006,6.538c0-1.973,0.662-3.554,1.988-4.743c1.326-1.19,2.977-1.785,4.947-1.785   c2.517,0,4.488,0.799,5.916,2.397C32.285,4.004,33,6.13,33,8.782c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.061,4.743c-1.188,1.258-2.43,2.244-3.723,2.958c-1.291,0.714-2.413,1.239-3.365,1.581l-3.265-5.508   c1.36-0.545,2.517-1.412,3.468-2.602c0.953-1.19,1.496-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.724-1.786   C18.566,10.09,18.006,8.509,18.006,6.538z M0.359,6.538c0-1.973,0.663-3.554,1.989-4.743C3.674,0.604,5.324,0.01,7.295,0.01   c2.518,0,4.488,0.799,5.916,2.397c1.429,1.597,2.143,3.723,2.143,6.375c0,2.719-0.424,5.032-1.275,6.936   c-0.85,1.903-1.869,3.483-3.06,4.743c-1.188,1.258-2.431,2.244-3.724,2.958C6.004,24.133,4.883,24.658,3.93,25l-3.264-5.508   c1.36-0.545,2.516-1.412,3.467-2.602c0.953-1.19,1.497-2.465,1.633-3.824c-1.359,0-2.602-0.597-3.723-1.786   C0.92,10.09,0.359,8.509,0.359,6.538z"></path>
              </g>
            </svg>


            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui.</p>

            <img src="img/sections/team/4.webp" alt="team" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow border rounded-3" loading="lazy">

            <h3 class="mb-0">Jane Doe</h3>
            <span class="small text-uppercase text-muted">Company Inc.</span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="pricing-table-3" aria-label="pricing-table-3">
    <div class="container">
      <div class="row justify-content-center pb-2">
        <div class="col-md-7 heading-section text-center">
          <h2 class="text-center display-6 mb-1 fw-bold">Choose your plan</h2>
          <p class="lead text-center text-muted mb-4">14-day free trial no credit card required.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="price-col shadow-sm border rounded-3">
            <div class="img">
              <img src="img/illustrations.co/104-dumbbell.svg" alt="104-dumbbell" loading="lazy" class="img-fluid" />
            </div>
            <div class="text-center p-4">
              <span class="excerpt d-block">Personal</span>
              <span class="price">
                <sup>$</sup>
                <span class="number">49</span>
                <sub>/mos</sub>
              </span>
              <ul class="pricing-text mb-5">
                <li>
                  <span class="la la-check me-2"></span>5 Dog Walk
                </li>
                <li>
                  <span class="la la-check me-2"></span>3 Vet Visit
                </li>
                <li>
                  <span class="la la-check me-2"></span>3 Pet Spa
                </li>
                <li>
                  <span class="la la-check me-2"></span>Free Support
                </li>
              </ul>
              <a href="/page/pricing" class="btn btn-primary">
                <span>Get Started</span>
                <i class="la la-long-arrow-alt-right ms-1"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="price-col shadow-sm border rounded-3">
            <div class="img">
              <img src="img/illustrations.co/107-healthy.svg" alt="107-healthy" loading="lazy" class="img-fluid" />
            </div>
            <div class="text-center p-4">
              <span class="excerpt d-block">Business</span>
              <span class="price">
                <sup>$</sup>
                <span class="number">79</span>
                <sub>/mos</sub>
              </span>
              <ul class="pricing-text mb-5">
                <li>
                  <span class="la la-check me-2"></span>5 Dog Walk
                </li>
                <li>
                  <span class="la la-check me-2"></span>3 Vet Visit
                </li>
                <li>
                  <span class="la la-check me-2"></span>3 Pet Spa
                </li>
                <li>
                  <span class="la la-check me-2"></span>Free Support
                </li>
              </ul>
              <a href="/page/pricing" class="btn btn-primary">
                <span>Get Started</span>
                <i class="la la-long-arrow-alt-right ms-1"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="price-col shadow-sm border rounded-3">
            <div class="img">
              <img src="img/illustrations.co/126-namaste-no-hand-shake.svg" alt="126-namaste-no-hand-shake" loading="lazy" class="img-fluid" />
            </div>
            <div class="text-center p-4">
              <span class="excerpt d-block">Ultimate</span>
              <span class="price">
                <sup>$</sup>
                <span class="number">109</span>
                <sub>/mos</sub>
              </span>
              <ul class="pricing-text mb-5">
                <li>
                  <span class="la la-check me-2"></span>5 Dog Walk
                </li>
                <li>
                  <span class="la la-check me-2"></span>3 Vet Visit
                </li>
                <li>
                  <span class="la la-check me-2"></span>3 Pet Spa
                </li>
                <li>
                  <span class="la la-check me-2"></span>Free Support
                </li>
              </ul>
              <a href="/page/pricing" class="btn btn-primary">
                <span>Get Started</span>
                <i class="la la-long-arrow-alt-right ms-1"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="posts-1" aria-label="latest-post-1">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading text-center">
            <h2 class="text-center display-6 mb-1 fw-bold">Latest Posts</h2>
            <p class="lead text-center text-muted mb-4">Fresh updates from the industry.</p>
          </div>
        </div>
      </div>
    </div>



    <div class="container" data-v-component-posts="posts-1" data-v-limit="3" data-v-image_size="medium">
      <div class="row">



        <div class="col-12 col-lg-4 mb-2" data-v-post>

          <article class="card h-100 shadow-sm">
            <div class="card-img-top" data-v-if="post.image">
              <img src="img/demo/video-1.webp" alt="" class="w-100" loading="lazy" data-v-size="thumb" data-v-post-image>
            </div>
            <!-- Post Title -->
            <a data-v-post-url>
              <div class="card-body p-4">
                <div class="post-title card-title">
                  <h3 data-v-post-name>
                    Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada
                  </h3>
                </div>
                <!-- Hover Content -->
                <p class="card-text text-muted" data-v-post-excerpt>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.</p>
                <button title="{$post.name}" role="button" class="btn btn-link px-0">
                  <span>Read more</span>
                  <i class="la la-angle-right"></i>
                </button>
              </div>
            </a>
          </article>


        </div>



        <div class="col-12 col-lg-4 mb-2" data-v-post>

          <article class="card h-100 shadow-sm">
            <div class="card-img-top" data-v-if="post.image">
              <img src="img/demo/video-1.webp" alt="" class="w-100" loading="lazy" data-v-size="thumb" data-v-post-image>
            </div>
            <!-- Post Title -->
            <a data-v-post-url>
              <div class="card-body p-4">
                <div class="post-title card-title">
                  <h3 data-v-post-name>
                    Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada
                  </h3>
                </div>
                <!-- Hover Content -->
                <p class="card-text text-muted" data-v-post-excerpt>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.</p>
                <button title="{$post.name}" role="button" class="btn btn-link px-0">
                  <span>Read more</span>
                  <i class="la la-angle-right"></i>
                </button>
              </div>
            </a>
          </article>


        </div>



        <div class="col-12 col-lg-4 mb-2" data-v-post>

          <article class="card h-100 shadow-sm">
            <div class="card-img-top" data-v-if="post.image">
              <img src="img/demo/video-1.webp" alt="" class="w-100" loading="lazy" data-v-size="thumb" data-v-post-image>
            </div>
            <!-- Post Title -->
            <a data-v-post-url>
              <div class="card-body p-4">
                <div class="post-title card-title">
                  <h3 data-v-post-name>
                    Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada
                  </h3>
                </div>
                <!-- Hover Content -->
                <p class="card-text text-muted" data-v-post-excerpt>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.</p>
                <button title="{$post.name}" role="button" class="btn btn-link px-0">
                  <span>Read more</span>
                  <i class="la la-angle-right"></i>
                </button>
              </div>
            </a>
          </article>


        </div>



      </div>
    </div>
  </section>


  <section title="contact-form-10" class="contact-form-10 border-top">
    <div class="container">
      <div class="row my-5">
        <div class="col-12 col-md-6 col-lg-5">
          <h2 class="display-6 mb-1 fw-bold mb-4">Contact Us</h2>
          <p class="lead">
            Powerful and easy to use drag and drop website builder for blogs, presentation or ecommerce stores.
          </p>

          <p class="lead">
            The html for sections blocks and components and this template are built using Bootstrap 5.
          </p>

          <div data-v-component-site>
            <p class="mt-5">
              <b>
                <i class="la la-lg la-envelope opacity-50"></i> Email:
              </b>
              <span data-v-if="site.contact-email">
                <a href="mailto:contact@mysite.com" data-v-site-contact-email>
                  <span data-v-site-contact-email>contact@mysite.com</span>
                </a>
              </span>
            </p>
            <p class="">
              <b>
                <i class="la la-lg la-phone opacity-50"></i> Phone:
              </b>
              <a href="tel:5511112377" data-v-site-description-phone-number>
                <span data-v-site-description-phone-number>+55 (111) 123 777</span>
              </a>
            </p>
          </div>
        </div>

        <div class="col-12 col-md-6 ms-auto" data-v-component-plugin-contact-form-form data-v-storage="database" data-v-name="contact-us-home">

          <div class="notifications" data-v-notifications>

            <div class="alert alert-danger d-flex alert-dismissable" role="alert" data-v-notification-error>

              <div class="icon align-middle me-2">
                <i class="align-middle la la-2x lh-1 la-exclamation-triangle"></i>
              </div>

              <div class="flex-grow-1 align-self-center text-small">
                <div>
                  <div data-v-notification-text>
                    This is a placeholder for a notification message.
                  </div>
                </div>
              </div>


              <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <!-- <i class="la la-times"></i> -->
                </span>
              </button>
            </div>

            <div class="alert alert-success d-flex  alert-dismissable d-flex" role="alert" data-v-notification-success>

              <div class="icon align-middle me-2">
                <i class="align-middle la la-2x lh-1 la-check-circle"></i>
              </div>

              <div class="flex-grow-1 align-self-center align-middle" data-v-notification-text>
                This is a placeholder for a success message.
              </div>

              <button type="button" class="btn-close align-middle" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <!-- <i class="la la-times"></i> -->
                </span>
              </button>
            </div>

            <div class="alert alert-primary d-flex alert-dismissable d-flex" role="alert" data-v-notification-info>

              <div class="icon align-middle me-2">
                <i class="align-middle la la-2x lh-1  la-info-circle"></i>
              </div>

              <div class="flex-grow-1 align-self-center" data-v-notification-text>
                This is a placeholder for a info message.
              </div>

              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                  <!-- <i class="la la-times"></i> -->
                </span>
              </button>
            </div>

          </div>
          <div class="border rounded-3 p-4 border-opacity-25 border-light-subtle">
            <form action="" method="post" data-v-vvveb-action="submit" data-selector="[data-v-component-plugin-contact-form-form]" data-v-vvveb-on="submit">
              <input type="hidden" class="form-control" placeholder="First name" name="firstname-empty">
              <input type="hidden" class="form-control" placeholder="Email" name="csrf" data-v-csrf>

              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name" name="firstname" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" name="lastname" required>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col">
                  <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                </div>
              </div>

              <div class="row mt-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col">
                  <textarea class="form-control" name="message" rows="3" placeholder="How can we help?" required></textarea>
                </div>
              </div>


              <!-- if these hidden inputs are filled then ignore, robots -->

              <input type="text" class="form-control d-none" placeholder="Contact form" name="contact-form">

              <input type="text" class="form-control d-none" placeholder="Subject" name="subject-empty">

              <input type="text" class="form-control visually-hidden" placeholder="Last name" name="lastname-empty" tabindex="-1">


              <div class="row mt-4">
                <div class="col">
                  <button type="submit" class="btn btn-primary">
                    <span class="loading d-none">
                      <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true">
                      </span>
                      <span>Submitting</span> ...
                    </span>

                    <span class="button-text">
                      <span>Submit</span>
                      <i class="la la-lg la-envelope opacity-50 ms-2"></i>
                    </span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <footer class="footer-3 bg-dark text-white" title="footer-3" data-v-save-global="index.html,.footer-3" data-bs-theme="dark">
    <div class="container" data-v-component-menu="footer" data-v-slug="main-footer">

      <div class="row" data-v-menu-items>


        <div class="col-md">

          <div data-v-component-site>
            <img src="img/logo-white.png" alt="Site logo dark" loading="lazy" class="logo-default-dark" data-v-site-logo-dark>
            <img src="img/logo.png" alt="Site logo" loading="lazy" class="logo-default" data-v-site-logo>
          </div>

        </div>


        <div class="col-md" data-v-menu-item data-v-if="category.children > 0">
          <div class="h6" data-v-menu-item-name>Vvveb</div>
          <nav data-v-menu-item-recursive>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="https://themes.vvveb.com/" data-v-menu-item-url>
                <span data-v-menu-item-name>Themes</span>
              </a>
            </div>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="https://plugins.vvveb.com/" data-v-menu-item-url>
                <span data-v-menu-item-name>Plugins</span>
              </a>
            </div>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="content/index.html" data-v-menu-item-url>
                <span data-v-menu-item-name>Blog</span>
              </a>
            </div>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="product/index.html" data-v-menu-item-url>
                <span data-v-menu-item-name>Shop</span>
              </a>
            </div>
          </nav>
        </div>

        <div class="col-md" data-v-menu-item data-v-if="category.children > 0">
          <div class="h6" data-v-menu-item-name>Resources</div>
          <nav data-v-menu-item-recursive>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="https://github.com/givanz/VvvebJs/wiki" data-v-menu-item-url>
                <span data-v-menu-item-name>User documentation</span>
              </a>
            </div>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="https://github.com/givanz/VvvebJs/wiki" data-v-menu-item-url>
                <span data-v-menu-item-name>Developer documentation</span>
              </a>
            </div>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="pricing.html" data-v-menu-item-url>
                <span data-v-menu-item-name>Pricing</span>
              </a>
            </div>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="services.html" data-v-menu-item-url>
                <span data-v-menu-item-name>Services</span>
              </a>
            </div>
          </nav>
        </div>

        <div class="col-md" data-v-menu-item data-v-if="category.children > 0">
          <div class="h6" data-v-menu-item-name>Contact</div>
          <nav data-v-menu-item-recursive>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="" href="contact.html">Contact us</a>
              <a href="" href="portfolio.html">Portfolio</a>
              <a href="" href="about.html">About us</a>
              <a href="" href="user/return-form.html">Return form</a>
            </div>
          </nav>
        </div>

        <div class="col-md" data-v-menu-item data-v-if="category.children > 0">
          <div class="h6" data-v-menu-item-name>My account</div>
          <nav data-v-menu-item-recursive>
            <div data-v-menu-item data-v-if="category.children == 0">
              <a href="" href="user/order-tracking.html">Order tracking</a>
              <a href="" href="user/wishlist.html">Wishlist</a>
              <a href="" href="user/orders.html">Orders</a>
              <a href="" href="cart/compare.html">Compare</a>
            </div>
          </nav>
        </div>



      </div>
      <!--
		<div class="row justify-content-end">
			<div class="col-md-3 text-muted text-small mt-5">
				&copy; <span data-v-year>2025</span> <span data-v-sitename>Vvveb</span>. Powered by <a href="https://vvveb.com" target="_blank">Vvveb</a>	
			</div>
		</div>
		-->

    </div>

    <div class="footer-copyright">
      <div class="container">
        <div class="d-flex flex-column flex-md-row">
          <div class="text-muted flex-grow-1">
            <a class="btn-link text-muted" href="/page/terms-conditions">Terms and conditions</a> |
            <a class="btn-link text-muted" href="/page/privacy-policy">Privacy Policy</a>
          </div>
          <div class="text-muted">
            &copy; <span data-v-year>2025</span>
            <span data-v-global-site.description.title>Vvveb</span>. <span>Powered by</span>
            <a href="https://vvveb.com" class="btn-link text-muted" target="_blank">Vvveb</a>
          </div>
        </div>
      </div>
    </div>

  </footer>



  <div class="bg-image"></div>

  <div class="alert alert-light alert-dismissible fade alert-top" role="alert" style="display:none">
    <div class="container">

      <div class="message">
        Product was added to cart.
      </div>


      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>

  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body">

          <form action="/search" method="get">
            <input type="hidden" name="route" value="search">
            <div class="input-group">
              <input type="search" name="search" class="form-control" id="headerSearch" placeholder="Type for search" data-v-vvveb-action="search" data-selector=".search-results" data-v-vvveb-on="keyup">
              <button class="btn btn-outline-primary border" type="submit" title="Search">
                <div class="la-flip-horizontal">
                  <i class="la la-search la-lg" aria-hidden="true"></i>
                </div>
              </button>
            </div>
          </form>

          <div class="search-results">

          </div>

        </div>
      </div>
    </div>
  </div>

  <div id="page-loading-status" class="progress top-0 position-fixed progress-bar" role="progressbar" aria-label="Page loading status" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="z-index: 10;--bs-progress-bg: transparent;--bs-progress-height: 1px;width:0%"></div>

  <!-- Vvveb Common Js -->
  <script id="popper-js" src="../../js/popper.min.js"></script>
  <!-- <script src="../../js/bootstrap.min.js"></script> -->
  <!-- <script src="../../js/bootstrap.bundle.min.js"></script> -->
  <script id="bootstrap-js" src="js/bootstrap.min.js"></script>
  <!-- Vvveb Ajax Common Js -->
  <script id="app-js" src="../../js/app.js"></script>

  <!-- Animation -->

  <link rel="stylesheet" href="js/aos.css">
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>

  <script src="js/aos.js"></script>
  <script src="../../js/app/theme.js"></script>
  <script>
	AOS.init();
</script>
  <script src="../../js/app/cart.js"></script>
  <script type="speculationrules">
{"prefetch":[{"source":"document","where":{"and":[{"href_matches":"\/*"},{"not":{"href_matches":["\/public\/*","\/themes\/*","\/plugins\/*","\/cart\/*","\/checkout\/*","\/user\/*","\/*\\?(.+)"]}},{"not":{"selector_matches":"a[rel~=\"nofollow\"]"}},{"not":{"selector_matches":".no-prefetch, .no-prefetch a"}}]},"eagerness":"conservative"}]}
</script>


</body>

</html>