<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Medcity - Medical Healthcare HTML5 Template">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>Medcity - Medical Healthcare HTML5 Template</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="assets/css/libraries.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

    
    <?php
     include('header.inc');
    ?>

    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mt-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
              </ol>
            </nav>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- =========================
				Shopping Cart
		=========================== -->
    <section class="shopping-cart pt-0 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cart-table table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="cart-product">
                    <td class="d-flex align-items-center">
                      <i class="fas fa-times cart-product__remove"></i>
                      <div class="cart-product__img">
                        <img src="assets/images/products/10.jpg" alt="product" />
                      </div>
                      <h5 class="cart-product__title">Natural Cacao Powder</h5>
                    </td>
                    <td class="cart-product__price">$ 9.00</td>
                    <td class="cart-product__quantity">
                      <div class="quantity__input-wrap">
                        <i class="fa fa-minus decrease-qty"></i>
                        <input type="number" value="1" class="qty-input">
                        <i class="fa fa-plus increase-qty"></i>
                      </div>
                    </td>
                    <td class="cart-product__total">$ 10.00</td>
                  </tr>
                  <tr class="cart-product">
                    <td class="d-flex align-items-center">
                      <i class="fas fa-times cart-product__remove"></i>
                      <div class="cart-product__img">
                        <img src="assets/images/products/3.jpg" alt="product" />
                      </div>
                      <h5 class="cart-product__title">Biotin Complex</h5>
                    </td>
                    <td class="cart-product__price">$ 14.00</td>
                    <td class="cart-product__quantity">
                      <div class="quantity__input-wrap">
                        <i class="fa fa-minus decrease-qty"></i>
                        <input type="number" value="1" class="qty-input">
                        <i class="fa fa-plus increase-qty"></i>
                      </div>
                    </td>
                    <td class="cart-product__total">$ 39.00</td>
                  </tr>
                  <tr class="cart-product__action">
                    <td colspan="4">
                      <div class="cart-product__action-content d-flex align-items-center justify-content-between">
                        <form class="d-flex flex-wrap">
                          <input type="text" class="form-control mb-10 mr-10" placeholder="Coupon Code">
                          <button type="submit" class="btn btn__secondary mb-10">Apply
                            Coupon</button>
                        </form>
                        <div>
                          <a class="btn btn__secondary mr-10" href="#">update cart</a>
                          <a class="btn btn__secondary" href="#">Checkout</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.cart-table -->
          </div><!-- /.col-lg-12 -->

          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="cart__total-amount">
              <h6>Cart Totals</h6>
              <ul class="list-unstyled mb-30">
                <li><span>Cart Subtotal :</span><span>$ 140.00</span></li>
                <li><span>Order Total :</span><span>$ 140.00</span></li>
              </ul>
              <a href="#" class="btn btn__primary">Proceed To Checkout</a>
            </div><!-- /.cart__total-amount -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.shopping-cart -->
    
  <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
  </div><!-- /.wrapper -->

  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>   

    <!-- End of Footer -->

    <!-- Footer Linked -->
    <?php include('footer.inc'); ?>
    <!-- Footer Linked -->   
</body>
</html>