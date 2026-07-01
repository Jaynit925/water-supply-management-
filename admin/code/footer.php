    <!-- footer start -->
       
        <!-- footer end -->
    </div>
    <!-- main content end -->
    
    <script src="assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/js/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/js/select2.min.js"></script>
    <script src="assets/vendor/js/jQuery.print.js"></script>
    <script src="assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/select2-init.js"></script>
    <!-- for demo purpose -->
    <script>
        var rtlReady = $('html').attr('dir', 'ltr');
        if (rtlReady !== undefined) {
            localStorage.setItem('layoutDirection', 'ltr');
        }
    </script> 
    <!-- for demo purpose -->
</body>

<!-- Mirrored from digiboard-html.codebasket.xyz/invoices.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 1 2:12:52 GMT -->
</html>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>

<?php   



if ($_SESSION['alert']==1) {
    // code...

    echo '

  <script >
    
    swal({
  title: "'.$_SESSION['alert_title'].'",
  text:
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
  icon: "success",
  buttons: {

    confirm: "Okay"
  },
  closeOnClickOutside: false
});
  </script>


    ';
$_SESSION['alert']=0;
}


 ?>