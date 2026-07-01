<?php   
include("code/header.php"); // Include header
include("config.php"); // Database connection
?>

<!-- Page Title -->
<div class="page-title-wrap primary-bg">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-title-content text-center">
                    <ul class="mb-0 list-unstyle nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="blog.php">Blog</a></li>
                    </ul>
                    <h1 class="h2">Blog Posts</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Section -->
<section class="pt-120 pb-90 top-shape">
    <div class="container">
        <div class="row">

            <?php
            $sql = "SELECT id, title, description, img FROM news";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-blog-inner">
                    <div class="post-image">
                        <a href="blog-details.php?id=<?php echo $row['id']; ?>">
                            <img src="admin/<?php echo $row['img']; ?>" alt="Blog Image">
                        </a>
                    </div>

                    <div class="post-content">
                        <div class="post-title">
                            <h3><a href="blog-details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
                        </div>
                        <p><?php echo substr($row['description'], 0, 100); ?>...</p>
                        <a href="blog-details.php?id=<?php echo $row['id']; ?>"><i class="fa fa-arrow-circle-o-right"></i> More</a>
                    </div>
                </div>
            </div>
            <?php 
                }
            } else {
                echo "<p class='text-center'>No blog posts available.</p>";
            }
            ?>

        </div>
    </div>
</section>

<?php include("code/footer.php"); ?> <!-- Include footer -->
