<?php
// Include database connection
require_once('./Admin/includes/db.php');

// Check if 'project' ID is passed in the URL
if (isset($_GET['project'])) {
    $projectId = $_GET['project'];

    // Query to get portfolio details
    $query = "SELECT * FROM portfolio WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $project = $result->fetch_assoc();
    } else {
        echo "Project not found.";
        exit;
    }

    // Query to get gallery images associated with this project
    $galleryQuery = "SELECT image_path FROM gallery WHERE portfolio_id = ?";
    $galleryStmt = $conn->prepare($galleryQuery);
    $galleryStmt->bind_param("i", $projectId);
    $galleryStmt->execute();
    $galleryResult = $galleryStmt->get_result();
} else {
    echo "Invalid project ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Portfolio Details <?php echo htmlspecialchars($project['project_name']); ?></title>
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

<body class="portfolio-details-page">

<?php include ('./components/header.php');
 include('./Admin/includes/db.php');
 
 ?>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Portfolio Details</li>
          </ol>
        </nav>
        <h1>Portfolio Details</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

               

               
                <?php
              // Loop through each gallery image and display it in a swiper slide
              while ($galleryImage = $galleryResult->fetch_assoc()) {?>
                 <div class="swiper-slide">
                  <img src="./Admin/gallery/<?php echo basename($galleryImage['image_path']); ?>" alt="<?php echo htmlspecialchars($project['project_name']); ?>">
                </div>
            <?php  }
              ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
           
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2><?php echo htmlspecialchars($project['project_name']); ?></h2>
              <h2><?php echo htmlspecialchars($project['category']); ?></h2>
              <p>
              <?php echo htmlspecialchars($project['description']); ?>
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

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