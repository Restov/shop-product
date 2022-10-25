<?php
require_once('connection.php');
require_once('req.php');
require_once('validate.php');
list($id, $offset, $page) = validateProductsPage($_GET);
$category = categoryDesc($conn, $id);
$products = getProductsByCategory($conn, $id, $offset);
validateQueries($products);
validateQueries($category);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamoda - <?php echo " " . $category['name']; ?></title>
    <?php require_once('style.php'); ?>
</head>

<body>
    <?php require_once('header.php'); ?>
    <h2>Раздел - <?php echo $category['name']; ?></h2>
    <p><?php echo $category['description']; ?></p>
    <button class="btn btn-primary" onclick="location.href='index.php'">Назад</button>

    <nav style="margin-top:10px;">
        <ul class="pagination">
            <?php
            $count = productCount($conn, $id);
            $pages = ceil($count / 12);
            for ($i = 1; $i <= $pages; $i++) {
                if ($i == $page) {
                    echo "<li class='page-item active'><a class='page-link' href='products.php?cat_id=$id&page=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='products.php?cat_id=$id&page=$i'>$i</a></li>";
                }
            }
            ?>

        </ul>
    </nav>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                foreach ($products as $product) {
                    echo '<div class="col">
                    <div class="card shadow-sm">
                        <img src = "' . $path . $product['ref'] . '" alt = "' . $product['alt'] . '">
                        <div class="card-body">
                        <h5 class="card-text">' . $product['title'] . '</h5>
                            <p class="card-text"> </p>';
                    echo '<div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <button onclick="location.href=`product.php?id=' . $product['id'] . '`" type="button" class="btn btn-sm btn-outline-secondary">Посмотреть</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>

            </div>
        </div>

</body>

</html>