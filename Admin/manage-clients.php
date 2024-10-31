
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Manage Clients</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="container mx-auto">
                        <?php
// Include the database connection file
include('./includes/db.php');

// Initialize alert variables
$alertMessage = '';
$alertType = '';

// Create table if it doesn't exist
$table = "clients";
$sql = "CREATE TABLE IF NOT EXISTS $table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(255) NOT NULL,
    website_link VARCHAR(255) NOT NULL,
    logo_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql); // Execute table creation query

// File upload logic
// File upload logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_name = $_POST['client_name'];
    $website_link = $_POST['website_link'];

    // File upload configuration
    $target_dir = "clients/";
    $imageFileType = strtolower(pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION));

    // Generate a unique file name
    $new_file_name = uniqid('client_', true) . '.' . $imageFileType; // Example: client_605b67b1c3f1d1.12345678.jpg
    $target_file = $target_dir . $new_file_name; // Update target file with new name
    $uploadOk = 1;

    // Check if image file is a valid image
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $alertMessage = "File is not an image.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // Check if file already exists (with the new name)
    if (file_exists($target_file)) {
        $alertMessage = "Sorry, file already exists.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["logo"]["size"] > 5000000) {
        $alertMessage = "Sorry, your file is too large.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_types)) {
        $alertMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $alertType = 'danger';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 due to errors
    if ($uploadOk == 0) {
        $alertMessage = "Sorry, your file was not uploaded.";
        $alertType = 'danger';
    } else {
        // Move file to target directory
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            // Insert form data and logo path into the database
            $sql = "INSERT INTO $table (client_name, website_link, logo_path)
                    VALUES ('$client_name', '$website_link', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                $alertMessage = "Client added successfully!";
                $alertType = 'success';
            } else {
                $alertMessage = "Error: " . $sql . "<br>" . $conn->error;
                $alertType = 'danger';
            }
        } else {
            $alertMessage = "Sorry, there was an error uploading your file.";
            $alertType = 'danger';
        }
    }
}

?>

                        <!-- HTML form for client input -->
                        <form class="user" id="clientForm" method="POST" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            <!-- Show alert if any -->
                            <?php if (!empty($alertMessage)): ?>
                            <div class="alert alert-<?php echo $alertType; ?>" role="alert">
                                <?php echo $alertMessage; ?>
                            </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="client_name"
                                    id="client_name" placeholder="Enter Client Name...">
                                <span id="clientNameError" class="error-text text-danger ml-2 mt-2"></span>
                            </div>
                            <div class="form-group">
                                <input type="url" class="form-control form-control-user" name="website_link"
                                    id="website_link" placeholder="Enter Website Link...">
                                <span id="websiteLinkError" class="error-text text-danger ml-2 mt-2"></span>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" name="logo" id="logo">
                                <span id="logoError" class="error-text text-danger ml-2 mt-2"></span>
                            </div>

                            <button class="btn btn-primary btn-user btn-block" type="submit">
                                Submit
                            </button>
                        </form>





                    </div>
                    <div class="conatiner mx-auto">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                            <h1 class="h3 mb-0 text-gray-800">Manage Clients</h1>

                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
    <?php
    // Include the database connection file
    include('./includes/db.php');

    // Fetch data from the 'clients' table
    $sql = "SELECT client_name, website_link, logo_path, created_at FROM clients";
    $result = $conn->query($sql);
    ?>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>URL</th>
                <th>Date</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>URL</th>
                <th>Date</th>
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
                        <td><?php echo htmlspecialchars($row['client_name']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($row['logo_path']); ?>" alt="Logo" width="50"></td>
                        <td><a href="<?php echo htmlspecialchars($row['website_link']); ?>" target="_blank">
                                <?php echo htmlspecialchars($row['website_link']); ?>
                            </a></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4'>No clients found.</td></tr>";
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

    <script src="js/client-validation.js"></script>

</body>

</html>