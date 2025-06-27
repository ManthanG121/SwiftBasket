<?php
include "header.php";
include("./db-connection/db connection.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  new Swiper('.category-carousel', {
    slidesPerView: 5,
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: '.category-carousel-next',
      prevEl: '.category-carousel-prev',
    },
    breakpoints: {
      0: {
        slidesPerView: 2
      },
      576: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 4
      },
      992: {
        slidesPerView: 5
      }
    }
  });
</script>

<style>.category-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.category-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
}
</style>
<!-- Hero Section -->
<section class="hero-section"
    style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/51136425.jpg');">
    <div class="container">
        <div class="row align-items-center min-vh-80 py-5">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h1 class="display-3 fw-bold mb-4">
                    <span class="text-warning">SwiftBasket</span> - Your Shortcut to Smart Shopping
                </h1>
                <p class="lead mb-5 fs-4">Everything you need, all in one place. Shop top-quality products at unbeatable
                    prices – delivered to your door.</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="shop.php" class="btn btn-warning btn-lg rounded-pill px-4 py-2 shadow">Start Shopping</a>
                    <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-4 py-2 shadow">Join Now</a>
                </div>

                <div class="row mt-5 g-4 pt-4 border-top border-light border-opacity-25">
                    <div class="col-md-6">
                        <div class="d-flex flex-column align-items-center">
                            <span class="display-5 fw-bold text-danger">14k+</span>
                            <span class="text-light">Products</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column align-items-center">
                            <span class="display-5 fw-bold text-danger">50k+</span>
                            <span class="text-light">Customers</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div
                            class="icon-lg bg-primary bg-opacity-10 text-success rounded-circle mb-4 mx-auto d-flex align-items-center justify-content-center">
                            <i class="fas fa-leaf fs-4"></i>
                        </div>
                        <h5 class="card-title">Fresh from Farm</h5>
                        <p class="card-text text-muted">Directly sourced from local organic farms</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div
                            class="icon-lg bg-primary bg-opacity-10 text-secondary rounded-circle mb-4 mx-auto d-flex align-items-center justify-content-center">
                            <i class="fas fa-certificate fs-4"></i>
                        </div>


                        <h5 class="card-title">100% Original</h5>
                        <p class="card-text text-muted">Certified original products only</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 shadow-sm hover-top">
                    <div class="card-body p-4 text-center">
                        <div
                            class="icon-lg bg-primary bg-opacity-10 text-warning rounded-circle mb-4 mx-auto d-flex align-items-center justify-content-center">
                            <i class="fas fa-truck fa-lg"></i>
                        </div>
                        <h5 class="card-title">Free Delivery</h5>
                        <p class="card-text text-muted">On orders over 499 Rs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<!-- Categories Section -->
<section class="py-5 bg-light overflow-hidden">
  <div class="container-lg">
    
    <!-- Section Header -->
    <div class="row mb-4">
      <div class="col-12 d-flex justify-content-between align-items-center">
        <h2 class="section-title fw-bold text-dark mb-0">Shop by Category</h2>
        <div class="swiper-buttons d-flex gap-2">
          <button class="swiper-prev category-carousel-prev btn btn-dark btn-sm rounded-circle">❮</button>
          <button class="swiper-next category-carousel-next btn btn-dark btn-sm rounded-circle">❯</button>
        </div>
      </div>
    </div>

    <!-- Swiper Carousel -->
    <div class="row">
      <div class="col-12">
        <div class="swiper category-carousel">
          <div class="swiper-wrapper">
            <?php
            $query = "SELECT * FROM `tbl_category`";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <div class="swiper-slide">
                <a href="product.php?category_id=<?= $row['category_id'] ?>" class="text-decoration-none">
                  <div class="category-card text-center bg-white p-3 shadow-sm rounded-4 h-100 transition">
                    <img src="admin/uplodes/image/<?= $row["category_img"] ?>" alt="<?= $row["category_name"] ?>"
                         class="rounded-circle mb-3 mx-auto d-block"
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <h6 class="fw-semibold text-dark"><?= $row["category_name"] ?></h6>
                  </div>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>



