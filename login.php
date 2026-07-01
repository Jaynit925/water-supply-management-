<?php
include("code/connection.php");
if (!$_SESSION['id']=="" and !$_SESSION['gmail']=="") {
    // code...
 //   echo "<script>window.location.href='index.php';</script>";


if ($_SESSION['role']=="user" ) {
    // code...
    echo "<script>window.location.href='../index.php';</script>";
}elseif ($_SESSION['role']=="admin") {
    // code...
        echo "<script>window.location.href='index.php';</script>";
}
}

    ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from digiboard-html.codebasket.xyz/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:12:35 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Digiboard</title>
    
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="admin/assets/vendor/css/all.min.css">
    <link rel="stylesheet" href="admin/assets/vendor/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="admin/assets/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" id="primaryColor" href="admin/assets/css/blue-color.css">
    <link rel="stylesheet" id="rtlStyle" href="#">
</head>
<body class="light-theme">
    <!-- preloader start -->
    <div class="preloader d-none">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end -->

    <!-- theme color hidden button -->
    <button class="header-btn theme-color-btn d-none"><i class="fa-light fa-sun-bright"></i></button>
    <!-- theme color hidden button -->

    <!-- main content start -->
    <div class="main-content login-panel">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="admin/assets/images/logo-black.png" alt="Logo">
                </div>
                <a href="index.php"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h3 class="panel-title">Login</h3>
                <form method="post">
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input type="text" name="g" class="form-control" placeholder="Username or email address">
                    </div>
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                        <input type="password" name="p" class="form-control rounded-end" placeholder="Password">
                        <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                    </div>
                    <div class="d-flex justify-content-between mb-25">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheckbox">
                            <label class="form-check-label text-white" for="loginCheckbox">
                                Remember Me
                            </label>
                        </div>
                        <a href="reset-password.php" class="text-white fs-14">Forgot Password?</a>
                    </div>
                    <button type="submit" name="btn" class="btn btn-primary w-100 login-btn">Sign in</button>
                </form>

                <?php

                                     if (isset($_POST['btn'])) {
    $gmail = trim($_POST['g']);
    $password = trim($_POST['p']);

    $sql = "SELECT * FROM `login` WHERE gmail = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $gmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) { // Securely verify password
        $_SESSION['id'] = $row['id'];
        $_SESSION['gmail'] = $gmail;
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == "admin") {
            echo "<script>window.location.href='admin/index.php';</script>";
        } else {
            echo "<script>window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password');</script>";
    }
}
?>
                <div class="other-option">
                    <p>Or continue with</p>
                                        <div>Create an Account  <a href="registration.php"> Sign in</a></div>
                   <!--  <div class="social-box d-flex justify-content-center gap-20">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-google"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                --> </div>
            </div>
        </div>

        <!-- footer start -->
        <div class="footer">
            <p>Copyright© <script>document.write(new Date().getFullYear())</script> All Rights Reserved By <span class="text-primary">Digiboard</span></p>
        </div>
        <!-- footer end -->
    </div>
    <!-- main content end -->
    
    <script src="admin/assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="admin/assets/vendor/js/jquery.overlayScrollbars.min.js"></script>
    <script src="admin/assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/js/main.js"></script>
    <!-- for demo purpose -->
    <script>
        var rtlReady = $('html').attr('dir', 'ltr');
        if (rtlReady !== undefined) {
            localStorage.setItem('layoutDirection', 'ltr');
        }
    </script>
    <!-- for demo purpose -->
</body>

<!-- Mirrored from digiboard-html.codebasket.xyz/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:12:35 GMT -->
</html>