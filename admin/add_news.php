<?php
include("code/header.php");

// Database connection (assuming you have it somewhere in your "header.php" or separate file)
include('config/db_connection.php'); 

?>

<!-- main content start -->
<div class="main-content">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-12 ">
            <div class="panel">
                <div class="panel-header">
                    <h5>Contact Form One</h5>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="basicInput" class="form-label">News Title</label>
                                <input type="text" name="t" class="form-control" id="basicInput" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputWithPlaceholder" class="form-label">Image</label>
                                <input type="file" class="form-control" name="f_f" id="inputWithPlaceholder" required>
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
// Form submission handling
if (isset($_POST['btn'])) {
    // Sanitize user input to prevent SQL injection
    $t = mysqli_real_escape_string($con, $_POST['t']);
    $d = mysqli_real_escape_string($con, $_POST['d']);

    // File handling
    if (isset($_FILES['f_f']) && $_FILES['f_f']['error'] == 0) {
        $img = $_FILES['f_f']['tmp_name'];
        $img_name = basename($_FILES['f_f']['name']);
        $img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

        // Validate file type (only allow images)
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($img_extension, $allowed_types)) {
            $path = "upload/news/" . $img_name;

            // Move the uploaded file to the designated folder
            if (move_uploaded_file($img, $path)) {
                // Insert data into the database
                $sql = "INSERT INTO `news` (`title`, `description`, `img`) VALUES ('$t', '$d', '$path')";
                $run = mysqli_query($con, $sql);

                // Check if the query was successful
                if ($run) {
                    echo "<script>alert('News added successfully!'); window.location.href='url.php?url_v=add_news.php'</script>";
                } else {
                    echo "<script>alert('Error: Unable to add news to the database.');</script>";
                }
            } else {
                echo "<script>alert('Error: File upload failed.');</script>";
            }
        } else {
            echo "<script>alert('Error: Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
        }
    } else {
        echo "<script>alert('Error: No file uploaded or file upload error.');</script>";
    }
}

include("code/footer.php");
?>