<!-- Best Selling Products -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="section-title mb-0">Best Selling Products</h2>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="row g-4">

            <?php
            $query = "SELECT * FROM tbl_product 
                      INNER JOIN tbl_best_selling_product 
                      ON tbl_product.product_id = tbl_best_selling_product.product_id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0 position-relative">
                            <!-- Discount Badge -->
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2 z-1">
                                <?= $row['product_discount_percentage'] ?>% OFF
                            </span>

                            <!-- Product Image -->
                            <a href="single_productview.php?product_id=<?= $row['product_id'] ?>">
                                <div class="ratio ratio-4x3">
                                    <img src="admin/uplodes/image/<?= $row['product_img'] ?>" alt="<?= $row['product_name'] ?>"
                                        class="img-fluid object-fit-cover rounded-top">
                                </div>
                            </a>

                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column">
                                <a href="singleproduct.php?product_id=<?= $row['product_id'] ?>" class="text-decoration-none">
                                    <h6 class="card-title text-center text-dark mb-2"><?= $row['product_name'] ?></h6>
                                </a>

                                <!-- Ratings -->
                                <div class="d-flex justify-content-center align-items-center mb-2 text-warning small">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-muted small ms-2">(400 reviews)</span>
                                </div>

                                <!-- Price -->
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <span class="fw-bold text-dark fs-6 me-2"><?= $row['product_sell_price'] ?> Rs</span>
                                    <span class="text-muted text-decoration-line-through"><?= $row['product_mrp'] ?> Rs</span>
                                </div>

                                <!-- Buttons -->
                                <div class="mt-auto d-flex gap-2">
                                    <!-- Add to Cart -->
                                    <form action="cart_insert.php" method="post" class="w-100">
                                        <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                        <input type="hidden" name="cart_qty" value="1">
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-shopping-cart me-1"></i>Cart
                                        </button>
                                    </form>

                                    <!-- Wishlist -->
                                    <form action="wish_list_insert.php" method="post">
                                        <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                        <button type="submit" class="btn btn-outline-secondary">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="col-12 text-center py-5"><div class="alert alert-info">No featured products found.</div></div>';
            }
            ?>
        </div>
    </div>
</section>



<!-- Promo Banners -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <!-- Left Banner: Exclusive Offers Promotion -->
            <div class="col-md-8">
                <div class="position-relative rounded-4 overflow-hidden h-100"
                    style="background-image: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('image-7.png'); background-size: cover; background-position: center; min-height: 300px;">
                    <div class="position-absolute bottom-0 start-0 p-4 p-lg-5 text-white w-100">
                        <span class="badge bg-danger mb-2">Exclusive Offer</span>
                        <h2 class="fw-bold display-6">Big Deals, Small Prices</h2>
                        <p class="mb-3 fs-5">Up to 50% off on your favorite categories — limited time only!</p>
                        <a href="shop.php" class="btn btn-success rounded-pill px-4 fw-semibold">View All Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="position-relative rounded-4 overflow-hidden h-100"
                    style="background-image: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('image-8.png'); background-size: cover; background-position: center; min-height: 300px;">
                    <div class="position-absolute bottom-0 start-0 p-4 text-white w-100">
                        <span class="badge bg-pink mb-2">New Arrivals</span>
                        <h4 class="fw-bold">Trending Styles</h4>
                        <p class="small">Shop fashion for men, women & kids</p>
                        <a href="category.php?cat=fashion"
                            class="btn btn-sm btn-light rounded-pill px-3 fw-semibold">Explore Fashion</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




