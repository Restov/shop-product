<?php
require_once('req.php');
require_once('validate.php');
$id = validateProduct($_GET);
$product = getProductInfo($conn, $id);
$cats = getProductCategories($conn, $id);
$main_cat = getMainCategory($conn, $id);
$images = getProductImages($conn, $id);
$mainImage = getMainImage($conn, $id);
if (!$product || !$cats || !$main_cat || !$images || !$mainImage) {
    header('Location: 404.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamoda - <?php echo " " . $product['title']; ?></title>
    <?php
    require_once('style.php');
    ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="./assets/scripts/index.js"></script>
    <script src="./assets/scripts/notify.js"></script>
</head>

<body>

    <body>
        <?php
        require_once('header.php');

        if (isset($_SERVER['HTTP_REFERER'])) {
            $url = parse_url($_SERVER['HTTP_REFERER']);
            if ($url['path'] == '/products.php') {
                $cat_id = $url['query'][-1];
                $cat_name = getCategoryName($conn, $cat_id);
                echo '<div>' . $cat_name['name'] . '</div>';
                echo "<a class='btn btn-primary'";
                echo "href = \"" . $_SERVER['HTTP_REFERER'] . "\"'";
                echo ">Назад</a>";
            }
        } else {
            echo "<a class='btn btn-primary'";
            echo "href='products.php?cat_id=" .  $main_cat['main_cat_id'] . "'";
            echo ">Назад</a>";
        }

        ?>
        <div class="layout">
            <div class="product">
                <div class="product__image">
                    <div class="product__image__pick">
                        <?php
                        foreach ($images as $image) {
                            echo "<div class='product__image__pick-item'>";
                            echo "<img src='$path$image[ref]' alt='$image[alt]'>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <img class="product__image-main product__image-main--active" src="<?php echo $path . $mainImage['ref']; ?>" alt="<?php echo $mainImage['alt']; ?>">
                </div>
                <div class="product__description">
                    <h2 class="product__title"><?php echo $product['title']; ?></h2>
                    <div class="product__categories">
                        <?php
                        foreach ($cats as $cat) {
                            echo "<a href='products.php?cat_id={$cat['id']}'>{$cat['name']}</a>";
                        }
                        ?>
                    </div>
                    <div class="product__price">
                        <span class="product__price-old"><?php echo $product['price_no_discount']; ?></span>
                        <span class="product__price-new"><?php echo $product['price']; ?> ₽</span>
                        <span class="product__price-discount"><?php echo $product['price_promo']; ?> ₽</span> <span class="product__price-promo">— с
                            промокодом</span>
                    </div>
                    <div class="product__info">
                        <div class="product__info-item"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="10px">
                                <image x="0px" y="0px" width="14px" height="10px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAKCAQAAAAu0KdMAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfmCgoXKiKKppLDAAAAUElEQVQY022NyxXAMAzCBGN0/z3pwanzabj5yQg9BHFJwBPlQODZ0oEik70CqVvCP2M0NMFlS1YhgxtQUPGs4xla7a1P47qjdvWvcL+rBta8LIobLU8QlSgAAAAASUVORK5CYII=" />
                            </svg>В наличии в магазине <a href="#">Lamoda</a>
                        </div>
                        <div class="product__info-item"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="13px">
                                <image x="0px" y="0px" width="17px" height="13px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAANCAQAAADlcE2RAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfmCgoXKxvMuCuKAAAAcUlEQVQY02WQyRHAIAwDV4yrSP99Kg87ICa8fMg60GMAMOpC3e2Sgtjw79wQ3wDfyOWpfO3yLcWBfjSg4yXlRGLr9Ldhj7yoRoZheUSN0A4tBbGS0lB9ZYs5+tZ7sti0GTszTSLrEMxP6TNcoX8lOwFeff4iVDDZtBgAAAAASUVORK5CYII=" />
                            </svg>Бесплатная доставка</div>
                    </div>

                    <div class="product__buttons">
                        <div class="product__buttons-number">
                            <a href="#" class="product__buttons-number-minus">−</a>
                            <input class="product__buttons-number-text" type="number" name="count" value="1" min="1" max="10" step="1">

                            <a href="#" class="product__buttons-number-plus">+</a>
                        </div>
                        <button class="product__button product__button--add">Купить</button>
                        <button class="product__button product__button--star">В избранное</button>
                    </div>
                    <div class="product__text">
                        <p>
                            <?php
                            echo $product['description'];
                            ?>
                        </p>

                    </div>
                    <div class="product__share">
                        <div class="product__share-title">Поделиться:</div>
                        <div class="product__share-list">
                            <a href="#"><img src="assets/img/vk.png"></a>
                            <a href="#"><img src="assets/img/goo.png"></a>
                            <a href="#"><img src="assets/img/fb.png"></a>
                            <a href="#"><img src="assets/img/tw.png"></a>
                        </div>
                        <div class="product__share-count">123</div>
                    </div>

                </div>
            </div>
        </div>

    </body>
</body>

</html>