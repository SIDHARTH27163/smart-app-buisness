<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home : Lookin </title>
  <meta name="description" content="Welcome to Lookin, where innovation meets excellence! We are a dedicated team of professionals committed to transforming your ideas into reality through cutting-edge technology and creative design.">
  <meta name="keywords" content="Lookin , Lookin Dharamshala , Lookin India , Dharamshala Software Company , lookindharamshala">

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
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
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

<body class="index-page">

 <?php include ('./components/header.php');
 include('./Admin/includes/db.php');
 
 ?>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Best and Perfect Solutions For Your Business</h1>
            <p>We are team of talented Software Developers and Engineers Developing softwares for your buisness </p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/banner.png" class="img-fluid animated" alt="Lookin Dharamshala">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

  


    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>At Lookin, we specialize in software development, app development, and graphic design. Our dedicated team delivers tailored solutions that enhance efficiency and user experience. With a focus on innovation and quality, we transform your ideas into reality, ensuring your brand stands out in a competitive market.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

        <?php
// Include the database connection file


// Fetch data from the 'services' table
$sql = "SELECT service_name, service_desc, image_path FROM services";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Loop through and display each service
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
                <div class="icon">
                   
                <img src="./Admin/services/<?php echo basename($row['image_path']); ?>" alt="Service Image" class="img-fluid" style="width: 200px; height: 200px;">
``

                </div>
                <h3 class="stretched-link"><?php echo $row['service_name']; ?></h3>
                <p class="text-justify"><?php echo $row['service_desc']; ?></p>
            </div>
        </div>
        <?php
    }
} else {
    echo "No services found.";
}
?>

          
          <!-- End Service Item -->

          <!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assets/img/cta-bg.jpg" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Call To Action</h3>
            <p>Ready to take your project to the next level? At Lookin, we’re here to help you every step of the way. Whether you need software development, app creation, or graphic design, our team is eager to collaborate with you. Contact us today for a free consultation and let’s bring your ideas to life!</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#contact">Call To Action</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>our portfolio showcases the diverse range of projects we've successfully completed for clients across various industries. From innovative software solutions to engaging mobile applications and stunning graphic designs, each project reflects our commitment to quality and creativity. Explore our work to see how we bring ideas to life and drive results for our clients.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

         

        

           



<?php
// Include the database connection file


// Fetch data from the 'services' table
$sql2 = "SELECT * FROM portfolio";
$result = $conn->query($sql2);

// Check if there are results
if ($result->num_rows > 0) {?>
  <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
    <?php
    // Loop through and display each service
    while ($row = $result->fetch_assoc()) {
        ?>
        <h4><?php echo $row['project_name']; ?></h4>
         <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
            <img src="./Admin/portfolio/<?php echo basename($row['image_path']); ?>" class="img-fluid" alt="<?php echo $row['project_name']; ?>">
            <div class="portfolio-info">
                <h4><?php echo $row['project_name']; ?></h4>
                
              
                <a href="portfolio-details.php?project=<?php echo $row['id']; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>

        <?php
    }?>

    </div>
    <?php
} else {
    echo "No services found.";
}
?>
          <!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p> our team is our greatest asset. Comprising talented professionals from diverse backgrounds, we bring together expertise in software development, app development, and graphic design. Each team member is passionate about innovation and committed to delivering exceptional results. Together, we collaborate to turn your vision into reality, ensuring your project’s success.

</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

        <?php
// Include the database connection file

// Fetch data from the 'teams' table
$sql = "SELECT member_name , gmail , portfolio , description , image_path FROM team";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Loop through and display each team member
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
                <div class="pic">
                    <!-- Display team member's image -->
                    <img src="./Admin/team/<?php echo basename($row['image_path']); ?>" class="img-fluid" alt="Team Member" style="height:150px; width:200px; object-fit: contain;">

                </div>
                <div class="member-info">
                    <!-- Display team member's name -->
                    <h4><?php echo $row['member_name']; ?></h4>
                    <!-- Display team member's position -->
                    <span>Software Developer</span>
                    <!-- Display team member's bio -->
                    <p><?php echo $row['description']; ?></p>
                    <div class="social">
                        <!-- Display social media links if available -->
                       
                       
                            <a target="_blank" href="<?php echo $row['portfolio']; ?>"><i class="bi bi-link"></i></a>
                            <a target="_blank" href="<?php echo $row['gmail']; ?>"><i class="bi bi-envelope"></i></a>
                 
                    </div>
                </div>
            </div>
        </div><!-- End Team Member -->
        <?php
    }
} else {
    echo "No team members found.";
}
?>


      
         
        </div>

      </div>

    </section><!-- /Team Section -->

   
    <!-- Contact Section -->
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

  </main>
<?php include('./components/footer.php') ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader
  <div id="preloader"></div> -->

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