 <?php          
    include("code/header.php");

$id=$_GET['id'];


$sql="SELECT * FROM `news` where id=$id";

$run=mysqli_query($con,$sql);


$row_1=mysqli_fetch_assoc($run);
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
                                <label for="basicInput" class="form-label">news title</label>
                                <input type="text" name="t" value="<?php echo $row_1['title']; ?>" class="form-control" id="basicInput">
                            </div>
                            <div class="col-sm-6">
                                <label for="inputWithPlaceholder" class="form-label">Image</label>
                                <input type="file" class="form-control" name="f_f" id="inputWithPlaceholder" placeholder="Placeholder">
                            </div>
                            <div class="col-sm-12">
                                <label for="inputWithValue" class="form-label">description</label>
                        <textarea class="form-control" name="d" rows="10"><?php echo $row_1['description']; ?></textarea>
                            </div>
                            


                            <div class="col-12 text-end">
                                <button class="btn btn-sm btn-primary" type="submit" name="btn">Update</button>
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
$path="upload/news/".$_FILES['f_f']['name'];
    if(move_uploaded_file($img,$path)){
   


$sql="UPDATE `news` SET `title` = '$t', `description` = '$d', `img` = '$path' WHERE `news`.`id` = $id;";

}else{

$sql="UPDATE `news` SET `title` = '$t', `description` = '$d'  WHERE `news`.`id` = $id;";


}
$run=mysqli_query($con,$sql);

if ($run) {
    // code...

echo "<script>window.location.href='url.php?url_v=edit_news.php?id=".$id."'</script>";

}



}
 ?>





        </div>


     <?php          
    include("code/footer.php")
  ?>

