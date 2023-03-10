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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
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

    <!-- ========================
       shop single
    =========================== -->
    <section class="shop pb-40 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-primary d-flex flex-wrap justify-content-between align-items-center mb-40">
              <h3 class="alert__title my-1">“Green Tea” has been added to your cart.</h3>
              <a href="cart.html" class="btn btn__secondary btn__rounded">View Cart</a>
            </div><!-- /.alert-panel-->
            <div class="row product-item-single">
              <div class="col-sm-6">
                <div class="product__img">
                  <img src="assets/images/products/2.jpg" class="zoomin" alt="product" loading="lazy">
                </div><!-- /.product-img -->
              </div>
              <div class="col-sm-6">
                <h1 class="product__title">Green Tea</h1>
                <div class="product__meta-review mb-20">
                  <span class="product__rating">
                    <i class="fa fa-star active"></i>
                    <i class="fa fa-star active"></i>
                    <i class="fa fa-star active"></i>
                    <i class="fa fa-star active"></i>
                    <i class="fa fa-star"></i>
                  </span>
                  <span>4 Review(s)</span>
                  <a href="#">Add Review</a>
                </div><!-- /.product-meta-review -->
                <span class="product__price mb-20">$ 14.00</span>
                <div class="product__desc">
                  <p>EGCG is one of the most powerful compounds in green tea. Research has tested its ability to help
                    treat various diseases. It appears to be one of the main compounds that gives green tea its
                    medicinal properties (2
                  </p>
                </div><!-- /.product-desc -->
                <div class="product__quantity d-flex mb-30">
                  <div class="quantity__input-wrap mr-20">
                    <i class="decrease-qty fa fa-minus"></i>
                    <input type="number" value="1" class="qty-input">
                    <i class="increase-qty fa fa-plus"></i>
                  </div>
                  <a class="btn btn__secondary btn__rounded" href="#">add to cart</a>
                </div><!-- /.product-quantity -->
                <div class="product__meta-details">
                  <ul class="list-unstyled mb-30">
                    <li><span>SKU :</span> <span>#0214</span></li>
                    <li><span>Category :</span> <span>Vitamins</span></li>
                    <li><span>Tags :</span> <span>Beauty, Supplements</span></li>
                  </ul>
                </div><!-- /.product__meta-details -->
                <ul class="social-icons list-unstyled mb-0">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul><!-- /.social-icons -->
              </div>
            </div><!-- /.row -->
            <div class="product__details mt-100">
              <nav class="nav nav-tabs">
                <a class="nav__link active" data-toggle="tab" href="#Description">Description</a>
                <a class="nav__link" data-toggle="tab" href="#Details">Details</a>
                <a class="nav__link" data-toggle="tab" href="#Reviews">Reviews (3)</a>
              </nav>
              <div class="tab-content mb-50" id="nav-tabContent">
                <div class="tab-pane fade show active" id="Description">
                  <p>It doesn’t contain as much as coffee, but enough to produce a response without causing the jittery
                    effects associated with taking in too much caffeine. Caffeine affects the brain by blocking an
                    inhibitory neurotransmitter called adenosine. This way, it increases the firing of neurons and the
                    concentration of neurotransmitters like dopamine and norepinephrine (4Trusted Source, 5). Research
                    has consistently shown that caffeine can improve various aspects of brain function, including mood,
                    vigilance, reaction time, and memory (6).</p>
                </div><!-- /.desc-tab -->
                <div class="tab-pane fade" id="Details">
                  <p>Yorks is not just about graphic design; it's more than that. We offer integral communication
                    services, and we're responsible for our process and results. We thank each of our clients and their
                    portfolios; thanks to them we have grown and built what we are today! After all</p>
                  <p>as described in Web
                    Design Trends 2015 & 2016, vision dominates a lot of our subconscious interpretation of the world
                    around us. On top of that, pleasing images create a better user experience.
                    At League Agency, we shows only the best websites and portfolios built completely with passion,
                    simplicity & creativity !</p>
                </div><!-- /.details-tab -->
                <div class="tab-pane fade" id="Reviews">
                  <form class="reviews__form">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Name">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <textarea class="form-control" placeholder="Review"></textarea>
                    </div><!-- /.form-group -->
                    <button type="submit" class="btn btn__primary btn__rounded">Submit</button>
                  </form>
                </div><!-- /.reviews-tab -->
              </div>
            </div><!-- /.product-tabs -->
            <h6 class="related__products-title text-center-xs mb-25">Related Products</h6>
            <div class="row">
              <!-- Product item #1 -->
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="product-item">
                  <div class="product__img">
                    <img src="assets/images/products/2.jpg" alt="Product" loading="lazy">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__rounded">
                        <i class="icon-cart"></i> <span>Add To Cart</span>
                      </a>
                    </div><!-- /.product-action -->
                  </div><!-- /.product-img -->
                  <div class="product__info">
                    <h4 class="product__title"><a href="#">Biotin Complex</a></h4>
                    <span class="product__price">$12,99</span>
                  </div><!-- /.product-content -->
                </div><!-- /.product-item -->
              </div><!-- /.col-lg-3 -->
              <!-- Product item #2 -->
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="product-item">
                  <div class="product__img">
                    <img src="assets/images/products/3.jpg" alt="Product" loading="lazy">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__rounded">
                        <i class="icon-cart"></i> <span>Add To Cart</span>
                      </a>
                    </div><!-- /.product-action -->
                  </div><!-- /.product-img -->
                  <div class="product__info">
                    <h4 class="product__title"><a href="#">Facial Serum</a></h4>
                    <span class="product__price">$19,99</span>
                  </div><!-- /.product-content -->
                </div><!-- /.product-item -->
              </div><!-- /.col-lg-3 -->
              <!-- Product item #3 -->
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="product-item">
                  <div class="product__img">
                    <img src="assets/images/products/4.jpg" alt="Product" loading="lazy">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__rounded">
                        <i class="icon-cart"></i> <span>Add To Cart</span>
                      </a>
                    </div><!-- /.product-action -->
                  </div><!-- /.product-img -->
                  <div class="product__info">
                    <h4 class="product__title"><a href="#">Calming Herps</a></h4>
                    <span class="product__price">$33.00</span>
                  </div><!-- /.product-content -->
                </div><!-- /.product-item -->
              </div><!-- /.col-lg-3 -->
              <!-- Product item #4 -->
              <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="product-item">
                  <div class="product__img">
                    <img src="assets/images/products/5.jpg" alt="Product" loading="lazy">
                    <div class="product__action">
                      <a href="#" class="btn btn__primary btn__rounded">
                        <i class="icon-cart"></i> <span>Add To Cart</span>
                      </a>
                    </div><!-- /.product-action -->
                  </div><!-- /.product-img -->
                  <div class="product__info">
                    <h4 class="product__title"><a href="#">Essential Oil</a></h4>
                    <span class="product__price">$63.00</span>
                  </div><!-- /.product-content -->
                </div><!-- /.product-item -->
              </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.shop single -->
    
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