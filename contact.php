<?php include "header.php"; ?>

<!-- Toast Notification Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
            toast.show();
        }
    });
</script>

<?php if (isset($_SESSION['contact_us'])): ?>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055; margin-top: 80px;">
        <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= htmlspecialchars($_SESSION['contact_us']) ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['contact_us']); ?>
<?php endif; ?>

<!-- Hero Section -->
<div class="contact-hero bg-dark text-white py-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-5 fw-bold mb-3">Get In Touch</h1>
                <p class="lead mb-4">We're here to help and answer any questions you might have.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#contact-form" class="btn btn-warning btn-lg px-4">Contact Us</a>
                    <a href="#contact-info" class="btn btn-outline-light btn-lg px-4">Our Info</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="contact-section py-5" id="contact-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 overflow-hidden">
                    <div class="row g-0">
                        <!-- Contact Form Column -->
                        <div class="col-lg-7 p-4 p-lg-5">
                            <div class="card-body">
                                <h2 class="card-title text-warning mb-4">Send Us a Message</h2>
                                <p class="text-muted mb-4">Fill out the form below and our team will get back to you within 24 hours.</p>

                                <form action="contact_insert.php" method="post" class="needs-validation" novalidate>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                                <label for="name">Your Name*</label>
                                                <div class="invalid-feedback">
                                                    Please provide your name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                                <label for="email">Email Address*</label>
                                                <div class="invalid-feedback">
                                                    Please provide a valid email.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                                <label for="subject">Subject*</label>
                                                <div class="invalid-feedback">
                                                    Please provide a subject.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 150px" required></textarea>
                                                <label for="message">Your Message*</label>
                                                <div class="invalid-feedback">
                                                    Please enter your message.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="submit" class="btn btn-warning px-4 py-3 fw-bold">
                                                    <i class="fas fa-paper-plane me-2"></i> Send Message
                                                </button>
                                                <button type="reset" class="btn btn-outline-secondary px-4 py-3">
                                                    <i class="fas fa-undo me-2"></i> Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Contact Info Column -->
                        <div class="col-lg-5 bg-warning bg-opacity-10 p-4 p-lg-5" id="contact-info">
                            <div class="h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="h4 fw-bold mb-4 text-warning">Contact Information</h3>
                                    <p class="mb-4">Have questions about our products or services? Reach out to us through any of the channels below.</p>

                                    <div class="contact-info-item bg-white p-4 rounded-3 shadow-sm mb-3">
                                        <div class="d-flex">
                                            <div class="me-3 text-warning">
                                                <i class="fas fa-map-marker-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="h6 fw-bold mb-1">Our Location</h4>
                                                <p class="mb-0 text-muted">413102, Baramati, Pune, Maharashtra</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contact-info-item bg-white p-4 rounded-3 shadow-sm mb-3">
                                        <div class="d-flex">
                                            <div class="me-3 text-warning">
                                                <i class="fas fa-envelope fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="h6 fw-bold mb-1">Email Us</h4>
                                                <p class="mb-0 text-muted">swiftbasketO10@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contact-info-item bg-white p-4 rounded-3 shadow-sm">
                                        <div class="d-flex">
                                            <div class="me-3 text-warning">
                                                <i class="fas fa-phone-alt fa-2x"></i>
                                            </div>
                                            <div>
                                                <h4 class="h6 fw-bold mb-1">Call Us</h4>
                                                <p class="mb-0 text-muted">0000-121-1111</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="ratio ratio-16x9 rounded-3 overflow-hidden shadow-sm">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d242211.92749956925!2d73.8394112!3d18.4582144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1743749443420!5m2!1sen!2sin" 
                                                style="border:0;" allowfullscreen="" loading="lazy" 
                                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="text-muted">Find quick answers to common questions about our services.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                How quickly can I expect a response to my inquiry?
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We typically respond to all inquiries within 24 hours during business days. For urgent matters, please call our customer service number.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                What are your business hours?
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our customer service team is available Monday through Friday from 9:00 AM to 6:00 PM. We're closed on weekends and public holidays.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Can I visit your physical location?
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Currently, we operate primarily online, but you're welcome to visit our headquarters by appointment. Please contact us to schedule a visit.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>

<style>
    .contact-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
        background-size: cover;
    }
    
    .contact-section {
        background-color: rgba(248, 249, 250, 0.9);
    }
    
    .contact-info-item {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .contact-info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1) !important;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: rgba(255, 193, 7, 0.1);
        color: #ffc107;
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(255, 193, 7, 0.25);
    }
</style>

<script>
    // Form validation
    (function () {
        'use strict'
        
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
        
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>