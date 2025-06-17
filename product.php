<?php
include "header.php";
include("./db-connection/db connection.php");
?>

<!-- Include Bootstrap Icons if not already -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="section-title mb-0">Best Products</h2>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $categoryid = $_GET["category_id"];
            $query = "SELECT * FROM `tbl_product` WHERE `category` = $categoryid";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card h-100 border-0 shadow-sm hover-top">
                        <div class="badge bg-success position-absolute top-0 end-0 m-2">
                            <?= $row['product_discount_percentage'] ?>% OFF</div>
                        <div class="product-image">
                            <a href="single_productview.php?product_id=<?= $row['product_id'] ?>">
                                <img src="admin/uplodes/image/<?= ($row['product_img']) ?>" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column shadow-sm">
                            <div class="mb-2">
                                <a href="singleproduct.php?product_id=<?= $row['product_id'] ?>"
                                    class="text-decoration-none">
                                    <h5 class="card-title mb-1 text-center"><?= ($row['product_name']) ?></h5>
                                </a>
                                <div class="d-flex text-center mb-2 ms-3">
                                    <div class="text-warning small me-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="text-muted small">(400 reviews)</span>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-dark fw-bold fs-5 me-2 ms-5"><?= $row['product_sell_price'] ?>
                                        Rs</span>
                                    <span class="text-muted text-decoration-line-through"><?= $row['product_mrp'] ?>
                                        Rs</span>
                                </div>
                                <div class="d-flex gap-2">
                                    <form action="cart_insert.php" method="post" class="flex-grow-1">
                                        <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                        <input type="hidden" name="cart_qty" value="1">
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                                        </button>
                                    </form>
                                    <form action="addtowishlist.php" method="post">
                                        <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                                        <button type="submit" class="btn btn-outline-secondary">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>

<style>
    .hover-top {
        transition: all 0.3s ease;
    }

    .hover-top:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        height: 250px;
        width: 250px;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .product-image img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .shop-section {
        background-color: rgba(248, 249, 250, 0.8);
    }
</style>