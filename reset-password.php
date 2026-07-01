<?php
include("code/connection.php");

//SELECT `id`, `name`, `gmail`, `password`, `role` FROM `login` WHERE 1
?>
<!DOCTYPE html>
<html lang="en">
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
    <div class="preloader d-none">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <button class="header-btn theme-color-btn d-none"><i class="fa-light fa-sun-bright"></i></button>
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
                        <input type="text" name="n" class="form-control" placeholder="Username" required>
                    </div>

                      <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input type="text" name="g" class="form-control" placeholder="Gmail address" required>
                    </div>


                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                        <input type="password" name="p" class="form-control rounded-end" placeholder="Password" required>
                        <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                    </div>
                   
                    <button type="submit" name="btn" class="btn btn-primary w-100 login-btn">Sign in</button>
                </form>


             <?php



 if (isset($_POST['btn'])) {


    $n = trim($_POST['n']);
    $g = trim($_POST['g']);
    $p = trim($_POST['p']);



    $sql = "SELECT * FROM `login` WHERE gmail ='$g' and name='$n'";
   
   
    $run=mysqli_query($con,$sql);


    $fetch=mysqli_fetch_assoc($run);

    if (mysqli_num_rows($run)>0) {
        // code...

$id=$fetch['id'];

$p=password_hash($p, PASSWORD_BCRYPT);
$s="UPDATE `login` SET `password` = '$p' WHERE `login`.`id` = $id;";
$r=mysqli_query($con,$s);





   echo "<script>alert('Password Update Sccessfully');</script>";
            

    }else{


   echo "<script>alert('User name and Gmail not found ');</script>";
            

    }


}

?>
            
                <div class="other-option">
                    <p>Or continue with</p>
                                        <div>Create an Account  <a href="registration.php"> Sign in</a></div>
                   </div>
            </div>
        </div>

        <div class="footer">
            <p>Copyright© <script>document.write(new Date().getFullYear())</script> All Rights Reserved By <span class="text-primary">Digiboard</span></p>
        </div>
    </div>
    
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
</body>
</html>