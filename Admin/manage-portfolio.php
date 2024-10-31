
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
    include './Components/sidebar.php';
    ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include ('./Components/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manage Portfolio</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="container mx-auto">
                    <?php 
// Include the database connection file
include('./includes/db.php');

// Initialize alert variables to hold messages for success or error
$alertMessage = '';
$alertType = '';

$table = "portfolio";
$sql = "CREATE TABLE IF NOT EXISTS $table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,  -- Changed VARCHAR(255) to TEXT for longer descriptions
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute table creation query
$conn->query($sql);
$galleryTable = "gallery";
$sql1 = "CREATE TABLE IF NOT EXISTS $galleryTable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    portfolio_id INT(6) UNSIGNED NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (portfolio_id) REFERENCES portfolio(id) ON DELETE CASCADE
)";
$conn->query($sql1);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Existing form data processing for portfolio
    $project_name = $conn->real_escape_string($_POST['project_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $description = $conn->real_escape_string($_POST['description']);  // Escape special characters
    $portfolioID = null;  // This will be the ID of the inserted portfolio

    // Portfolio image upload
    $target_dir = "portfolio/";
    $image_name = uniqid() . "_" . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Gallery image upload processing
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO portfolio (project_name, category, description, image_path)
                VALUES ('$project_name', '$category', '$description', '$target_file')";
        
        if ($conn->query($sql) === TRUE) {
            $portfolioID = $conn->insert_id;
            $alertMessage = "Portfolio added successfully!";
            $alertType = 'success';

            // Handle gallery images if uploaded
            if (!empty($_FILES['gallery_images']['name'][0])) {
                $gallery_dir = "gallery/";
                
                foreach ($_FILES['gallery_images']['tmp_name'] as $key => $tmp_name) {
                    $gallery_image_name = uniqid() . "_" . basename($_FILES['gallery_images']['name'][$key]);
                    $gallery_file = $gallery_dir . $gallery_image_name;

                    // Upload each gallery image
                    if (move_uploaded_file($tmp_name, $gallery_file)) {
                        // Insert into gallery table
                        $sql = "INSERT INTO gallery (portfolio_id, image_path) VALUES ('$portfolioID', '$gallery_file')";
                        $conn->query($sql);
                    }
                }
            }
        } else {
            $alertMessage = "Error: " . $sql . "<br>" . $conn->error;
            $alertType = 'danger';
        }
    }
}

?> 



<!-- HTML form for  portfolio input -->
<!-- HTML form for  portfolio input -->
<form class="user" id="teamForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <!-- Show alert if any -->
    <?php if (!empty($alertMessage)): ?>
    <div class="alert alert-<?php echo $alertType; ?>" role="alert">
        <?php echo $alertMessage; ?>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="project_name" id="project_name"
            placeholder="Enter Project Name...">
        <span id="projectnameError" class="error-text text-danger ml-2 mt-2"></span>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="category" id="category"
            placeholder="Enter Category...">
        <span id="categoryError" class="error-text text-danger ml-2 mt-2"></span>
    </div>
    
    <div class="form-group">
        <textarea class="form-control" name="description" id="description" rows="2"
            placeholder="Enter Description..."></textarea>
        <span id="descriptionError" class="error-text text-danger ml-2 mt-2"></span>
    </div>
    <div class="form-group">
        <input type="file" class="form-control" name="image" id="image">
        <span id="imageError" class="error-text text-danger ml-2 mt-2"></span>
    </div>
    <div class="form-group">
        <input type="file" class="form-control" name="gallery_images[]" id="gallery_images" multiple>
        <span id="galleryError" class="error-text text-danger ml-2 mt-2"></span>
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit">Submit</button>
</form>

                    </div>
                    <div class="conatiner mx-auto">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                            <h1 class="h3 mb-0 text-gray-800">Manage Portfolio</h1>

                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <?php
// Include the database connection file
include('./includes/db.php');


$sql = "SELECT project_name, category,  image_path, created_at FROM portfolio";
$result = $conn->query($sql);
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>category</th>
           
            <th>Image</th>
            <th>Date Added</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Project Name</th>
            <th>Email</th>
           
            <th>Image</th>
            <th>Date Added</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        // Check if there are any results from the query
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                  
                    <td><img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Member Image" width="50"></td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>No  portfolios found.</td></tr>";
        }
        ?>
    </tbody>
</table>


</div>

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="js/portfolio-validation.js"></script>

</body>

</html>