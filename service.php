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
$sql = "SELECT * FROM `services`"; 
$run = mysqli_query($con, $sql);
 if (mysqli_num_rows($run) > 0) {
                            while ($row = mysqli_fetch_assoc($run)) {
                                $serviceId = $row['id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $img = $row['img'];
                                    echo '

                <div class="col-md-6 col-lg-4">
                    <!-- single bottle deliver wrap -->
                    <div class="single-bottle-inner text-center">
                        <div class="bottle-image">
                            <img src="admin/'.$img.'" alt="" class="svg">
                        </div>
                        <div class="single-bottle-text">
                            <h4>'.$title.'</h4>
                            <p>'.$description.'</p>
                            <a href="service-details.php?id='.$serviceId.'"><i class="fa fa-arrow-circle-o-right"></i>Order</a>
                        </div>
                    </div><!-- /.End of single bottle deliver wrap -->
                </div><!-- /.col-->

                                    ';


}

}
 ?>













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