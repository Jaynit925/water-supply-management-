<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "water_supplies"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get booking ID from URL
if ($_SESSION['last_id']=="" and $_GET['id']=="") {
    # code...
                    echo "<script>window.location='../service.php';</script>";
}

$booking_id = isset($_GET['id']) ? (int)$_GET['id'] : $_SESSION['last_id'];
$sql = "SELECT * FROM booking WHERE id = $booking_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Booking not found.");
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #<?php echo $row['id']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-box {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            background: #fff;
        }
        .invoice-box h2 {
            text-align: center;
        }
        .table th, .table td {
            border-bottom: 1px solid #ddd;
        }
        .btn-print {
            display: block;
            margin: auto;
        }
           .btn-container {
            margin-top: 20px;
            text-align: center;
        }
        /* Hide buttons when printing */
        @media print {
            .btn-container {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="invoice-box mt-5">
    <h2>Invoice</h2>
    <p><strong>Invoice ID:</strong> <?php echo $row['id']; ?></p>
    <p><strong>Customer Name:</strong> <?php echo $row['customer_name']; ?></p>
    <p><strong>Order Date:</strong> <?php echo $row['order_date']; ?></p>
    
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row['product']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>₹ <?php echo number_format($row['price']/$row['qty'], 2); ?></td>
                <td>₹ <?php echo number_format($row['price'] , 2); ?></td>
            </tr>
        </tbody>
    </table>

    <p><strong>Payment Method:</strong> <?php echo $row['payment_method']; ?></p>
    <p><strong>Delivery Address:</strong> <?php echo $row['delivery_address']; ?></p>
    <p><strong>Status:</strong> <?php echo $row['status']; ?></p>

    <div class="btn-container">
        <a href="../index.php" class="btn btn-success">Go to Home</a>
        <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
    </div>

</div>

</body>
</html>
