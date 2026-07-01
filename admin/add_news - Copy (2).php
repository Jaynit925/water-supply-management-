 <?php          
    include("code/header.php")
  ?>




 <!-- main content start -->
    <div class="main-content">
        <div class="dashboard-breadcrumb mb-25">
            <h2>Invoices</h2>
        </div>
        <div class="row g-4 justify-content-center">
          





<form method="post"   enctype="multipart/form-data" >
<div class="col-lg-12">
                <div class="panel mb-25">
                    <div class="panel-header">
                        <h5>Input Example</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="basicInput" class="form-label">news title</label>
                                <input type="text" name="t" class="form-control" id="basicInput">
                            </div>
                            <div class="col-sm-6">
                                <label for="inputWithPlaceholder" class="form-label">Image</label>
                                <input type="file" class="form-control" name="f_f" id="inputWithPlaceholder" placeholder="Placeholder">
                            </div>
                            <div class="col-sm-12">
                                <label for="inputWithValue" class="form-label">description</label>
                        <textarea class="form-control" name="d"></textarea>
                            </div>
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <div class="col-sm-3">
                                <input type="submit" name="btn" class="form-control" id="" value="submit">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>



</form>
<?php 
//must Be one form <form method="post" enctype="multipart/form-data"
//all form input name ex: name="t"
//must be one submit button ex: type="submit"
//muat be submit buuton name  ex: name="btn"

if (isset($_POST['btn'])) {
    // code...
    extract($_POST);



 $img=$_FILES['f_f']['tmp_name'];
$path="upload/news/".$_FILES['f_f']['name'];
    if(move_uploaded_file($img,$path)){
   


$sql="INSERT INTO `news` (`id`, `title`, `description`, `img`) VALUES (NULL, '$t', '$d', '$path');";

$run=mysqli_query($con,$sql);

if ($run) {
    // code...
echo "<script>window.location.href='url.php?url_v=add_news.php'</script>";

}


}
}
 ?>





        </div>


     <?php          
    include("code/footer.php")
  ?>

