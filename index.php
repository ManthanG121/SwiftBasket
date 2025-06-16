<?php
include "header.php";
?>

<!-- Hero Section -->
<section class="hero-section" style="background-image: url('images/51136425.jpg');">
    <div class="container">
        <div class="row align-items-center min-vh-75 py-5">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 text-center">
                <h1 class="display-4 fw-bold mb-3">
                    <span class="text-danger">SwiftBasket</span><br><span class="text-bark"> Your Shortcut to Smart
                        Shopping.</span>
                </h1>
                <p class="lead mb-4">Everything you need, all in one place. Shop top-quality products at unbeatable prices – delivered to your door.</p>
                <div class="d-flex gap-3 justify-content-center text-center">
                    <a href="shop.php" class="btn btn-success btn-lg rounded-pill px-4">Start Shopping</a>
                    <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-4">Join Now</a>
                </div>

                <div class="row mt-5 g-4">
                    <div class="col-4">
                        <div class="d-flex align-items-center">
                            <span class="display-6 fw-bold me-2">14k+</span>
                            <span class="display-9 me-2">Products</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center">
                            <span class="display-6 fw-bold me-2">50k+</span>
                            <span class="display-9 me-2">Customers</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center">
                            <span class="display-6 fw-bold me-2">10+</span>
                            <span class="display-9 me-2">Stores</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card bg-primary text-white h-100 border-0">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-4">
                                <svg width="48" height="48">
                                    <use xlink:href="#fresh"></use>
                                </svg>
                            </div>
                            <div>
                                <h5 class="card-title">Fresh from Farm</h5>
                                <p class="card-text">Directly sourced from local organic farms</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card bg-success text-white h-100 border-0">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-4">
                                <svg width="48" height="48">
                                    <use xlink:href="#organic"></use>
                                </svg>
                            </div>
                            <div>
                                <h5 class="card-title">100% Orignal</h5>
                                <p class="card-text">Certified Orignal products only</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card bg-danger text-white h-100 border-0">
                    <div class="card-body p-4">
                        <div class="d-flex text-center">
                            <div class="me-4">
                                <svg width="48" height="48">
                                    <use xlink:href="#delivery"></use>
                                </svg>
                            </div>
                            <div>
                                <h5 class="card-title">Free Delivery</h5>
                                <p class="card-text">On orders over 499 Rs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-5 overflow-hidden">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex flex-wrap justify-content-between mb-5">
              <h2 class="section-title">Category</h2>

              <div class="d-flex align-items-center">
                <div class="swiper-buttons">
                  <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                  <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="category-carousel swiper">
              <div class="swiper-wrapper">
                <a href="category.html" class="nav-link swiper-slide text-center">
                  <img src="images/category-thumb-1.jpg" class="rounded-circle" alt="Category Thumbnail">
                  <h4 class="fs-6 mt-3 fw-normal category-title">Fruits & Veges</h4>
                </a>
          
                
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>


<!-- Best Selling Products -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Best Selling Products</h2>
            <a href="#" class="btn btn-outline-primary">View All</a>
        </div>

        <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <div class="badge bg-danger position-absolute mt-2 ms-2">Sale</div>
                        <div class="product-thumb p-4 text-center">
                            <a href="product-detail.php">
                                <img src="images/product-thumb-1.png" class="img-fluid" alt="Product">
                            </a>
                        </div>
                        <div class="card-body pt-0">
                            <div class="product-info text-center">
                                <h5 class="product-title mb-1">
                                    <a href="product-detail.php">Product Name </a>
                                </h5>
                                <div class="product-rating mb-2">
                                    <div class="star-rating">
                                        <svg width="16" height="16" class="text-warning">
                                            <use xlink:href="#star-full"></use>
                                        </svg>
                                        <svg width="16" height="16" class="text-warning">
                                            <use xlink:href="#star-full"></use>
                                        </svg>
                                        <svg width="16" height="16" class="text-warning">
                                            <use xlink:href="#star-full"></use>
                                        </svg>
                                        <svg width="16" height="16" class="text-warning">
                                            <use xlink:href="#star-full"></use>
                                        </svg>
                                        <svg width="16" height="16" class="text-warning">
                                            <use xlink:href="#star-half"></use>
                                        </svg>
                                    </div>
                                    <span class="text-muted small">(24 reviews)</span>
                                </div>
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <span class="text-muted text-decoration-line-through me-2">$24.00</span>
                                    <span class="h5 mb-0 text-primary">$18.00</span>
                                </div>
                            </div>
                            <div class="product-actions d-flex justify-content-center mt-3">
                                <button class="btn btn-sm btn-outline-secondary me-2">
                                    <svg width="16" height="16">
                                        <use xlink:href="#heart"></use>
                                    </svg>
                                </button>
                                <button class="btn btn-sm btn-primary flex-grow-1">
                                    <svg width="16" height="16" class="me-1">
                                        <use xlink:href="#cart"></use>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
          
        </div>
    </div>
