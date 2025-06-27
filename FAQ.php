 <?php
 include 'header.php';
 ?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FAQs | SwiftBasket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    .hero {
      background: linear-gradient(120deg,rgb(241, 177, 14),rgb(241, 177, 14));
      color: white;
      padding: 60px 0;
      text-align: center;
    }
    .accordion-button:not(.collapsed) {
      background-color: #f1f5f9;
      color: #1e3a8a;
    }
  </style>
</head>


  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1 class="display-5 fw-bold">Frequently Asked Questions</h1>
      <p class="lead">Find quick answers to the most common questions about shopping on SwiftBasket.</p>
    </div>
  </section>

  <!-- FAQ Section -->
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="accordion" id="faqAccordion">

          <!-- Order FAQs -->
          <h4 class="mb-3">🛒 Orders & Shipping</h4>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                How do I place an order?
              </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show">
              <div class="accordion-body">
                Browse our products, add items to your cart, and proceed to checkout to complete your order.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                How can I track my order?
              </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse">
              <div class="accordion-body">
                Use the tracking link provided in your order confirmation email or visit our <a href="order-tracking.html">Order Tracking Page</a>.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                How long does delivery take?
              </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse">
              <div class="accordion-body">
                Most orders are delivered within 3–7 business days depending on your location.
              </div>
            </div>
          </div>

          <!-- Payment FAQs -->
          <h4 class="mt-5 mb-3">💳 Payments & Refunds</h4>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                What payment methods do you accept?
              </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse">
              <div class="accordion-body">
                We accept UPI, Credit/Debit Cards, Net Banking, and popular digital wallets.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq5">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                How do I request a refund?
              </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse">
              <div class="accordion-body">
                Initiate a return from your order page. Once approved, refunds are processed within 5–7 business days.
              </div>
            </div>
          </div>

          <!-- Return FAQs -->
          <h4 class="mt-5 mb-3">🔁 Returns & Support</h4>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq6">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
                Can I return a product?
              </button>
            </h2>
            <div id="collapse6" class="accordion-collapse collapse">
              <div class="accordion-body">
                Yes, items can be returned within 7 days of delivery if unused and in original packaging.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="faq7">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7">
                How do I contact customer support?
              </button>
            </h2>
            <div id="collapse7" class="accordion-collapse collapse">
              <div class="accordion-body">
                Email us at <strong>support@swiftbasket.com</strong> or call us at <strong>+91 98765 43210</strong> (Mon–Sat, 10AM–6PM).
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

 <?php
 include 'footer.php';
 ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
