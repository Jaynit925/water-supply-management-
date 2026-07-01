<?php
include("code/header.php"); 


// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM booking WHERE id = $delete_id";
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Order deleted successfully!'); window.location.href='orders.php';</script>";
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
                    <h5>All Orders</h5>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Payment</th>
                                <th>Delivery</th>
                                <th>Order Date</th>
                                <th>Action</th>
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
                                        <td><span class="badge bg-warning"><?= $row['status']; ?></span></td>
                                        <td><?= $row['product']; ?></td>
                                        <td>₹<?= $row['price']; ?></td>
                                        <td><?= $row['payment_method']; ?></td>
                                        <td><span class="badge bg-success"><?= $row['delivery_status']; ?></span></td>
                                        <td><?= $row['order_date']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewOrder<?= $row['id']; ?>"><i class="fa fa-eye"></i></button>
                                            <a href="manage_payment.php?delete_id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?');"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <style type="text/css">
                                        
                                        .modal-backdrop.show {

    opacity: 0 !important;
    position: relative;
    transition: none !important;
    top:-200px;
}


                                    </style>
<!-- View Order Modal -->
<!-- View Order Modal -->
<div class="modal fade" id="viewOrder<?= $row['id']; ?>" tabindex="-1" aria-hidden="true" data-bs-backdrop="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Order ID:</strong> #<?= $row['id']; ?></p>
                <p><strong>Customer:</strong> <?= $row['customer_name']; ?></p>
                <p><strong>Product:</strong> <?= $row['product']; ?></p>
                <p><strong>Price:</strong> $<?= $row['price']; ?></p>
                <p><strong>Payment Method:</strong> <?= $row['payment_method']; ?></p>
                <p><strong>Status:</strong> <span class="badge bg-warning"><?= $row['status']; ?></span></p>
                <p><strong>Delivery Status:</strong> <span class="badge bg-success"><?= $row['delivery_status']; ?></span></p>
                <p><strong>Order Date:</strong> <?= $row['order_date']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- JavaScript to Auto-Close Modal After 5 Seconds -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = document.getElementById("viewOrder<?= $row['id']; ?>");
        myModal.addEventListener("shown.bs.modal", function () {
            setTimeout(function () {
                var modalInstance = bootstrap.Modal.getInstance(myModal);
                modalInstance.hide();
            }, 5000); // 5000 milliseconds = 5 seconds
        });
    });
</script>


                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No orders found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
<br>
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
<script type="text/javascript">
    $('#viewOrder<?= $row['id']; ?>').modal({
    backdrop: 'static', // Prevents clicking outside to close
    keyboard: false
});


$('#viewOrder<?= $row['id']; ?>').modal({
    backdrop: true, // Enables closing on background click
    keyboard: true
});

</script>
<?php
include("code/footer.php"); 
?>
