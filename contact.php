 <?php   

include("code/header.php");
 ?> 
    <!-- End of Main header -->

    <!-- page title -->
    <div class="page-title-wrap primary-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- page title content -->
                    <div class="page-title-content text-center">
                        <ul class="mb-0 list-unstyle nav">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        <h1 class="h2">Get In Touch</h1>
                    </div>
                    <!-- End of page title content -->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.End of page title -->
    
    <!-- contact info -->
   <?php

// Query to fetch contact information
$sql = "SELECT `id`, `contact_name`, `contact_email`, `contact_phone`, `contact_address`, `contact_image` FROM `contact_details`";
$result = $con->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Loop through the results and display them
    while($row = $result->fetch_assoc()) {
        $contact_name = $row['contact_name'];
        $contact_email = $row['contact_email'];
        $contact_phone = $row['contact_phone'];
        $contact_address = $row['contact_address'];
        $contact_image = $row['contact_image']; // This might be used if you want to display an image
        
        ?>
        
        <!-- Contact info section -->
        <section class="pt-120 top-shape">
            <div class="contact-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Single contact info -->
                            <div class="single-contact-info">
                                <h4>About</h4>
                                <p><?php echo $contact_name; ?></p>
                            </div>
                            <!-- End of single contact info -->
                        </div>
                        <div class="col-md-4">
                            <!-- Single contact info -->
                            <div class="single-contact-info">
                                <h4>Address</h4>
                                <p><?php echo $contact_address; ?></p>
                            </div>
                            <!-- End of single contact info -->
                        </div>
                        <div class="col-md-4">
                            <!-- Single contact info -->
                            <div class="single-contact-info">
                                <h4>Contact</h4>
                                <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
                                <a href="tel:<?php echo $contact_phone; ?>"><?php echo $contact_phone; ?></a>
                            </div>
                            <!-- End of single contact info -->
                        </div><!-- /.col-->
                    </div><!-- /.row-->
                </div><!-- /.container-->
            </div><!-- /.contact info-->
        </section><!-- /.End of contact info -->
        
        <?php
    }
} else {
    echo "No contact information found.";
}

?>
    <!-- contact form -->
    <section class="pt-90 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <!-- section title -->
                    <div class="section-title text-center">
                        <span class="schoolbell">Contact Us</span>
                        <h2>Send Message</h2>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <!-- contact form -->
                    <div class=" contact-page-form">
                        <form  method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="n" placeholder="Full Name" class="theme-input-style" >
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="g" placeholder="Email Address" class="theme-input-style" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="m" placeholder="Write Message" class="theme-input-style"></textarea>
                                    <div class="submite-btn text-center">
                                        <button type="submit" name="btn" class="btn">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form><!--/.form-->

                        <?php 
if (isset($_POST['btn'])) 
{
    extract($_POST);
    
$sql="INSERT INTO `contact` (`id`, `name`, `gmail`, `message`) VALUES (NULL, '$n', '$g', '$m');";
$run=mysqli_query($con,$sql);

 if ($run) {

    require 'code/mail/function.php';




    $sender_mail =$g;
    $n=$m;
    $ps="jayu@92";
    $g=$g;
    
   
            $mail_sent = send_mail($sender_mail,$n,$ps,$g);

            if ($mail_sent) {
                $_SESSION['code_email'] = $sender_mail;
                echo "<script>
                alert('send success');
                </script>";
            } else {
                $errorMsgLogin = "Failed to send OTP. Please try again later.";
            }
    echo "<script>alert('is inserted..');</script>";
    
}

        // code...
}



                         ?>
                    </div><!-- /.End of contact form -->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/.End ofcontact form -->

    <!-- map -->
    <div class="google-map">
<iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sin!4v1738304235301!5m2!1sen!2sin!6m8!1m7!1s0uE4tJ6rb4GL5NqoFW03_w!2m2!1d21.54573973103665!2d71.82740473133461!3f307.97134!4f0!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End of map -->
    
    <!-- footer -->
    
    <?php   
    include("code/footer.php");
     ?>