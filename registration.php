<?php
session_start();
include 'code/connection.php'; // Database connection

// Check if user is logged in
if (isset($_SESSION['id']) && $_SESSION['id'] != "") {
    $user_id = $_SESSION['id'];

    // Fetch user data
    $stmt = $con->prepare("SELECT name, gmail FROM login WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $gmail);
    $stmt->fetch();
    $stmt->close();
} else {
    $user_id = "";
    $name = "";
    $gmail = "";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $gmail = trim($_POST['gmail']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

    if (!empty($name) && !empty($gmail)) {
        if (!empty($user_id)) {
            // Update existing user
            if ($password) {
                $stmt = $con->prepare("UPDATE login SET name=?, gmail=?, password=? WHERE id=?");
                $stmt->bind_param("sssi", $name, $gmail, $password, $user_id);
            } else {
                $stmt = $con->prepare("UPDATE login SET name=?, gmail=? WHERE id=?");
                $stmt->bind_param("ssi", $name, $gmail, $user_id);
            }
            $stmt->execute();
            echo "Profile updated successfully!";
        } else {
            // Insert new user
            $role = 'user';
            $stmt = $con->prepare("INSERT INTO login (name, gmail, password, role) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $gmail, $password, $role);
            $stmt->execute();


            $login_to_profile="SELECT * FROM `login` ORDER by id DESC LIMIT 1";
            $pro_run=mysqli_query($con,$login_to_profile);
            $last_id_login=mysqli_fetch_assoc($pro_run);
            $last_id=$last_id_login['id'];
            $add_profile="INSERT INTO `profile` (`id`, `full_name`, `username`, `biography`, `role`, `status`, `email`, `phone`, `website`, `address`, `profile_picture`) VALUES ('$last_id', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, 'user_icon.jpg');";
            mysqli_query($con,$add_profile);





            echo "Registration successful!";
                echo "<script>window.location.href='login.php';</script>";
        }
        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from digiboard-html.codebasket.xyz/registration.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:12:52 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Digiboard</title>
    
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
                <h3 class="panel-title">Registration <?php if ($_SESSION['id']!="") {
                    echo "(Edit)";
                } ?></h3>
   




    <form method="POST">
    <div class="input-group mb-25">
        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
        <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($name); ?>" required>
    </div>
    <div class="input-group mb-25">
        <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
        <input type="email" class="form-control" name="gmail" placeholder="Email" value="<?php echo htmlspecialchars($gmail); ?>" required>
    </div>
    <div class="input-group mb-20">
        <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
        <input type="password" class="form-control rounded-end" name="password" placeholder="New Password">
    </div>
    
    <?php if (!empty($user_id)): ?>
        <button type="submit" class="btn btn-success w-100">Update Profile</button>
    <?php else: ?>
        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
    <?php endif; ?>
</form>


    
  <div class="other-option">
                    <p>Or continue with</p>
                                        <div>i had an Account  <a href="login.php"> Sign up</a></div>
                   </div>

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

<!-- Mirrored from digiboard-html.codebasket.xyz/registration.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:12:52 GMT -->
</html>