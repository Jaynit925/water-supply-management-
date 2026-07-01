<?php   
include("code/header.php"); 

// Check if blog ID is passed
if(isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    // Fetch blog details from the database
    $sql = "SELECT id, title, description, img FROM news WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if blog exists
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='container text-center'><h3>Blog not found!</h3></div>";
        include("code/footer.php");
        exit();
    }
} else {
    echo "<div class='container text-center'><h3>Invalid request!</h3></div>";
    include("code/footer.php");
    exit();
}
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
                    <h1 class="h2"><?php echo $row['title']; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Details -->
<section class="pt-120 pb-120 top-shape">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <!-- Blog Image -->
                    <div class="blog-details-image">
                        <img src="admin/<?php echo $row['img']; ?>" style="width: 100%;" alt="Blog Image">
                    </div>

                    <!-- Blog Title -->
                    <div class="blog-details-head">
                        <h2><?php echo $row['title']; ?></h2>
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-details-body">
                        <p><?php echo nl2br($row['description']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside>
                    <div class="single-sidebar-widget mb-30">
                        <div class="sidebar-title">
                            <h4>Latest Posts</h4>
                        </div>
                        <ul class="treading-posts p-0 m-0 list-unstyled">
                            <?php
                            $latest_sql = "SELECT id, title, img FROM news ORDER BY id DESC LIMIT 5";
                            $latest_result = $con->query($latest_sql);
                            while ($latest = $latest_result->fetch_assoc()) {
                                echo "<li class='d-flex'>
                                    <img src='admin/{$latest['img']}' style='height:50px;' alt=''>
                                    <div class='latest-poat'>
                                        <h6><a href='blog-details.php?id={$latest['id']}'>{$latest['title']}</a></h6>
                                    </div>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php include("code/footer.php"); ?>
