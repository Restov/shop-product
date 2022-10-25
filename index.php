<?php
require_once("connection.php");
require_once('req.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamoda</title>
    <?php
    require_once('style.php');
    require_once('header.php');
    ?>

</head>

<body>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-2 row-cols-sm-2 ">
                <?php
                $categories = getAllCategoriesDesc($conn);
                foreach ($categories as $category) {
                    echo "<div class='col'>";
                    echo "<div class='card shadow-sm'>";
                    echo "<div class='card-body'>";
                    echo "<h3>$category[name]</h3>";
                    echo "<p class='card-text'>$category[description]</p>";
                    echo "<div class = 'd-flex justify-content-between align-items-center'>";
                    echo "<button onclick='location.href=`products.php?cat_id=$category[id]`' type='button' class='btn btn-sm btn-outline-secondary'>Посмотреть товары</button>";
                    echo "<small class='text-muted'>Осталось: $category[product_count] шт.</small>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>