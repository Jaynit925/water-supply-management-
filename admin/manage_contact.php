<?php
include("code/header.php");
include("config.php");

// Fetch the existing contact details
$s = "SELECT * FROM `contact_details`"; // Assuming there's a single record
$r = mysqli_query($con, $s);
$f = mysqli_fetch_assoc($r);
?>

<!-- main content start -->
<div class="main-content">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Manage Contact Details</h5>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <!-- Contact Name -->
                            <div class="col-sm-6">
                                <label for="contactName" class="form-label">Contact Name</label>
                                <input type="text" name="contact_name" value="<?php echo $f['contact_name']; ?>" class="form-control" id="contactName" required>
                            </div>

                            <!-- Contact Email -->
                            <div class="col-sm-6">
                                <label for="contactEmail" class="form-label">Contact Email</label>
                                <input type="email" name="contact_email" value="<?php echo $f['contact_email']; ?>" class="form-control" id="contactEmail" required>
                            </div>

   <div class="col-sm-6">
                                <label for="contactImage" class="form-label">Image</label>
                                <input type="file" name="contact_image" class="form-control" id="contactImage">
                             </div>

                            <!-- Contact Phone -->
                            <div class="col-sm-6">
                                <label for="contactPhone" class="form-label">Contact Phone</label>
                                <input type="text" name="contact_phone" value="<?php echo $f['contact_phone']; ?>" class="form-control" id="contactPhone" required>
                            </div>

                            <!-- Contact Address -->
                            <div class="col-sm-12">
                                <label for="contactAddress" class="form-label">Contact Address</label>
                                <textarea class="form-control" name="contact_address" rows="4" id="contactAddress" required><?php echo $f['contact_address']; ?></textarea>
                            </div>
<br>
                               <?php if($f['contact_image']) { ?>
                                    <small>Current Image: <img src="<?php echo $f['contact_image']; ?>" width="50"></small>
                                <?php } ?>
                            

                            <!-- Contact Image (Optional) -->
                         
                            <div class="col-12 text-end">
                                <button class="btn btn-sm btn-primary" type="submit" name="save_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main content end -->

<?php
// Handle form submission
if (isset($_POST['save_btn'])) {
    // Extract form data
    extract($_POST);

    // Handle file upload
    $contact_img = $_FILES['contact_image']['tmp_name'];
    $contact_img_path = "upload/contact_details/" . $_FILES['contact_image']['name'];

    if (move_uploaded_file($contact_img, $contact_img_path)) {
        // If a new image is uploaded
        $sql = "UPDATE `contact_details` SET `contact_name` = '$contact_name', `contact_email` = '$contact_email', `contact_phone` = '$contact_phone', `contact_address` = '$contact_address', `contact_image` = '$contact_img_path'";
    } else {
        // No new image uploaded
        $sql = "UPDATE `contact_details` SET `contact_name` = '$contact_name', `contact_email` = '$contact_email', `contact_phone` = '$contact_phone', `contact_address` = '$contact_address'";
    }

    // Execute the query
    $run = mysqli_query($con, $sql);

    if ($run) {
        echo "<script>window.location.href='url.php?url_v=manage_contact.php'</script>";
    } else {
        echo "<script>alert('Error saving contact details.');</script>";
    }
}

include("code/footer.php");
?>
