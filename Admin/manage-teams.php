<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Manage Team</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="container mx-auto">
                    <?php
// Include the database connection file
include('./includes/db.php');

// Initialize alert variables to hold messages for success or error
$alertMessage = '';
$alertType = '';

// Create 'team' table if it doesn't exist
$table = "team";
$sql = "CREATE TABLE IF NOT EXISTS $table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member_name VARCHAR(255) NOT NULL,
    gmail VARCHAR(255) NOT NULL,
    portfolio VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
// Execute table creation query
$conn->query($sql);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $member_name = $_POST['member_name'];
    $gmail = $_POST['gmail'];
    $portfolio = $_POST['portfolio'];
    $description = $_POST['description'];

    // Set up file upload configuration
    $target_dir = "team/"; // Directory to store the uploaded images
    $image_name = uniqid() . "_" . basename($_FILES["image"]["name"]); // Generate a unique image name
    $target_file = $target_dir . $image_name; // Full path for the uploaded file
    $uploadOk = 1; // Initialize upload flag
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // File extension

    // Validate if file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $alertMessage = "File is not an image.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // Check if the file already exists in the target directory
    if (file_exists($target_file)) {
        $alertMessage = "Sorry, file already exists.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // Check if file size exceeds the 5MB limit
    if ($_FILES["image"]["size"] > 5000000) {
        $alertMessage = "Sorry, your file is too large.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // Allow only certain file formats (JPG, JPEG, PNG, GIF)
    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_types)) {
        $alertMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // If all checks passed, proceed to upload and database insertion
    if ($uploadOk == 0) {
        $alertMessage = "Sorry, your file was not uploaded.";
        $alertType = 'danger';
    } else {
        // Attempt to move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert team member data into the database
            $sql = "INSERT INTO $table (member_name, gmail, portfolio, description, image_path)
                    VALUES ('$member_name', '$gmail', '$portfolio', '$description', '$target_file')";

            // Check if data insertion is successful
            if ($conn->query($sql) === TRUE) {
                $alertMessage = "Team member added successfully!";
                $alertType = 'success';
            } else {
                // Display error if insertion fails
                $alertMessage = "Error: " . $sql . "<br>" . $conn->error;
                $alertType = 'danger';
            }
        } else {
            // Display error if file upload fails
            $alertMessage = "Sorry, there was an error uploading your file.";
            $alertType = 'danger';
        }
    }
}
?>


<!-- HTML form for team member input -->
<!-- HTML form for team member input -->
<form class="user" id="teamForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <!-- Show alert if any -->
    <?php if (!empty($alertMessage)): ?>
    <div class="alert alert-<?php echo $alertType; ?>" role="alert">
        <?php echo $alertMessage; ?>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="member_name" id="member_name"
            placeholder="Enter Member Name...">
        <span id="memberNameError" class="error-text text-danger ml-2 mt-2"></span>
    </div>
    <div class="form-group">
        <input type="email" class="form-control form-control-user" name="gmail" id="gmail"
            placeholder="Enter Gmail...">
        <span id="gmailError" class="error-text text-danger ml-2 mt-2"></span>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="portfolio" id="portfolio"
            placeholder="Enter Portfolio URL...">
        <span id="portfolioError" class="error-text text-danger ml-2 mt-2"></span>
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

    <button class="btn btn-primary btn-user btn-block" type="submit">Submit</button>
</form>

                    </div>
                    <div class="conatiner mx-auto">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                            <h1 class="h3 mb-0 text-gray-800">Manage Team</h1>

                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <?php
// Include the database connection file
include('./includes/db.php');

// Fetch data from the 'team' table
$sql = "SELECT member_name, gmail, portfolio, image_path, created_at FROM team";
$result = $conn->query($sql);
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Member Name</th>
            <th>Email</th>
            <th>Portfolio</th>
            <th>Image</th>
            <th>Date Added</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Member Name</th>
            <th>Email</th>
            <th>Portfolio</th>
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
                    <td><?php echo htmlspecialchars($row['member_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['gmail']); ?></td>
                    <td><a href="<?php echo htmlspecialchars($row['portfolio']); ?>" target="_blank">View Portfolio</a></td>
                    <td><img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Member Image" width="50"></td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>No team members found.</td></tr>";
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

    <script src="js/teams-validation.js"></script>

</body>

</html>