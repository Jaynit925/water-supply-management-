<?php 
include("code/header.php");

 ?>
    <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-25">
            <h2>eCommerce Dashboard</h2>
            <div class="input-group dashboard-filter">
                <input type="text" class="form-control" name="basic" id="dashboardFilter" readonly>
                <label for="dashboardFilter" class="input-group-text"><i class="fa-light fa-calendar-days"></i></label>
            </div>
        </div>
<div class="row mb-25">
            <div class="col-lg-3 col-6 col-xs-12">
                <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                    <div class="left">
                        <p class="d-flex justify-content-between mb-2">Total order</p>
                        <h3 class="fw-normal"><?php 
$sql="SELECT * FROM `orders`";
$run=mysqli_query($con,$sql);
$total=mysqli_num_rows($run);

echo $total;
                                 ?></h3>
                        <p class="text-muted"><small>124 for last month</small></p>
                    </div>
                    <div class="right">
                        <div class="part-icon text-light rounded">
                            <span><i class="fa-light fa-user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-xs-12">
                <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                    <div class="left">
                        <p class="d-flex justify-content-between mb-2">issue pending</p>
                        <h3 class="fw-normal"><?php 
$sql="SELECT * FROM `contact`";
$run=mysqli_query($con,$sql);
$total=mysqli_num_rows($run);

echo $total;
                                 ?></h3>
                        <p class="text-muted"><small>4 for last month</small></p>
                    </div>
                    <div class="right">
                        <div class="part-icon text-light rounded">
                            <span><i class="fa-light fa-bullhorn"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-xs-12">
                <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                    <div class="left">
                        <p class="d-flex justify-content-between mb-2">Total Profit</p>
                        <h3 class="fw-normal">₹ <?php 
$sql="SELECT sum(price) FROM `booking`";
$run=mysqli_query($con,$sql);
$total=mysqli_fetch_array($run);

echo $total[0];
                                 ?></h3>
                        <p class="text-muted"><small>124 for last month</small></p>
                    </div>
                    <div class="right">
                        <div class="part-icon text-light rounded">
                            <span><i class="fa-light fa-dollar-sign"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-xs-12">
                <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                    <div class="left">
                        <p class="d-flex justify-content-between mb-2">Pending order</p>
                        <h3 class="fw-normal"><?php 
$sql="SELECT * FROM `booking` where status='Pending'";
$run=mysqli_query($con,$sql);
$total=mysqli_num_rows($run);

echo $total;
                                 ?></h3>
                        <p class="text-muted"><small>124 for last month</small></p>
                    </div>
                    <div class="right">
                        <div class="part-icon text-light rounded">
                            <span><i class="fa-light fa-magnifying-glass-chart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        
            <div class="col-xxl-4 col-md-6">
                <div class="panel">
                    <div class="panel-header">
                        <h5>New Customers Contact</h5>
                        <button class="btn btn-sm btn-icon btn-outline-primary"><i class="fa-regular fa-ellipsis-vertical"></i></button>
                    </div>
                    <div class="panel-body">
                        <table class="table table-borderless new-customer-table">
                            <tbody>
                               




<?php 
$sql="SELECT `id`, `name`, `gmail`, `message` FROM `contact`";
$run=mysqli_query($con,$sql);

                                while ($row = mysqli_fetch_assoc($run)) {
                                    extract($row);
echo '

<tr>
                                    <td>
                                        <div class="new-customer">
                                            <div class="part-img">
                                                <img src="assets/images/avatar.png" alt="Image">
                                            </div>
                                            <div class="part-txt">
                                                <p class="customer-name">'.$gmail.'</p>
                                                <span>'.$message.'</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td><a class="fa-light fa-trash" href="code/delete.php?tbl=contact&id='.$id.'&url=index.php"></a></td>
                                </tr>

';
                                }
  ?>
                                



                                                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Recent Orders</h5>
                        <div id="tableSearch"></div>
                    </div>
                    <div class="panel-body">
                        

<?php 

$limit = 5; // Number of orders per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page number, default is 1
$offset = ($page - 1) * $limit; // Calculate the offset for the SQL query

// Fetch orders from the database with pagination
$sql = "SELECT * FROM `orders` where status='Pending' LIMIT $offset, $limit"; 
$run = mysqli_query($con, $sql);

// Count total orders for pagination
$countSql = "SELECT COUNT(*) AS total FROM `orders` where status='Pending'";
$countRun = mysqli_query($con, $countSql);
$totalOrders = mysqli_fetch_assoc($countRun)['total']; // Total number of orders
$totalPages = ceil($totalOrders / $limit); // Calculate total pages

 ?>
                    <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped" id="allOrderTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Display all orders from the database
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_assoc($run)) {
                                    $orderId = $row['id'];
                                    $productTitle = $row['product_title']; // assuming you have a product title field
                                    $customerName = $row['customer_name'];
                                    $status = $row['status'];
                                    $price = $row['price'];
                                    $orderDate = $row['order_date'];

                                    echo "<tr>
                                        <td>#{$orderId}</td>
                                        
                                        <td>{$customerName}</td>
                                        <td><span class='badge bg-success'>{$status}</span></td>
                                        <td>₹{$price}</td>
                                        <td>{$orderDate}</td>
                                       <td>
                                            <div class='digi-dropdown dropdown d-inline-block'>
                                                <button class='btn btn-sm btn-outline-primary' data-bs-toggle='dropdown' aria-expanded='false'>Action <i class='fa-regular fa-angle-down'></i></button>
                                                <ul class='digi-dropdown-menu dropdown-menu dropdown-slim dropdown-menu-sm'>
                                                    <li><a href='?action=approve&id={$orderId}' class='dropdown-item'><span class='dropdown-icon'><i class='fa-light fa-eye'></i></span> Approve</a></li>
                                                    <li><a href='?action=pending&id={$orderId}' class='dropdown-item'><span class='dropdown-icon'><i class='fa-light fa-pen-to-square'></i></span> Pending</a></li>
                                                    <li><a href='?action=cancel&id={$orderId}' class='dropdown-item'><span class='dropdown-icon'><i class='fa-light fa-id-card'></i></span> Cancel</a></li>
                                                    <li><a href='?action=delete&id={$orderId}' class='dropdown-item'><span class='dropdown-icon'><i class='fa-light fa-trash-can'></i></span> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>No orders found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table><br>
                    <!-- Pagination -->
                  <nav>
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>


                        <div class="table-bottom-control"></div>
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
    <script src="assets/vendor/js/apexcharts.js"></script>
    <script src="assets/vendor/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/js/moment.min.js"></script>
    <script src="assets/vendor/js/daterangepicker.js"></script>
    <script src="assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- for demo purpose -->
    <script>
        var rtlReady = $('html').attr('dir', 'ltr');
        if (rtlReady !== undefined) {
            localStorage.setItem('layoutDirection', 'ltr');
        }
    </script>
    <!-- for demo purpose -->
</body>

<!-- Mirrored from digiboard-html.codebasket.xyz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 12:12:05 GMT -->
</html>