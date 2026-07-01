
<?php
session_start();
include 'code/connection.php'; // Database connection file

// Check if user is logged in
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    echo "<script>alert('You must be logged in to change your password.'); window.location='login.php';</script>";
    exit;
}

$user_id = $_SESSION['id'];
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (!empty($old_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            // Fetch current password from database
            $stmt = $con->prepare("SELECT password FROM login WHERE id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($stored_password);
            $stmt->fetch();
            $stmt->close();

            // Verify old password
            if (password_verify($old_password, $stored_password)) {
                // Hash new password
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

                // Update password
                $stmt = $con->prepare("UPDATE login SET password=? WHERE id=?");
                $stmt->bind_param("si", $hashed_password, $user_id);
                if ($stmt->execute()) {
                    $message = "<div class='alert alert-success'>Password changed successfully!</div>";
                } else {
                    $message = "<div class='alert alert-danger'>Error updating password.</div>";
                }
                $stmt->close();
            } else {
                $message = "<div class='alert alert-danger'>Old password is incorrect.</div>";
            }
        } else {
            $message = "<div class='alert alert-danger'>New passwords do not match.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>All fields are required.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from digiboard-html.codebasket.xyz/Change PAssword.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:12:52 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | Digiboard</title>
    
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
                <h3 class="panel-title">Change Password</h3>
              





               <?php echo $message; ?>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Old Password</label>
                    <input type="password" class="form-control" name="old_password" placeholder="Enter Old Password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Enter New Password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Change Password</button>
            </form>






               <!--  <div class="other-option">
                    <p>Or continue with</p>
                    <div class="social-box d-flex justify-content-center gap-20">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-google"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div> -->
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

<!-- Mirrored from digiboard-html.codebasket.xyz/Change PAssword.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:12:52 GMT -->
</html>