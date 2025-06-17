<?php
include "header.php";
?>
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">All Products...</h2>
        </div>

       <div class="row g-4">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm hover-top">
                    <div class="badge bg-danger position-absolute mt-2 ms-2">Sale</div>
                    <div class="product-thumb p-4 text-center">
                        <a href="product-detail.php">
                            <img src="images/product-thumb-1.png" class="img-fluid" alt="Product">
                        </a>
                    </div>
                    <div class="card-body pt-0">
                        <div class="product-info">
                            <h5 class="product-title mb-1">
                                <a href="product-detail.php" class="text-dark text-decoration-none">Product Name</a>
                            </h5>
                            <div class="product-rating mb-2">
                                <div class="star-rating">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                </div>
                                <span class="text-muted small">(24 reviews)</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-muted text-decoration-line-through me-2">$24.00</span>
                                <span class="h5 mb-0 text-primary">$18.00</span>
                            </div>
                        </div>
                        <div class="product-actions d-flex mt-3">
                            <button class="btn btn-sm btn-outline-secondary me-2 rounded-circle">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="btn btn-sm btn-primary flex-grow-1 rounded-pill">
                                <i class="fas fa-shopping-cart me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more product items here -->
        </div>
    </div>
</section>
<?php
include "footer.php";
?>