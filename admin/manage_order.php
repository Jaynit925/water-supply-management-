<?php
include("code/header.php"); 


// Handle Status Update
if (isset($_GET['update_id']) && isset($_GET['status'])) {
    $update_id = (int)$_GET['update_id'];
    $new_status = $_GET['status'];

    $update_query = "UPDATE booking SET delivery_status = '$new_status' WHERE id = $update_id";
    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Order updated successfully!'); window.location.href='manage_order.php';</script>";
    } else {
        echo "<script>alert('Error updating order!');</script>";
    }
}

// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    $delete_query = "DELETE FROM booking WHERE id = $delete_id";
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Order deleted successfully!'); window.location.href='manage_order.php';</script>";
    } else {
        echo "<script>alert('Error deleting order!');</script>";
    }
}

// Pagination Setup
$records_per_page = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$offset = ($page - 1) * $records_per_page;

// Fetch Total Orders
$total_query = "SELECT COUNT(*) AS total FROM booking";
$total_result = mysqli_query($con, $total_query);
$total_records = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch Orders
$sql = "SELECT * FROM booking ORDER BY id DESC LIMIT $records_per_page OFFSET $offset";
$result = mysqli_query($con, $sql);
?>

<!-- Main Content -->
<div class="main-content">
    <div class="row g-4">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Manage Bookings</h5>
                </div>
                <div class="panel-body">










                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Payment</th>
                                <th>Delivery</th>
                                <th>Order Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>#<?= $row['id']; ?></td>
                                        <td><?= $row['customer_name']; ?></td>
                                        <td><?= $row['product']; ?></td>
                                        <td>₹<?= number_format($row['price'], 2); ?></td>
                                        <td><?= $row['payment_method']; ?></td>
                                        <td>
                                            <select class="form-select" onchange="updateStatus(<?= $row['id']; ?>, this.value)">
                                                <option value="Pending" <?= ($row['delivery_status'] == "Pending") ? "selected" : "" ?>>Pending</option>
                                                <option value="Approved" <?= ($row['delivery_status'] == "Approved") ? "selected" : "" ?>>Approved</option>
                                                <option value="Canceled" <?= ($row['delivery_status'] == "Canceled") ? "selected" : "" ?>>Canceled</option>
                                            </select>
                                        </td>
                                        <td><?= $row['order_date']; ?></td>
                                        <td>
                                            <a href="manage_order.php?delete_id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?');"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center'>No bookings found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Copyright© <script>document.write(new Date().getFullYear())</script> All Rights Reserved By <span class="text-primary">Your Business</span></p>
    </div>
</div>

<!-- JavaScript -->
<script>
    function updateStatus(id, status) {
        if (confirm("Are you sure you want to change the status?")) {
            window.location.href = "manage_order.php?update_id=" + id + "&status=" + status;
        }
    }
</script>

<!-- Bootstrap Scripts -->
<script src="assets/vendor/js/jquery-3.6.0.min.js"></script>
<script src="assets/vendor/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>

<?php
mysqli_close($con);
?>
