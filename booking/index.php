<?php
include("../code/connection.php");



$id=$_SESSION['book_id'];

if ($id=="") {
  # code...
                  echo "<script>window.location='../service.php';</script>";


}

$sql = "SELECT * FROM `services` where id=$id"; 
$run = mysqli_query($con, $sql);
 
                            $row = mysqli_fetch_assoc($run);
                            extract($row);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "water_supplies"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $product = $row['title'];
    $price = $row['price']*$_POST['qty'];
$mobile=$_POST['mobile'];
  

    $_SESSION['name']=$customer_name;
    $_SESSION['price']=$price;
    $_SESSION['mobile']=$mobile;
    $payment_method = $_POST['payment_method'];
    $delivery_address=$_POST['delivery_address'];
    $qty=$_POST['qty'];
    $login_id=$_SESSION['id'];

    $sql = "INSERT INTO booking (customer_name, status, product, price, payment_method, delivery_status, order_date,delivery_address,qty,login_id) 
            VALUES ('$customer_name', 'Pending', '$product', '$price', '$payment_method', 'Processing', NOW(),'$delivery_address','$qty','$login_id')";

    if ($conn->query($sql) === TRUE) {

      if ($payment_method=="Online") {
        # code...


$sss = "SELECT * FROM `booking` ORDER BY id DESC limit 1"; 
$run1 = mysqli_query($con, $sss);
$row1 = mysqli_fetch_assoc($run1);
$_SESSION['last_id']=$row1['id'];


                echo "<script>window.location='payment.php';</script>";



      }
        echo "<script>alert('Booking Successful!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Bottle Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php 


$id=$_SESSION['book_id'];
$sql = "SELECT * FROM `services` where id=$id"; 
$run = mysqli_query($con, $sql);
 
                            $row = mysqli_fetch_assoc($run);
                            extract($row);


   ?>
    <div class="container py-5">
        <h2 class="text-center mb-4">Book Your Water Bottle</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                  <br>
                    <img src="../admin/<?php echo $img; ?>" style="height: 150px;" class="card-img-top" alt="Water Bottle">
                    <div class="card-body">
                        <h5 class="card-title">Premium <?php echo $title; ?></h5>
                        <p class="card-text"><?php echo $description; ?></p>
                        <p class="fw-bold">Price: ₹<?php echo $price; ?></p>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="customer_name" class="form-control" required>
                            </div>
                             <div class="mb-3">
                                <label class="form-label">Mobile</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>
                          
                            <div class="mb-3">
                                <label class="form-label">Delivery Address</label>
                              
                                <input type="text" style="height: 150px;" name="delivery_address" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Qty</label>
                                <input type="number"  name="qty"  class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Payment Method</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="Online">Online</option>
                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
