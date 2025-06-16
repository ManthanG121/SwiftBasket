<?php include "header.php"; ?>

<section class="contact-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow border-0">
                    <div class="row g-0">
                        <!-- Contact Form Column -->
                        <div class="col-lg-7 p-4 p-lg-5">
                            <div class="card-body">
                                <h2 class="card-title text-success mb-4">Contact Us</h2>
                                <p class="text-muted mb-4">Have questions? We're here to help! Fill out the form below and we'll get back to you soon.</p>
                                
                                <form action="sendcontact.php" method="post">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                                <label for="name">Name*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                                <label for="email">Email*</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                                <label for="subject">Subject*</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="message" name="message" placeholder="Your Message" style="height: 120px" required></textarea>
                                                <label for="message">Message*</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-3">
                                                <button type="submit" class="btn btn-success px-4 py-2">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary px-4 py-2">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Contact Info Column -->
                        <div class="col-lg-5 bg-light p-4 p-lg-5">
                            <div class="h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="h5 fw-bold mb-4">Our Contact Information</h3>
                                    
                                    <div class="d-flex mb-4">
                                        <div class="me-3 text-success">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 fw-bold mb-1">Address</h4>
                                            <p class="mb-0 text-muted">413102, Baramati, Pune, Maharashtra</p>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex mb-4">
                                        <div class="me-3 text-success">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 fw-bold mb-1">Email</h4>
                                            <p class="mb-0 text-muted">swiftbasketO10@gmail.com</p>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex mb-4">
                                        <div class="me-3 text-success">
                                            <i class="fas fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="h6 fw-bold mb-1">Phone</h4>
                                            <p class="mb-0 text-muted">0000-121-1111</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d242211.92749956925!2d73.8394112!3d18.4582144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1743749443420!5m2!1sen!2sin" 
                                                style="border:0;" 
                                                allowfullscreen="" 
                                                loading="lazy" 
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

<?php include "footer.php"; ?>

<style>
    .contact-section {
        background-color: rgba(248, 249, 250, 0.8);
    }
    .form-floating textarea.form-control {
        height: auto;
    }
    .bg-light {
        background-color: #f8f9fa!important;
    }
</style>