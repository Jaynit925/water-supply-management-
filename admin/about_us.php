 <?php          
    include("code/header.php");


$s="SELECT * FROM `about_us`";

$r=mysqli_query($con,$s);


$f=mysqli_fetch_assoc($r);

  ?>




 <!-- main content start -->
    <div class="main-content">
      
        <div class="row g-4 justify-content-center">
         

         <div class="col-lg-12 ">
                <div class="panel">
                    <div class="panel-header">
                        <h5>Contact Form One</h5>
                    </div>
                    <div class="panel-body">
                        
<form method="post"   enctype="multipart/form-data" >

                                    <div class="row g-3">
                           



                            <div class="col-sm-6">
                                <label for="basicInput" class="form-label">about_us title</label>
                                <input type="text" name="t" value="<?php echo $f['title']; ?>" class="form-control" id="basicInput">
                            </div>
                            <div class="col-sm-6">
                                <label for="inputWithPlaceholder" class="form-label">Image</label>
                                <input type="file" class="form-control" name="f_f" id="inputWithPlaceholder" placeholder="Placeholder">
                            </div>
                            <div class="col-sm-12">
                                <label for="inputWithValue" class="form-label">description</label>
                        <textarea class="form-control" name="d" rows="10"><?php echo $f['description']; ?></textarea>
                            </div>
                            


                            <div class="col-12 text-end">
                                <button class="btn btn-sm btn-primary" type="submit" name="btn">Save</button>
                            </div>
                        </div>

</form>


                    </div>
                </div>
            </div> 


<?php 
//must Be one form <form method="post" enctype="multipart/form-data"
//all form input name ex: name="t"
//must be one submit button ex: type="submit"
//muat be submit buuton name  ex: name="btn"

if (isset($_POST['btn'])) {
    // code...
    extract($_POST);



 $img=$_FILES['f_f']['tmp_name'];
$path="upload/about_us/".$_FILES['f_f']['name'];
    if(move_uploaded_file($img,$path)){
$sql="UPDATE `about_us` SET `title` = '$t', `description` = '$d', `img` = '$path'";
   
}else{
    $sql="UPDATE `about_us` SET `title` = '$t', `description` = '$d'";
}


$run=mysqli_query($con,$sql);

if ($run) {
    // code...

echo "<script>window.location.href='url.php?url_v=about_us.php'</script>";




}
}
 ?>





        </div>


     <?php          
    include("code/footer.php")
  ?>