<!-- Featured Products Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Header with navigation arrows -->
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="section-title mb-0">Featured Products</h2>
                <div>
                    <button class="btn btn-outline-secondary me-2 featured-prev rounded-circle">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-outline-secondary featured-next rounded-circle">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Swiper Slider -->
        <div class="swiper featured-slider overflow-hidden">
            <div class="swiper-wrapper">

                <?php
                $query = "SELECT * FROM tbl_product 
                          INNER JOIN tbl_feature ON tbl_product.product_id = tbl_feature.product_id";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="swiper-slide" style="width: 300px;">
                            <div class="card h-100 shadow-sm border-0 position-relative">
                                <span class="badge bg-success position-absolute top-0 end-0 m-2 z-1">
                                    <?= $row['product_discount_percentage'] ?>% OFF
                                </span>
                                <a href="single_productview.php?product_id=<?= $row['product_id'] ?>">
                                    <div class="ratio ratio-4x3">
                                        <img src="admin/uplodes/image/<?= $row['product_img'] ?>"
                                            alt="<?= $row['product_name'] ?>" class="img-fluid object-fit-cover rounded-top">
                                    </div>
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <a href="singleproduct.php?product_id=<?= $row['product_id'] ?>"
                                        class="text-decoration-none">
                                        <h6 class="card-title text-center text-dark mb-2"><?= $row['product_name'] ?></h6>
                                    </a>
                                    <div class="d-flex justify-content-center align-items-center mb-2 text-warning small">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-muted small ms-2">(400 reviews)</span>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <span class="fw-bold text-dark fs-6 me-2"><?= $row['product_sell_price'] ?> Rs</span>
                                        <span class="text-muted text-decoration-line-through"><?= $row['product_mrp'] ?>
                                            Rs</span>
                                    </div>
                                    <div class="mt-auto d-flex gap-2">
                                        <form action="cart_insert.php" method="post" class="w-100">
                                            <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                            <input type="hidden" name="cart_qty" value="1">
                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="fas fa-shopping-cart me-1"></i>Cart
                                            </button>
                                        </form>
                                        <form action="wish_list_insert.php" method="post">
                                            <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                            <button type="submit" class="btn btn-outline-secondary">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-12 text-center py-5"><div class="alert alert-info">No featured products found.</div></div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100 hover-top bg-white">
                    <div class="card-body">
                        <div class="icon-xl bg-primary bg-opacity-10 text-primary rounded-circle mb-4 mx-auto">

                            <i class="fas fa-shipping-fast fa-lg"></i>

                        </div>
                        <h5 class="card-title">Free Delivery</h5>
                        <p class="card-text text-muted">On orders over $50</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100 hover-top bg-white">
                    <div class="card-body">
                        <div class="icon-xl bg-success bg-opacity-10 text-success rounded-circle mb-4 mx-auto">

                            <i class="fas fa-lock fa-lg"></i>

                        </div>
                        <h5 class="card-title">Secure Payment</h5>
                        <p class="card-text text-muted">100% secure checkout</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100 hover-top bg-white">
                    <div class="card-body">
                        <div class="icon-xl bg-warning bg-opacity-10 text-warning rounded-circle mb-4 mx-auto">

                            <i class="fas fa-award fa-lg"></i>

                        </div>
                        <h5 class="card-title">Quality Guarantee</h5>
                        <p class="card-text text-muted">Premium quality products</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100 hover-top bg-white">
                    <div class="card-body">
                        <div class="icon-xl bg-info bg-opacity-10 text-info rounded-circle mb-4 mx-auto">

                            <i class="fas fa-percentage fa-lg"></i>

                        </div>
                        <h5 class="card-title">Daily Offers</h5>
                        <p class="card-text text-muted">Save up to 50%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-section {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        color: #fff;
    }

    .section-title {
        position: relative;
        padding-bottom: 15px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background: #28a745;
    }

    .hover-top {
        transition: all 0.3s ease;
    }

    .hover-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .product-card .product-title {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 48px;
    }

    .icon-lg {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-xl {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .star-rating {
        display: inline-flex;
        align-items: center;
    }

    .promo-banner {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .category-card {
        transition: all 0.3s ease;
    }

    .category-card:hover {
        background-color: #f8f9fa;
    }

    .product-image {
        height: 250px;
        width: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .product-image img {
        max-height: 100%;
        object-fit: cover;
    }

    .hover-top {
        transition: all 0.3s ease-in-out;
    }

    .hover-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
</style>

<!-- Initialize Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Featured Products Slider
        var featuredSlider = new Swiper('.featured-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.featured-next',
                prevEl: '.featured-prev',
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 4,
                }
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.featured-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.featured-next',
                prevEl: '.featured-prev',
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 4,
                }
            }
        });
    });
</script>


<?php
include "footer.php";
?>