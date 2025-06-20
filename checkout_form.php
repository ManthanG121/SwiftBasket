<?php
include "header.php";
include("./db-connection/db connection.php");
?>
<form action="order_insert.php" method="post" enctype="mulple/form-data">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Checkout Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h2 class="h5 mb-0">Checkout</h2>
                    </div>
                    <div class="card-body">
                        <!-- Progress Steps -->
                        <ul class="nav nav-pills nav-justified mb-4" id="checkoutSteps" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="shipping-tab" data-bs-toggle="pill"
                                    data-bs-target="#shipping" type="button" role="tab">
                                    <i class="fas fa-truck me-2"></i>Shipping
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="pill"
                                    data-bs-target="#payment" type="button" role="tab">
                                    <i class="fas fa-credit-card me-2"></i>Payment
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="pill" data-bs-target="#review"
                                    type="button" role="tab">
                                    <i class="fas fa-check-circle me-2"></i>Review
                                </button>
                            </li>
                        </ul>

                        <!-- Form Sections -->
                        <div class="tab-content">
                            <!-- Shipping Information -->
                            <div class="tab-pane fade show active" id="shipping" role="tabpanel">
                                <h4 class="mb-4">Shipping Information</h4>


                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstname"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastname" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone" id="phone" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="1234 Main St" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select" id="country" name="country" required>
                                            <option value="">Choose...</option>
                                            <!-- <option>United States</option>
                                            <option>Canada</option>
                                            <option>United Kingdom</option> -->
                                            <option>India</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state" class="form-label">State</label>
                                        <select class="form-select" name="state" id="state" required>
                                            <option value="">Choose...</option>
                                            <option>Maharastra</option>
                                            <option>Andhra Pradesh</option>
                                            <option>Arunachal Pradesh</option>
                                            <option>Assam</option>
                                            <option>Bihar</option>
                                            <option>Chhattisgarh</option>
                                            <option>Goa</option>
                                            <option>Gujarat</option>
                                            <option>Haryana</option>
                                            <option>Himachal Pradesh</option>
                                            <option>Jharkhand</option>
                                            <option>Jharkhand</option>
                                            <option>Kerala</option>
                                            <option>Madhya Pradesh</option>
                                            <option>Madhya Pradesh</option>
                                            <option>Meghalaya</option>
                                            <option>Mizoram</option>
                                            <option>Nagaland</option>
                                            <option>Odisha</option>
                                            <option>Punjab</option>
                                            <option>Rajasthan</option>
                                            <option>Telangana</option>
                                            <option>Tripura</option>
                                            <option>Uttar Pradesh</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" id="city" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="zip" class="form-label">Zip Code</label>
                                        <input type="text" class="form-control" name="zip_code" id="zip" required>
                                        <input type="hidden" name="date" id="dateVisible">
                                    </div>

                                    <!-- <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="saveAddress">
                                            <label class="form-check-label" for="saveAddress">
                                                Save this address for future use
                                            </label>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="cart.php"><button type="button" class="btn btn-outline-secondary" disabled>
                                            <i class="fas fa-chevron-left me-2"></i>Back
                                        </button></a>
                                    <button type="button" class="btn btn-primary" onclick="nextStep('payment')">
                                        Continue to Payment<i class="fas fa-chevron-right ms-2"></i>
                                    </button>
                                </div>

                            </div>

                            <!-- Payment Information -->
                            <div class="tab-pane fade" id="payment" role="tabpanel">
                                <h4 class="mb-4">Payment Method</h4>

                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod"
                                            value="Credit/Debit Card" id="creditCard" checked>
                                        <label class="form-check-label fw-bold" for="creditCard">
                                            Credit/Debit Card
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" value="PayPal"
                                            id="paypal">
                                        <label class="form-check-label fw-bold" for="paypal">
                                            PayPal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod"
                                            value="Cash on Delivery" id="cod">
                                        <label class="form-check-label fw-bold" for="cod">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                </div>

                                <!-- Credit Card Form (shown by default) -->
                                <div id="creditCardForm">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="cardNumber" class="form-label">Card Number</label>
                                            <input type="text" class="form-control" id="cardNumber"
                                                placeholder="1234 5678 9012 3456">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cardName" class="form-label">Name on Card</label>
                                            <input type="text" class="form-control" id="cardName">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cardExpiry" class="form-label">Expiry Date</label>
                                            <input type="text" class="form-control" id="cardExpiry" placeholder="MM/YY">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cardCvv" class="form-label">CVV</label>
                                            <input type="text" class="form-control" id="cardCvv" placeholder="123">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="date" id="datevisiable">
                                <!-- PayPal Form (hidden by default) -->
                                <div id="paypalForm" class="d-none text-center py-4">
                                    <p>You will be redirected to PayPal to complete your payment</p>
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="fab fa-paypal me-2"></i>Pay with PayPal
                                    </button>
                                </div>

                                <!-- COD Form (hidden by default) -->
                                <div id="codForm" class="d-none text-center py-4">
                                    <p>Pay with cash when your order is delivered</p>
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery
                                    </button>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="prevStep('shipping')">
                                        <i class="fas fa-chevron-left me-2"></i>Back
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep('review')">
                                        Review Order<i class="fas fa-chevron-right ms-2"></i>
                                    </button>
                                </div>

                            </div>

                            <!-- Order Review -->
                            <div class="tab-pane fade" id="review" role="tabpanel">
                                <h4 class="mb-4">Order Summary</h4>

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Shipping Information</h5>
                                        <p id="reviewShippingInfo" class="card-text">
                                            <!-- Dynamically filled with shipping info -->
                                        </p>
                                    </div>
                                </div>

                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Payment Method</h5>
                                        <p id="reviewPaymentInfo" class="card-text">
                                            <!-- Dynamically filled with payment info -->
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Order Items</h5>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $total = 0;
                                                    $customer_id = $_SESSION["customer_id"];
                                                    $query = "SELECT * FROM tbl_cart INNER JOIN tbl_product ON tbl_product.product_id = tbl_cart.cart_product_id WHERE tbl_cart.cart_customer_id = $customer_id";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $lineTotal = $row['cart_qty'] * $row['product_sell_price'];
                                                        $total += $lineTotal;
                                                        
                                                        ?>
                                                        <tr>
                                                            <td><?= $row["product_name"] ?></td>
                                                            <td><?= $row["product_sell_price"] ?></td>
                                                            <td><?= $row["cart_qty"] ?></td>
                                                            <td><?=$lineTotal ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3">Subtotal</th>
                                                        <th>₹ <?= $total ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3">Shipping</th>
                                                        <th>Free</th>
                                                    </tr>
                                                    <tr class="fw-bold">
                                                        <th colspan="3">Total</th>
                                                        <th><span class="badge bg-success">₹ <?= $total ?></span></th>

                                                    </tr>
                                                </tfoot>

                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="prevStep('payment')">
                                        <i class="fas fa-chevron-left me-2"></i>Back
                                    </button>
                                    <button type="submit" name="submit" value="submit" class="btn btn-success"
                                        onclick="placeOrder()">
                                        Place Order<i class="fas fa-check ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                    <?php
                    $total = 0;
                    $customer_id = $_SESSION["customer_id"];
                    $query = "SELECT * FROM tbl_cart INNER JOIN tbl_product ON tbl_product.product_id = tbl_cart.cart_product_id WHERE tbl_cart.cart_customer_id = $customer_id";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {

                        $lineTotal = $row['cart_qty'] * $row['product_sell_price'];
                        $total += $lineTotal;
                    }
                    ?>
                    <div class="card-header bg-white py-3">
                        <h2 class="h5 mb-0">Order Summary</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal (2 items)</span>
                            <span><?= $total ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-between fw-bold mb-3">
                            <span>Total</span>
                            <span>₹ <?= $total ?></span>
                            <input type="hidden" value="<?= $total ?>" name="total">
                        </div>

                        <div class="accordion mb-4" id="promoAccordion">
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#promoCollapse">
                                        <i class="fas fa-tag me-2 text-success"></i>Have a promo code?
                                    </button>
                                </h2>
                                <div id="promoCollapse" class="accordion-collapse collapse"
                                    data-bs-parent="#promoAccordion">
                                    <div class="accordion-body p-2 bg-light">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter promo code">
                                            <button class="btn btn-success" type="button">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <div>
                                Your order qualifies for free shipping!
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>

    setTimeout(() => {
        document.getElementById("dateVisible").value = new Date().getFullYear() + "-" + ("0" + (new Date().getMonth() + 1)) + "-" + new Date().getDate();
    }, 100)

    // Handle payment method selection
    document.querySelectorAll('input[name="paymentMethod"]').forEach(radio => {
        radio.addEventListener('change', function () {
            document.getElementById('creditCardForm').classList.add('d-none');
            document.getElementById('paypalForm').classList.add('d-none');
            document.getElementById('codForm').classList.add('d-none');

            if (this.id === 'creditCard') {
                document.getElementById('creditCardForm').classList.remove('d-none');
            } else if (this.id === 'paypal') {
                document.getElementById('paypalForm').classList.remove('d-none');
            } else if (this.id === 'cod') {
                document.getElementById('codForm').classList.remove('d-none');
            }
        });
    });

    // Navigation between steps
    function nextStep(step) {
        const nextTab = document.querySelector(`#${step}-tab`);
        const tab = new bootstrap.Tab(nextTab);
        tab.show();
    }

    function prevStep(step) {
        const prevTab = document.querySelector(`#${step}-tab`);
        const tab = new bootstrap.Tab(prevTab);
        tab.show();
    }

    function placeOrder() {
        // Here you would typically submit the form via AJAX
        alert('Order placed successfully!');
        // window.location.href = 'order-confirmation.php';
    }

    // Update review section with entered information
    document.getElementById('shippingForm').addEventListener('submit', function (e) {
        e.preventDefault();
        // Update review section with shipping info
        const shippingInfo = `
            ${document.getElementById('firstName').value} ${document.getElementById('lastName').value}<br>
            ${document.getElementById('address').value}<br>
            ${document.getElementById('city').value}, ${document.getElementById('state').value} ${document.getElementById('zip').value}<br>
            ${document.getElementById('country').value}<br>
            ${document.getElementById('email').value}<br>
            ${document.getElementById('phone').value}
        `;
        document.getElementById('reviewShippingInfo').innerHTML = shippingInfo;
    });

    // Update review section with payment info
    document.getElementById('paymentForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').id;
        let paymentInfo = '';

        if (paymentMethod === 'creditCard') {
            paymentInfo = `Credit Card ending in ${document.getElementById('cardNumber').value.slice(-4)}`;
        } else if (paymentMethod === 'paypal') {
            paymentInfo = 'PayPal';
        } else {
            paymentInfo = 'Cash on Delivery';
        }

        document.getElementById('reviewPaymentInfo').innerHTML = paymentInfo;
    });
</script>


<?php
include 'footer.php';
?>