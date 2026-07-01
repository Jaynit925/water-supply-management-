<?php
session_start();
include("code/header.php");


// Assuming the user is logged in and you have a session variable 'user_id'
$user_id=$_GET['id'];
if ($user_id=="") {
    # code...

$user_id = $_SESSION['id'];
$_SESSION['user_id']=$_SESSION['id'];
}else{
$_SESSION['user_id']=$user_id;   
}




// Fetch user data from the profile table
$sql = "SELECT * FROM profile WHERE id = '$user_id'";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!-- HTML form (inside the main content section) -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25">
        <h2>Edit Profile</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <nav>
                        <div class="btn-box d-flex flex-wrap gap-1" id="nav-tab" role="tablist">
                            <button class="btn btn-sm btn-outline-primary active" id="nav-edit-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-edit-profile" type="button" role="tab" aria-controls="nav-edit-profile" aria-selected="true">Edit Profile</button>
                        </div>
                    </nav>
                </div>
                <div class="panel-body">
                    <div class="tab-content profile-edit-tab" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-edit-profile" role="tabpanel" aria-labelledby="nav-edit-profile-tab" tabindex="0">
                            <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                                <div class="profile-edit-tab-title">
                                    <h6>Public Information</h6>
                                </div>
                                <div class="public-information mb-25">
                                    <div class="row g-4">
                                        <div class="col-md-3">
                                            <div class="admin-profile">
                                                <div class="image-wrap">
                                                    <div class="part-img rounded-circle overflow-hidden">
                                                        <img src="upload/profile_pictures/<?php echo $user['profile_picture']; ?>" alt="admin">
                                                    </div>
                                                    <button class="image-change"><i class="fa-light fa-camera"></i></button>
                                                </div>
                                                <span class="admin-name"><?php echo $user['full_name']; ?></span>
                                                <span class="admin-role"><?php echo $user['role']; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa-light fa-user"></i></span>
                                                        <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="<?php echo $user['full_name']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa-light fa-at"></i></span>
                                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user['username']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <textarea class="form-control h-150-p" name="biography" placeholder="Biography"><?php echo $user['biography']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-edit-tab-title">
                                    <h6>Private Information</h6>
                                </div>
                                <div class="private-information mb-25">
                                    <div class="row g-3">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-user"></i></span>
                                                <input type="text" class="form-control" name="unique_id" placeholder="Unique ID" value="<?php echo $user['id']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-user-tie"></i></span>
                                                <select class="form-control" name="role" required>
                                                    <option value="Admin" <?php if ($user['role'] == 'Admin') echo 'selected'; ?>>Admin</option>
                                                    <option value="Manager" <?php if ($user['role'] == 'Manager') echo 'selected'; ?>>Manager</option>
                                                    <option value="Project Manager" <?php if ($user['role'] == 'Project Manager') echo 'selected'; ?>>Project Manager</option>
                                                    <option value="Managing Director" <?php if ($user['role'] == 'Managing Director') echo 'selected'; ?>>Managing Director</option>
                                                    <option value="Chairman" <?php if ($user['role'] == 'Chairman') echo 'selected'; ?>>Chairman</option>
                                                    <option value="Graphic Designer" <?php if ($user['role'] == 'Graphic Designer') echo 'selected'; ?>>Graphic Designer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-phone"></i></span>
                                                <input type="tel" class="form-control" name="phone" placeholder="Phone" value="<?php echo $user['phone']; ?>" required>
                                            </div>
                                        </div>
                                      

                                        <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa-light fa-globe"></i></span>
                                                <input type="url" class="form-control" name="website" placeholder="Website" value="<?php echo $user['website']; ?>">
                                            </div>
                                        </div>


  <div class="col-md-4 col-sm-6">
                                            <div class="input-group">
                                                
                                                <input type="file" class="form-control" name="profile_picture" placeholder="Website" >
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <textarea class="form-control" name="address" placeholder="Address"><?php echo $user['address']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    
    <script src="assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/js/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/js/select2.min.js"></script>
    <script src="assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/select2-init.js"></script>
</body>
</html>
