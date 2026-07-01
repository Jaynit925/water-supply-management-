<?php          
include("code/header.php");
?>

<!-- Main content start -->
<div class="main-content">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-12 ">
            <div class="panel">
                <div class="panel-header">
                    <h5>Add Services</h5>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="basicInput" class="form-label">Services Title</label>
                                <input type="text" name="t" class="form-control" id="basicInput" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="inputWithPlaceholder" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" id="inputWithPlaceholder" placeholder="₹ 230"  required>
                            </div>
                            <div class="col-sm-12">
                                <label for="inputWithPlaceholder" class="form-label">Image</label>
                                <input type="file" class="form-control" name="f_f" id="inputWithPlaceholder" placeholder="Placeholder" accept="image/*" required>
                            </div>
                            <div class="col-sm-12">
                                <label for="inputWithValue" class="form-label">Description</label>
                                <textarea class="form-control" name="d" rows="10" required></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn btn-sm btn-primary" type="submit" name="btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>

<?php
// Form submission logic
if (isset($_POST['btn'])) {
    // Extract form values
    extract($_POST);

    // Validate inputs
    if (!empty($t) && !empty($d) && isset($_FILES['f_f']) && $_FILES['f_f']['error'] == 0) {
        
        // Handle file upload
        $img = $_FILES['f_f']['tmp_name'];
        $path = "upload/services/" . $_FILES['f_f']['name'];

        // Check if image is valid (You can extend this check further for file type and size)
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif','svg'];
        $file_extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            if (move_uploaded_file($img, $path)) {
                // Prepare and execute the insert query
                $sql = "INSERT INTO `services` (`title`, `description`, `img`,`price`) VALUES (?, ?, ?,'$price')";
                
                // Use prepared statements to avoid SQL injection
                if ($stmt = mysqli_prepare($con, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sss", $t, $d, $path);
                    $run = mysqli_stmt_execute($stmt);
                    if ($run) {
                        echo "<script>window.location.href='url.php?url_v=add_services.php'</script>";
                    } else {
                        echo "<script>alert('Error occurred while adding the service. Please try again.');</script>";
                    }
                    mysqli_stmt_close($stmt);
                }
            } else {
                echo "<script>alert('Error uploading image. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type. Please upload a valid image.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields and upload a valid image.');</script>";
    }
}
?>

<?php          
include("code/footer.php");
?>
