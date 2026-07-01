



<?php   

include("code/header.php");




 ?>
    <!--/.End of Main header -->

    <!-- page title -->
    <div class="page-title-wrap primary-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- page title content -->
                    <div class="page-title-content text-center">
                        <ul class="mb-0 list-unstyle nav">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">service</a></li>
                        </ul>
                        <h1 class="h2">Our Service</h1>
                    </div><!--/.End of page title content -->
                </div><!-- /.col-->
            </div><!-- /.row-->
        </div><!-- /.container-->
    </div><!-- End of page title -->

    <!-- bottole deliver -->
    <section class="pt-120 pb-90 top-shape">
        <div class="container">
            <div class="row">
              


<?php

// Handle Status Update
if (isset($_GET['update_id']) && isset($_GET['status'])) {
    $update_id = (int)$_GET['update_id'];
    $new_status = $_GET['status'];

    $update_query = "UPDATE booking SET delivery_status = '$new_status' WHERE id = $update_id";
    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Order updated successfully!'); window.location.href='user_orders.php';</script>";
    } else {
        echo "<script>alert('Error updating order!');</script>";
    }
}

// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    $delete_query = "DELETE FROM booking WHERE id = $delete_id";
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Order deleted successfully!'); window.location.href='user_orders.php';</script>";
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
$login_id=$_SESSION['id'];
$total_query = "SELECT COUNT(*) AS total FROM booking where login_id=$login_id";
$total_result = mysqli_query($con, $total_query);
$total_records = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_records / $records_per_page);

// Fetch Orders
$sql = "SELECT * FROM booking where login_id=$login_id ORDER BY id DESC LIMIT $records_per_page OFFSET $offset";
$result = mysqli_query($con, $sql);
?>




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
                                            <select readonly disabled class="form-select" onchange="updateStatus(<?= $row['id']; ?>, this.value)">
                                                <option value="Pending" <?= ($row['delivery_status'] == "Pending") ? "selected" : "" ?>>Pending</option>
                                                <option value="Approved" <?= ($row['delivery_status'] == "Approved") ? "selected" : "" ?>>Approved</option>
                                                <option value="Canceled" <?= ($row['delivery_status'] == "Canceled") ? "selected" : "" ?>>Canceled</option>
                                            </select>
                                        </td>
                                        <td><?= $row['order_date']; ?></td>
                                        <td>
                                            <a href="user_orders.php?delete_id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?');"><i class="fa fa-trash"></i> Delete</a>
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














            </div><!-- /.row-->
        </div><!-- /.container-->
    </section><!-- /.End of bottole deliver -->

    <!-- feature area type2-->
    <section>
        <div class="features-inner type2 pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <!-- single featuer inner -->
                        <div class="single-feature text-center">
                            <img src="assets/img/icons/feature1.svg" class="svg" alt="">
                            <h3>Purity to the Max</h3>
                        </div><!-- /.End of single featuer inner -->
                    </div><!-- /.col-->
                    <div class="col-md-6 col-lg-3">
                        <!-- single featuer inner -->
                        <div class="single-feature text-center">
                            <img src="assets/img/icons/feature2.svg" class="svg" alt="">
                            <h3>Health Certificates</h3>
                        </div><!-- /.End of single featuer inner -->
                    </div><!-- /.col-->
                    <div class="col-md-6 col-lg-3">
                        <!-- single featuer inner -->
                        <div class="single-feature text-center">
                            <img src="assets/img/icons/feature3.svg" class="svg" alt="">
                            <h3>Quality Water Standard</h3>
                        </div><!-- /.End of single featuer inner -->
                    </div><!-- /.col-->
                    <div class="col-md-6 col-lg-3">
                        <!-- single featuer inner -->
                        <div class="single-feature text-center">
                            <img src="assets/img/icons/feature4.svg" class="svg" alt="">
                            <h3>Deep Water Filtration</h3>
                        </div><!--/. End of single featuer inner -->
                    </div><!-- /.col-->
                </div><!-- /.row-->
            </div><!-- /.container-->
        </div><!-- /.features inner-->
    </section><!-- End of feature area -->

    <!-- our partner -->
    <section class="pt-120 pb-120 boxed-shadow">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- partner carosel inner -->
                    <div class="partner-carousel-wrap">
                        <div class="partner-carousel owl-carousel">
                            <!-- single partner -->
                            <div class="single-partner">
                                <img src="assets/img/partner.png" alt="">
                            </div><!-- /.End of single partner -->

                            <!-- single partner -->
                            <div class="single-partner">
                                <img src="assets/img/partner.png" alt="">
                            </div><!-- /.End of single partner -->

                            <!-- single partner -->
                            <div class="single-partner">
                                <img src="assets/img/partner.png" alt="">
                            </div><!--/. End of single partner -->

                            <!-- single partner -->
                            <div class="single-partner">
                                <img src="assets/img/partner.png" alt="">
                            </div><!--/. End of single partner -->
                        </div>
                    </div><!--/.End of  partner carosel inner -->
                </div><!-- /.col-->
            </div><!-- /.row-->
        </div><!-- /.container-->
    </section><!-- /.End of our partner -->
    
    <!-- footer -->
    
    <?php   
    include("code/footer.php");
     ?>