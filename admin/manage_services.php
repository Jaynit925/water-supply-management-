<?php 
include("code/header.php");
include("config.php"); // Ensure the database connection is included

// Pagination setup
$limit = 6; // Number of services per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page number, default is 1
$offset = ($page - 1) * $limit; // Calculate the offset for the SQL query

// Fetch all services from the database with pagination
$sql = "SELECT * FROM services LIMIT $offset, $limit";
$run = mysqli_query($con, $sql);

// Count total services for pagination
$countSql = "SELECT COUNT(*) AS total FROM services";
$countRun = mysqli_query($con, $countSql);
$totalServices = mysqli_fetch_assoc($countRun)['total']; // Total number of services
$totalPages = ceil($totalServices / $limit); // Calculate total pages
?>

<!-- Main content start -->
<div class="main-content">
    <div class="row g-4 justify-content-center">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="mb-0 text-primary">Manage Services</h5>
                </div>
                <div class="panel-body">
                    <!-- Service Cards Grid -->
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php 
                        // Display each service in a card layout
                        if (mysqli_num_rows($run) > 0) {
                            while ($row = mysqli_fetch_assoc($run)) {
                                $serviceId = $row['id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $img = $row['img'];
                        ?>
                            <div class="col">
                                <div class="card shadow-lg rounded-3 overflow-hidden">
                                    <img src="<?= $img; ?>" class="card-img-top" alt="<?= $title; ?>" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary"><?= $title; ?></h5>
                                        <p class="card-text"><?= substr($description, 0, 100); ?>...</p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="edit_service.php?id=<?= $serviceId; ?>" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="manage_services.php?delete_id=<?= $serviceId; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this service?');">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                            }
                        } else {
                            echo "<p class='text-center w-100'>No services found</p>";
                        }
                        ?>
                    </div>
                    <br>
                    <!-- Pagination Controls -->
                    <div class="pagination-wrapper text-center mt-4">
                        <ul class="pagination">
                            <?php
                            // Display Previous Page Button
                            if ($page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                            }

                            // Display Page Numbers
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">
                                    <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                                </li>';
                            }

                            // Display Next Page Button
                            if ($page < $totalPages) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Handle the delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM services WHERE id = $delete_id";
    $delete_run = mysqli_query($con, $delete_sql);
    if ($delete_run) {
        echo "<script>alert('Service deleted successfully'); window.location.href='manage_services.php';</script>";
    } else {
        echo "<script>alert('Error deleting service');</script>";
    }
}
?>

<?php 
include("code/footer.php");
?>
