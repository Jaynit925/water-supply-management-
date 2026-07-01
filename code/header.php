<?php   
    error_reporting(0);
    session_start();
    include("connection.php");
 ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixydrops.com/Water/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 12:46:18 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Document Title -->
    <title>Water</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="favicon.png">

    <!-- CSS Files -->
    <!--==== Google Fonts ====-->
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,600,700%7CSchoolbell" rel="stylesheet">
    
    <!--==== Bootstrap css file ====-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--==== Font-Awesome css file ====-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Owl Carusel css file -->
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">

    <!-- camera css -->
    <link rel="stylesheet" href="assets/plugins/camera/camera.min.css">

    <!-- ====video poppu css==== -->
    <link rel="stylesheet" href="assets/plugins/Magnific-Popup/magnific-popup.css">

    <!--==== Style css file ====-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--==== Responsive css file ====-->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--==== Custom css file ====-->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preLoader">
        <div class="preload-img">
            <img src='assets/img/preloader.gif' alt="" class="pre-img">
        </div>
    </div>
    <!-- End Of Preloader -->

    <!-- Main header -->
    <header class="header">
        <!-- Start Header Navbar-->
        <div class="main-header">
            <div class="main-menu-wrap">
                <div class="container-fluide">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.php">
                                    <img src="assets/img/logo.png" data-rjs="2" alt="Water">
                                </a>
                            </div>
                            <!-- End of Logo -->
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-4 col-6 menu-button">
                            <div class="menu--inner-area clearfix">
                                <div class="menu-wraper">
                                    <?php   
                                    include("menu.php");
                                     ?>
                                </div>
                            </div>

                        </div>


                        <?php 

$sql = "SELECT  `contact_name`, `contact_email`, `contact_phone`, `contact_address`, `contact_image` FROM `contact_details`"; 
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
extract($row);
 ?>
                        <div class="col-lg-3 col-md-4 col-sm-4">
                            <div class="urgent-call text-right">
                                
   

<?php 
if ($_SESSION['id']!="") {
$user_id=$_SESSION['id'];
    $sql = "SELECT * FROM profile WHERE id = '$user_id'";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);
   
 ?>

    <div class="profile-container" onclick="toggleMenu()">
        <img src="admin/upload/profile_pictures/<?php echo $user['profile_picture']; ?>" alt="Profile Picture" class="profile-pic" style="width: 40px;height: 40px">
        <!-- <div class="user-name">Priti Duseja</div> -->
        <div class="dropdown-menu" id="dropdownMenu">
            <ul>
                <li><a href="registration.php">👤 My Profile </a></li>
                <li><a href="admin/index.php">⚙️ Dashboard </a></li>
                <li><a href="user_orders.php">⚙️ My Order </a></li>

                <li><a href="password_change.php">⚙️ Change&nbsp;Password </a></li>

                <li><a href="admin/logout.php">🚪 Logout</a></li>
            </ul>
        </div>
    </div>

<?php } ?>

    <script>
        function toggleMenu() {
            document.getElementById("dropdownMenu").classList.toggle("active");
        }
        
        document.addEventListener("click", function(event) {
            const profileContainer = document.querySelector(".profile-container");
            const dropdownMenu = document.getElementById("dropdownMenu");
            if (!profileContainer.contains(event.target)) {
                dropdownMenu.classList.remove("active");
            }
        });
    </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Navbar-->
    </header>
    <!-- End of Main header -->
    