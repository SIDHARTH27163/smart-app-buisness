<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>About Us </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="60x60" href="./assets/img/fabicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/img/fabicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/fabicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/img/fabicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/img/fabicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/img/fabicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/img/fabicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/fabicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./assets/img/fabicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/fabicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/img/fabicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/fabicons/favicon-16x16.png">
    <link rel="manifest" href="./assets/img/fabicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./assets/img/fabicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  <!-- Main CSS File -->
  <link href="assets/css/main.css?<?php echo time(); ?>" rel="stylesheet">


</head>

<body class="starter-page-page">

<?php include ('./components/header.php');
 include('./Admin/includes/db.php');
 
 ?>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index">Home</a></li>
            <li class="current">About Us</li>
          </ol>
        </nav>
        <h1>Contact Us</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <div class="container" data-aos="fade-up">
      <section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Contact</h2>
  <p>We’d love to hear from you! At Lookin, we value open communication and are here to assist you with any inquiries or project discussions. Whether you have questions about our services or need a consultation, feel free to reach out. Contact us today, and let’s start transforming your ideas into reality!</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

<div class="row gy-4">

<div class="col-lg-5">

<div class="info-wrap">
<div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
<i class="bi bi-geo-alt flex-shrink-0"></i>
<div>
  <h3>Address</h3>
  <p>Chillgari Dharamshala Kangra Himachal Pardesh pin:176061</p>
</div>
</div><!-- End Info Item -->

<div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
<i class="bi bi-telephone flex-shrink-0"></i>
<div>
  <h3>Call Us</h3>
  <p>+91 7807127163</p>
</div>
</div><!-- End Info Item -->

<div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
<i class="bi bi-envelope flex-shrink-0"></i>
<div>
  <h3>Email Us</h3>
  <p>info@lookindharamshala.com</p>
</div>
</div><!-- End Info Item -->


</div>
</div>

<div class="col-lg-7">
<form id="contactForm" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
<div class="row gy-4">
<div class="col-md-6">
<label for="name-field" class="pb-2">Your Name</label>
<input type="text" name="name" id="name-field" class="form-control" required="">
</div>
<div class="col-md-6">
<label for="email-field" class="pb-2">Your Email</label>
<input type="email" class="form-control" name="email" id="email-field" required="">
</div>
<div class="col-md-12">
<label for="subject-field" class="pb-2">Subject</label>
<input type="text" class="form-control" name="subject" id="subject-field" required="">
</div>
<div class="col-md-12">
<label for="message-field" class="pb-2">Message</label>
<textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
</div>
<div class="col-md-12 text-center">
<div class="loading" style="display:none;">Loading...</div>
<div class="sent-message" style="display:none;"></div>
<div class="error-message" style="display:none;"></div>
<button type="submit">Send Message</button>
</div>
</div>
</form>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', async function(event) {
event.preventDefault(); // Prevent form from submitting normally

const form = event.target;
const formData = new FormData(form);
const loadingMessage = document.querySelector('.loading');
const sentMessage = document.querySelector('.sent-message');
const errorMessage = document.querySelector('.error-message');

loadingMessage.style.display = 'block';
sentMessage.style.display = 'none';
errorMessage.style.display = 'none';

const response = await fetch('send-email.php', {
method: 'POST',
body: formData
});

const result = await response.json();
loadingMessage.style.display = 'none';

if (result.status === 'success') {
sentMessage.style.display = 'block';
sentMessage.textContent = result.message;
form.reset(); // Clear form fields on success
} else {
errorMessage.style.display = 'block';
errorMessage.textContent = result.message;
}

});
</script>

</div>

</div>

</section><!-- /Contact Section -->

      </div>

    </section><!-- /Starter Section Section -->

  </main>

  <?php include('./components/footer.php') ?>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>