<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gro Artistry - Professional Services</title>
    
    <?php require 'includes/links.php'; ?>

</head>

<body>
    
<?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section id="home" class="hero-section bg-gradient py-5 text-center text-white">
        <div class="container py-5">
            <h1 class="display-4 fw-bold mb-4">Welcome to Gro Artistry</h1>
            <p class="lead">Professional Services at Your Fingertips</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="media/Photo.jpg" alt="Profile Photo" class="img-fluid rounded-circle shadow">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-4">About Me</h2>
                    <p class="lead">Welcome to Gro Artistry! I'm passionate about delivering exceptional service and creating meaningful experiences for every client. With years of dedication and expertise in my craft, I've had the privilege of serving hundreds of satisfied customers.</p>
                    <p>My approach is centered on understanding your unique needs and exceeding your expectations. Whether you're looking for professional guidance, quality service, or personalized attention, I'm here to help you achieve your goals with integrity and excellence.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section id="appointment" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="mb-4">Book Your Appointment</h2>
                    <p class="lead mb-4">Ready to experience professional service? Schedule your appointment today and take the first step towards achieving your goals. Our calendar is managed conveniently online for your ease.</p>
                    <p>Simply click the button below to access our appointment scheduling system. Choose a time that works best for you, and we'll confirm your booking promptly.</p>
                </div>
                <div class="col-md-4 text-center">
                    <a href="https://calendly.com/" target="_blank" class="btn btn-primary btn-lg">
                        <i class="fas fa-calendar-alt me-2"></i> Schedule Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Client Reviews</h2>
            <div class="row">
                <!-- Review 1 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                            </div>
                            <p class="card-text">"Exceptional service from start to finish! The attention to detail and professionalism was outstanding. I highly recommend Gro Artistry to anyone looking for quality work."</p>
                            <footer class="blockquote-footer">Sarah Johnson</footer>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                            </div>
                            <p class="card-text">"I was impressed by the prompt response and the level of care taken with my needs. The results exceeded my expectations. Definitely coming back!"</p>
                            <footer class="blockquote-footer">Michael Chen</footer>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                            </div>
                            <p class="card-text">"Professional, reliable, and results-oriented. The team goes above and beyond to ensure customer satisfaction. Worth every penny!"</p>
                            <footer class="blockquote-footer">Emily Rodriguez</footer>
                        </div>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="mb-3">
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                                <i class="fas fa-star text-warning card-star"></i>
                            </div>
                            <p class="card-text">"Best decision I made! The expertise and friendliness made the whole experience pleasant. Highly recommended to all my friends and family."</p>
                            <footer class="blockquote-footer">David Thompson</footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center mb-5">Get In Touch</h2>
                    <form id="contactForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>

                    <!-- Success Message -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = htmlspecialchars($_POST['name'] ?? '');
                        $email = htmlspecialchars($_POST['email'] ?? '');
                        $phone = htmlspecialchars($_POST['phone'] ?? '');
                        $message = htmlspecialchars($_POST['message'] ?? '');

                        if ($name && $email && $message) {
                            echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    <strong>Thank you, ' . $name . '!</strong> Your message has been received. We\'ll get back to you soon.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Smooth Scrolling Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
