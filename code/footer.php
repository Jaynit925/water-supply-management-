<?php 

$sql = "SELECT `id`, `contact_name`, `contact_email`, `contact_phone`, `contact_address`, `contact_image` FROM `contact_details`"; 
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($run);
extract($row);
 ?>
<!-- footer -->
    <footer class="footer secondery-bg">
        <div class="footer-top pt-110 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- footer widget -->
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h3>Address</h3>
                            </div>
                            <p><?php echo $contact_address; ?></p>
                        </div>
                        <!-- End of footer widget -->
                    </div>

                    <div class="col-md-4">
                        <!-- footer widget -->
                        <div class="footer-widget text-center">
                            <div class="widget-title">
                                <h3>Follow</h3>
                            </div>
                            <div class="footer-social-area">
                                <ul class="social-list mb--0 list-unstyled">
                                    <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of footer widget -->
                    </div>

                    <div class="col-md-4">
                        <!-- footer widget -->
                        <div class="footer-widget text-right">
                            <div class="widget-title">
                                <h3>Contact</h3>
                            </div>
                            <div class="footer-contact-info">
                                <a ><?php echo $contact_phone; ?></a>
                                <a ><?php echo $contact_email; ?></a>
                            </div>
                        </div>
                        <!-- End of footer widget -->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="footer-bottom-text">
                <p> @College Project 2025 Created by Jaynit & Piyush </p>
            </div>
        </div>
    </footer>
    <!-- End of footer -->

    <!-- back to top -->
    <div class="back-to-top">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- back to top -->


    <!-- JS Files -->
   <!-- ==== JQuery 3.3.1 js file==== -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- ==== Bootstrap js file==== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- ==== JQuery Waypoint js file==== -->
    <script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>

    <!-- ==== Parsley js file==== -->
    <script src="assets/plugins/parsley/parsley.min.js"></script>

    <!-- ==== Ratina js file==== -->
    <script src="assets/plugins/retinajs/retina.min.js"></script>

    <!-- ==== parallax js==== -->
    <script src="assets/plugins/parallax/parallax.js"></script>

    <!-- ==== Owl Carousel js file==== -->
    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>

    <!-- ==== Menu  js file==== -->
    <script src="assets/js/menu.min.js"></script>

    <!-- ===video popup=== -->
    <script src="assets/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>

    <!-- ====Counter js file=== -->
    <script src="assets/plugins/waypoints/jquery.counterup.min.js"></script>

    <!-- cammera js -->
    <script src="assets/plugins/camera/camera.min.js"></script>

    <!-- easing js -->
    <script src="assets/js/easing.js"></script>

     <!--==== google map api key ====-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2D8wrWMY3XZnuHO6C31uq90JiuaFzGws"></script>

    <!-- ==== Script js file==== -->
    <script src="assets/js/scripts.js"></script>

    <!-- ==== Custom js file==== -->
    <script src="assets/js/custom.js"></script>

</body>

<!-- Mirrored from pixydrops.com/mineralo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jul 2024 12:47:22 GMT -->
</html>