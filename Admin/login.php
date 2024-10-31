<!DOCTYPE html>
<html lang="en">
<?php


include('./includes/db.php');
session_start();
if(isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
 ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="">

    <div class="container">
    
    <?php



$emailerr = $passworderr = "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailerr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailerr = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passworderr = "Password is required";
    } else {
        $password_entered = $_POST['password'];
    }

    if (empty($emailerr) && empty($passworderr)) {
        // Database connection assuming $conn is properly set up
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $email . "'");
        $row = mysqli_fetch_array($result);
        // print_r($row);
        // die;
        if ($row) {
            // Check if the entered password matches the stored plaintext password
            if ($password_entered === $row['password']) {
                // Set session variables
                $_SESSION['user_id'] = $row['id'];  // Use $row instead of $user
                $_SESSION['user_name'] = $row['name'];

                // Redirect to index.php or another page
                header("Location: index.php");
                exit();
            } else {
                $msg = "Invalid Username or Password!";
            }
        } else {
            $msg = "No account found with that email.";
        }
    }
}
// Output the HTML content or error messages here...
?>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="../assets/img/logo.png" alt=" Lookin " class="mt-5 ml-5">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php if($msg!="") { echo '<div class="alert alert-danger" role="alert">
' . $msg .'
</div>'; } ?>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form action="login" method="post">
                               
                                <div class="form-group my-3">
                                    <input type="email" name="email" class="form-control border-0 p-4" placeholder="Your email" />
                                    <p class="text-alerts"><?php echo $emailerr?></p>
                                </div>
                                <div class="form-group my-5">
                                    <input type="password" name="password" class="form-control border-0 p-4"/>
                                    <p class="text-alerts"><?php echo $passworderr?></p>
                                </div>
                                <div>
                                    <button name="submit" type="submit" class="btn btn-dark btn-block border-0 py-3" type="submit">Login Now</button>
                                </div>
                            </form>
                        </div>
                               
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


</body>

</html>