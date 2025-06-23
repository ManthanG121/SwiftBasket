<?php
include "header.php";
include "sidebar.php";
?>
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
        <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>
      </div>
    </div>
    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as customer_count FROM tbl_customer";
    $findingtotal = mysqli_query($conn, $select);
    $customer_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- customer_count end -->

    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as category_count FROM tbl_category";
    $findingtotal = mysqli_query($conn, $select);
    $category_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- category_count end -->

    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as product_count FROM tbl_product";
    $findingtotal = mysqli_query($conn, $select);
    $product_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- product_count end -->

    <?php
    include("../db-connection/db connection.php");
    $select = "SELECT count(*) as order_count FROM tbl_order_master";
    $findingtotal = mysqli_query($conn, $select);
    $order_count = mysqli_fetch_array($findingtotal);
    ?>
    <!-- order_count end -->

    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-primary bubble-shadow-small">
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category text-dark">CUSTOMER</p>
                  <h4 class="card-title"><?= $customer_count["customer_count"] ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-info bubble-shadow-small">
                 <i class="icon-pie-chart text-warning"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">CATEGORY</p>
                  <h4 class="card-title"><?= $category_count["category_count"] ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-success bubble-shadow-small">
                  <i class="fas fa-layer-group"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category text-dark">PRODUCT</p>
                  <h4 class="card-title"><?= $product_count["product_count"] ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                  <i class="fa fa-box-open"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">ORDER</p>
                  <h4 class="card-title"><?= $order_count["order_count"] ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>