<?php
include "header.php";
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .hero {
            background: linear-gradient(120deg, rgb(241, 177, 14), rgb(241, 177, 14));
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
</head>


<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1 class="display-5 fw-bold text-dark">How can we help you?</h1>
        <p class="lead text-dark">Find answers to your questions or get in touch with us.</p>
    </div>
</section>

<!-- Main Help Options -->
<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <h5 class="card-title">Track Your Order</h5>
                    <p class="card-text">Find the status and location of your order with our tracking tool.</p>
                    <a href="#" class="btn btn-warning">Track Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <h5 class="card-title">Return & Refund</h5>
                    <p class="card-text">Need help with returns or refunds? Check our return policy and initiate a
                        return.</p>
                    <a href="#" class="btn btn-warning">Start Return</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 text-center p-4">
                <div class="card-body">
                    <h5 class="card-title">Payment Issues</h5>
                    <p class="card-text">Get support for payment failures, double charges or coupon errors.</p>
                    <a href="#" class="btn btn-warning">Get Help</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="container mb-5">
    <h3 class="mb-4">Frequently Asked Questions</h3>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                    How can I cancel my order?
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    You can cancel your order before it is shipped from the “My Orders” page under your account.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse2">
                    What payment methods are accepted?
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse">
                <div class="accordion-body">
                    We accept all major credit/debit cards, UPI, wallets, and net banking.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse3">
                    How do I return an item?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse">
                <div class="accordion-body">
                    Go to “My Orders”, select the item, and click “Return”. Follow the steps to schedule a pickup.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Us -->
<div class="container mb-5">
    <h3 class="mb-4">Still need help?</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="p-4 border rounded shadow-sm bg-light">
                <h5>Email Us</h5>
                <p>support@swiftbasket.com</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 border rounded shadow-sm bg-light">
                <h5>Call Us</h5>
                <p>+91 98765 43210 (Mon–Sat, 10AM–6PM)</p>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>