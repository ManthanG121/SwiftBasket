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
<?php
include "footer.php";
?>