<?php
require_once "connection.php";

session_start();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $error = true;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");


    if (mysqli_num_rows($result) > 0) {

        $_SESSION['login'] = true;
        $error = false;
        header("Location: index.php");
        exit();
    }
}
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit();
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class="bg-secondary">

    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <div class="card mt-5">
            <div class="card-body m-2">
                <h3 class="text-center mb-5">Login</h3>
                <?php if (!isset($error)) : ?>

                    <div>
                    </div>
                <?php else : ?>
                    <div class="alert alert-danger" role="alert">
                        Login Gagal
                    </div>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                        <div class="invalid-feedback">
                            username is invalid
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password
                        </label>
                        <input id="password" type="password" class="form-control" name="password" required data-eye>
                        <div class="invalid-feedback">
                            Password is required
                        </div>
                    </div>

                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary btn-block" name="login">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
    </div>
    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>



</body>

</html>
