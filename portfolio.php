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