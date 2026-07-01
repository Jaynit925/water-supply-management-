					 <style>
        
        .profile-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid white;
            object-fit: cover;
        }
        .user-name {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
        .dropdown-menu {
            position: absolute;
            top: 49px;
            right: -20px;
            background: white;
            width: 200px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            display: none;
        }
        .dropdown-menu.active {
            display: block;
        }
        .dropdown-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .dropdown-menu ul li {
            padding: 10px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: 0.3s;
        }
        .dropdown-menu ul li:hover {
            background: #f0f0f0;
        }
    </style>
                    	<?php
$current_page = basename($_SERVER['PHP_SELF']); // Get current file name
?>

<nav>
    <!-- Header-menu -->
    <div class="header-menu dosis">
        <ul>
            <li class="<?= ($current_page == 'index.php') ? 'active' : ''; ?>">
                <a href="index.php">Home <img src="assets/img/line2.png" alt=""></a>
            </li>
            <li class="<?= ($current_page == 'service.php') ? 'active' : ''; ?>">
                <a href="service.php">Service <img src="assets/img/line2.png" alt=""></a>
            </li>
            <li class="<?= ($current_page == 'blog.php') ? 'active' : ''; ?>">
                <a href="blog.php">Blog <img src="assets/img/line2.png" alt=""></a>
            </li>
            <li class="<?= ($current_page == 'about.php') ? 'active' : ''; ?>">
                <a href="about.php">About <img src="assets/img/line2.png" alt=""></a>
            </li>
            <li class="<?= ($current_page == 'contact.php') ? 'active' : ''; ?>">
                <a href="contact.php">Contact <img src="assets/img/line2.png" alt=""></a>
            </li>
            <li class="<?= ($current_page == 'booking/index.php') ? 'active' : ''; ?>">
                <a href="booking/index.php">Booking <img src="assets/img/line2.png" alt=""></a>
            </li>

            <?php if (empty($_SESSION['id'])) { ?>
                <li class="<?= ($current_page == 'login.php') ? 'active' : ''; ?>">
                    <a href="login.php">Login <img src="assets/img/line2.png" alt=""></a>
                </li>
            <?php }  ?>
               
        </ul>
    </div>
    <!-- End of Header-menu -->
</nav>

