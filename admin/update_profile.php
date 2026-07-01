<?php
include("../code/connection.php");
session_start();

// Assuming the user is logged in
$user_id = $_SESSION['id'];

// Get form data
$full_name = mysqli_real_escape_string($con, $_POST['full_name']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$biography = mysqli_real_escape_string($con, $_POST['biography']);
$role = mysqli_real_escape_string($con, $_POST['role']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$website = mysqli_real_escape_string($con, $_POST['website']);
$address = mysqli_real_escape_string($con, $_POST['address']);

// File handling (optional for profile picture)
if ($_FILES['profile_picture']['name']) {
    $profile_picture = $_FILES['profile_picture']['name'];
    $upload_dir = 'upload/profile_pictures/';
    $upload_file = $upload_dir . basename($profile_picture);
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_file);
} else {
    // Keep the current profile picture if no new file is uploaded
    $profile_picture = $_POST['current_picture'];
}

// Update user profile in the database
$sql = "UPDATE profile SET full_name = '$full_name', username = '$username', biography = '$biography', role = '$role', email = '$email', phone = '$phone', website = '$website', address = '$address', profile_picture = '$profile_picture' WHERE id = '$user_id'";

if (mysqli_query($con, $sql)) {
    echo "<script>alert('Profile updated successfully'); window.location.href='profile.php';</script>";
} else {
    echo "<script>alert('Error updating profile'); window.location.href='profile.php';</script>";
}
?>
