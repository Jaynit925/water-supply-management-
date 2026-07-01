<?php
    include("code/header.php");
    include("config.php"); // Assuming you have a database connection file
?>

<div class="main-content">
    <div class="row g-4">
        <div class="col-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="product-table-quantity">
                        Manage News
                    </div>

                    <!-- News Card Grid -->
                    <div class="row">
                        <?php
                        // Pagination logic
                        $limit = 6; // Number of items per page
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get the current page number
                        $offset = ($page - 1) * $limit; // Calculate the offset

                        // Fetch total number of news records for pagination
                        $count_sql = "SELECT COUNT(*) AS total FROM `news`";
                        $count_run = mysqli_query($con, $count_sql);
                        $total_rows = mysqli_fetch_assoc($count_run)['total'];
                        $total_pages = ceil($total_rows / $limit);

                        // Fetch news records with pagination
                        $sql = "SELECT `id`, `title`, `description`, `img` FROM `news` LIMIT $offset, $limit";
                        $run = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($run)) {
                            extract($row);
                            echo '
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <!-- Image with fixed size -->
                                    <img src="' . $img . '" class="card-img-top" alt="' . $title . '" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <!-- Title with fixed size -->
                                        <h5 class="card-title" style="font-size: 1.1rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' . $title . '</h5>
                                        <!-- Description with fixed height -->
                                        <p class="card-text" style="height: 70px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' . $description . '</p>
                                        <a href="edit_news.php?id=' . $id . '" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i> Edit</a>
                                        <a href="code/delete.php?tbl=news&id=' . $id . '&url=manage_news.php" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="pagination-wrapper text-center mt-4">
                        <ul class="pagination">
                            <?php
                            // Display Previous Page Button
                            if ($page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                            }

                            // Display Page Numbers
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '">
                                    <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                                </li>';
                            }

                            // Display Next Page Button
                            if ($page < $total_pages) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("code/footer.php");
?>