</section>

<!-- Promo Banners -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-8">
                <div class="promo-banner rounded-3" style="background-image: url('images/banner-ad-1.jpg');">
                    <div class="promo-content p-4 p-lg-5 text-white">
                        <h3>Summer Sale</h3>
                        <h2 class="display-5 fw-bold mb-3">Up to 30% Off</h2>
                        <p>Fresh organic produce for your healthy lifestyle</p>
                        <a href="#" class="btn btn-light rounded-pill mt-2">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="promo-banner h-100 rounded-3" style="background-image: url('images/banner-ad-2.jpg');">
                    <div class="promo-content p-4 text-white">
                        <h3>Combo Offers</h3>
                        <h4 class="fw-bold mb-3">Save up to 50%</h4>
                        <a href="#" class="btn btn-sm btn-light rounded-pill mt-2">View Deals</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Featured Products</h2>
            <div class="d-flex">
                <button class="btn btn-outline-secondary me-2 featured-prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn btn-outline-secondary featured-next">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="position-relative">
            <div class="featured-slider swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card product-card h-100 border-0 shadow-sm">
                                <div class="badge bg-danger position-absolute mt-2 ms-2">Sale</div>
                                <div class="product-thumb p-4 text-center">
                                    <a href="product-detail.php">
                                        <img src="images/product-thumb-2.png" class="img-fluid"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="product-info text-center">
                                        <h5 class="product-title mb-1">
                                            <a href="product-detail.php">Featured Product </a>
                                        </h5>
                                        <div class="product-rating mb-2">
                                            <div class="star-rating">
                                                <svg width="16" height="16" class="text-warning">
                                                    <use xlink:href="#star-full"></use>
                                                </svg>
                                                <svg width="16" height="16" class="text-warning">
                                                    <use xlink:href="#star-full"></use>
                                                </svg>
                                                <svg width="16" height="16" class="text-warning">
                                                    <use xlink:href="#star-full"></use>
                                                </svg>
                                                <svg width="16" height="16" class="text-warning">
                                                    <use xlink:href="#star-full"></use>
                                                </svg>
                                                <svg width="16" height="16" class="text-warning">
                                                    <use xlink:href="#star-half"></use>
                                                </svg>
                                            </div>
                                            <span class="text-muted small">(18 reviews)</span>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mb-2">
                                            <span class="text-muted text-decoration-line-through me-2">$24.00</span>
                                            <span class="h5 mb-0 text-primary">$18.00</span>
                                        </div>
                                    </div>
                                    <div class="product-actions d-flex justify-content-center mt-3">
                                        <button class="btn btn-sm btn-outline-secondary me-2">
                                            <svg width="16" height="16">
                                                <use xlink:href="#heart"></use>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-primary flex-grow-1">
                                            <svg width="16" height="16" class="me-1">
                                                <use xlink:href="#cart"></use>
                                            </svg>
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <svg width="48" height="48">
                                <use xlink:href="#package"></use>
                            </svg>
                        </div>
                        <h5 class="card-title">Free Delivery</h5>
                        <p class="card-text">On orders over $50</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <svg width="48" height="48">
                                <use xlink:href="#secure"></use>
                            </svg>
                        </div>
                        <h5 class="card-title">Secure Payment</h5>
                        <p class="card-text">100% secure checkout</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <svg width="48" height="48">
                                <use xlink:href="#quality"></use>
                            </svg>
                        </div>
                        <h5 class="card-title">Quality Guarantee</h5>
                        <p class="card-text">Premium quality products</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 text-center p-4 h-100">
                    <div class="card-body">
                        <div class="feature-icon mb-3">
                            <svg width="48" height="48">
                                <use xlink:href="#offers"></use>
                            </svg>
                        </div>
                        <h5 class="card-title">Daily Offers</h5>
                        <p class="card-text">Save up to 50%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Styles */
    .hero-section {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        color: #fff;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
    }

    .hero-section .container {
        position: relative;
        z-index: 1;
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

    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .promo-banner {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        min-height: 300px;
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }

    .promo-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
    }

    .promo-content {
        position: relative;
        z-index: 1;
    }

    .category-card {
        transition: all 0.3s ease;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .category-img {
        width: 100px;
        height: 100px;
        overflow: hidden;
    }

    .feature-card {
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .blog-card {
        transition: all 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .star-rating {
        display: inline-flex;
        align-items: center;
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
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 16,
        breakpoints: {
            576: { slidesPerView: 3 },
            768: { slidesPerView: 4 },
            992: { slidesPerView: 5 },
            1200: { slidesPerView: 6 }
        }
    });
</script>


<?php
include "footer.php";
?>