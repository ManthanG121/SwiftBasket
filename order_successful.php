<?php include "header.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="container py-">
  <div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-8 col-lg-6">
      <div class="card border-0 shadow-lg rounded-4 bg-white text-center animate__animated animate__fadeInUp">

        <!-- Header Section -->
        <div class="card-body p-5">
          <!-- Big Success Icon -->
          <div class="d-flex justify-content-center align-items-center mb-4">
            <div class="bg-success bg-opacity-10 rounded-circle d-flex justify-content-center align-items-center" style="width: 120px; height: 120px;">
              <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
            </div>
          </div>

          <!-- Title -->
          <h2 class="text-success fw-bold mb-3">🎉 Order Placed Successfully!</h2>

          <!-- Sub Text -->
          <p class="lead text-secondary mb-4">
            Thank you for shopping with us. Your order has been received and is now being processed.
          </p>

          <!-- Action Button -->
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="track-order.php" class="btn btn-success btn-lg px-4 rounded-pill d-flex align-items-center gap-2">
              <i class="bi bi-truck"></i> Track Order
            </a>
            <a href="index.php" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">
              Continue Shopping
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
