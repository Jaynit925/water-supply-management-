<?php 
include("code/header.php");
include("config.php"); // Ensure the database connection is included

// Fetch the service details based on the ID from the URL
if (isset($_GET['id'])) {
    $serviceId = $_GET['id'];
    $sql = "SELECT * FROM services WHERE id = $serviceId";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['description'];
        $img = $row['img'];
    } else {
        echo "<script>alert('Service not found'); window.location.href='manage_services.php';</script>";
        exit;
    }
}

// Handle form submission to update service
if (isset($_POST['update'])) {
    extract($_POST);
    $updatedTitle = mysqli_real_escape_string($con, $title);
    $updatedDescription = mysqli_real_escape_string($con, $description);
    
    // Handling image upload if a new image is selected
    if ($_FILES['image']['name'] != '') {
        $imgTemp = $_FILES['image']['tmp_name'];
        $newImagePath = "upload/services/" . $_FILES['image']['name'];
        move_uploaded_file($imgTemp, $newImagePath);
    } else {
        // Keep the existing image if no new image is uploaded
        $newImagePath = $img;
    }

    // Update query to save the updated information
    $updateSql = "UPDATE services SET title = '$updatedTitle', description = '$updatedDescription', img = '$newImagePath' WHERE id = $serviceId";
    $updateRun = mysqli_query($con, $updateSql);

    if ($updateRun) {
        echo "<script>alert('Service updated successfully'); window.location.href='manage_services.php';</script>";
    } else {
        echo "<script>alert('Error updating service');</script>";
    }
}
?>

<!-- Main content start -->
<div class="main-content">
    <div class="row g-12 justify-content-center">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Edit Service</h5>
                </div>
                <div class="panel-body">
                    <!-- Edit Service Form -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="title" class="form-label">Service Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?= htmlspecialchars($title); ?>" required>
                            </div>

                            <div class="col-sm-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" required><?= htmlspecialchars($description); ?></textarea>
                            </div>

                            <div class="col-sm-12">
                                <label for="image" class="form-label">Service Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                                <small class="text-muted">Leave empty if you don't want to change the image.</small>
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-sm btn-primary" type="submit" name="update">Update Service</button>
                            </div>
                        </div>
                    </form>

                    <!-- Display the current image if available -->
                    <div class="mt-3">
                        <h6>Current Image:</h6>
                        <img src="<?= $img; ?>" class="img-fluid" alt="Service Image" style="max-width: 100%; max-height: 200px; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("code/footer.php"); ?>
