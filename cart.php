<?Php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Skincare &mdash; e-Commerce</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"
    />
    <link rel="stylesheet" href="fonts/icomoon/style.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="site-wrap">
      <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
          <div class="container">
            <div class="row align-items-center">
              <div
                class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left"
              >
                <form action="" class="site-block-top-search">
                  <span class="icon icon-search2"></span>
                  <input
                    type="text"
                    class="form-control border-0"
                    placeholder="Search"
                  />
                </form>
              </div>

              <div
                class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center"
              >
                <div class="site-logo">
                  <a href="index.php" class="js-logo-clone">Skincare</a>
                </div>
              </div>

              <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                  <ul>
                    <li><a href="#"><span class="icon icon-person"></span></a></li>
                    <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                    <li><a href="cart.php" class="site-cart"><span class="icon icon-shopping_cart"></span>
                      <?php if (empty($_SESSION['cart']["arrCart"])) { ?>
                        <span class="count">0</span>
                      <?php } else { ?>
                        <span class="count"><?php echo count($_SESSION['cart']["arrCart"]); ?></span>
                      <?php } ?>
                      </a></li> 
                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                  </ul>
                </div> 
              </div>
            </div>
          </div>
        </div>
        <nav
          class="site-navigation text-right text-md-center"
          role="navigation"
        >
          <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
              <li><a href="index.php">Home</a></li>
              <li>
                <a href="#">About</a></li>
              <li><a href="#">Shop</a></li>
              <li><a href="#">Catalogue</a></li>
              <li><a href="#">New Arrivals</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </nav>
      </header>

      <div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0">
              <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
              <strong class="text-black">Cart</strong>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <form class="col-md-12" method="post">
              <div class="site-blocks-table">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="product-thumbnail">Image</th>
                      <th class="product-name">Name</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if (!empty($_SESSION['cart']) && !empty($_SESSION['cart']['arrCart'])) {
                        $total = 0;
                        foreach ($_SESSION['cart']['arrCart'] as $key) {
                          $namaBrg = $key['nmBrg'];
                          $hrg = $key['hrg'];
                          $jml = $key['jml'];
                          $img = $key['img'];
                          $subtotal = $hrg * $jml;
                          $total += $subtotal;
                    ?>
                    <tr>
                      <td class="product-thumbnail">
                        <img
                          src="<?php echo $img ?>"
                          alt="Image"
                          class="img-fluid"
                        />
                      </td>
                      <td class="product-name"><?php echo $namaBrg ?></td>
                      <td>IDR <?php echo $hrg ?></td>
                      <td><?php echo $jml ?></td>
                    </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr>
                        <td colspan="4">Cart is empty</td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </form>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                  <button onclick="location.href='cart-remove.php'" class="btn btn-primary btn-sm btn-block">
                    Clear Cart
                  </button>
                </div>
                <div class="col-md-6">
                  <button onclick="location.href='index.php'" class="btn btn-outline-primary btn-sm btn-block">
                    Continue Shopping
                  </button>
                </div>
              </div>

            </div>
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <span class="text-black">Subtotal</span>
                    </div>
                    <?php if (!empty($_SESSION['cart']) && !empty($_SESSION['cart']['arrCart'])) { ?>
                      <div class="col-md-6 text-right">
                        <strong class="text-black">IDR <?php echo $total ?></strong>
                      </div>
                    <?php } else { ?>
                      <div class="col-md-6 text-right">
                        <strong class="text-black">Cart is empty</strong>
                      </div>
                    <?php } ?>
                  </div>      
                  <div class="row">
                    <div class="col-md-12">
                      <?php if (!empty($_SESSION['cart']["arrCart"])) { ?>
                        <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='cart-remove2.php'">
                          Proceed To Checkout
                        </button>
                      <?php } else { ?>
                        <button class="btn btn-primary btn-lg py-3 btn-block" disabled>
                          Cart is Empty
                        </button>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="site-footer border-top">
        <div class="container">
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script
                  data-cfasync="false"
                  src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
                ></script>
                <script>
                  document.write(new Date().getFullYear());
                </script>
                All rights reserved | This template is made with
                <i class="icon-heart" aria-hidden="true"></i> by
                <a
                  href="https://colorlib.com"
                  target="_blank"
                  class="text-primary"
                  >Colorlib</a
                >
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>
