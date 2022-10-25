<?php
$path = "./assets/img/";
function createRequest($conn, $sql, $params = [])
{
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}
function getAllCategoriesDesc($conn)
{

    $sql = "SELECT c.id,c.name,c.description, COUNT(*) AS product_count
        FROM (SELECT * FROM product_categories
        UNION
        SELECT * FROM product_main_categories ) as cats
        INNER JOIN categories as c ON c.id = cats.category_id
        INNER JOIN products as p ON cats.product_id = p.id
        WHERE p.quantity > 0
        GROUP BY cats.category_id
        ORDER BY product_count DESC;";
    $stmt = createRequest($conn, $sql);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}

function categoryDesc($conn, $id)
{
    $sql = "SELECT name,description FROM categories WHERE id = $id;";
    $stmt = createRequest($conn, $sql);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    return $category;
}

function getProductsByCategory($conn, $id, $offset)
{
    $sql = "SELECT p.id,p.title,c.name as main_cat, i.ref,i.alt FROM (SELECT * FROM product_categories as pc UNION SELECT * FROM product_main_categories as pmc) as z
        INNER JOIN products as p on z.product_id = p.id
        INNER JOIN product_main_categories as pmc ON pmc.product_id = z.product_id
        INNER JOIN categories as c ON pmc.category_id = c.id
        INNER JOIN product_main_images as pmi ON pmi.product_id = p.id
        INNER JOIN images as i ON pmi.image_id = i.id
        WHERE z.category_id = $id AND p.quantity > 0 LIMIT 12 OFFSET $offset";
    $stmt = createRequest($conn, $sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function productCount($conn, $id)
{
    $sql = "SELECT COUNT(*) AS cnt FROM  (SELECT * FROM product_main_categories UNION SELECT * FROM product_categories) as z INNER JOIN products as p ON p.id = z.product_id WHERE category_id = $id AND p.quantity > 0;";
    $stmt = createRequest($conn, $sql);
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $count['cnt'];
    return $count;
}

function getProductCategories($conn, $id)
{
    $sql = "SELECT DISTINCT c.id, c.name
    FROM (SELECT * FROM product_categories UNION SELECT * FROM product_main_categories) as z
    INNER JOIN categories as c ON c.id = z.category_id
    WHERE product_id = $id;";
    $stmt = createRequest($conn, $sql);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
function getProductInfo($conn, $id)
{
    $sql = "SELECT title, price, price_no_discount, price_promo, description
    FROM products
    WHERE id = $id;";
    $stmt = createRequest($conn, $sql);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}

function getMainCategory($conn, $id)
{
    $sql = "SELECT category_id as main_cat_id
    FROM product_main_categories as pmc
    WHERE pmc.product_id = $id;";
    $stmt = createRequest($conn, $sql);
    $main_cat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $main_cat;
}

function productBackButton($main_cat)
{
    echo "<button class='btn btn-primary'";
    if (isset($_SERVER['HTTP_REFERER'])) {
        echo "onclick='window.location.href = \"" . $_SERVER['HTTP_REFERER'] . "\"'";
    } else {
        echo "onclick= location.href='products.php?cat_id=" .  $main_cat['main_cat_id'] . "'";
    }
    echo ">Назад</button>";
}
function getProductImages($conn,$id){
    $sql = "SELECT i.ref,i.alt 
    FROM (SELECT * FROM product_images 
    UNION
    SELECT * FROM product_main_images) as z
    INNER JOIN images as i ON i.id = z.image_id
    WHERE product_id =$id;";
    $stmt = createRequest($conn, $sql);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $images;
}

function getMainImage($conn,$id){
    $sql = "SELECT i.ref,i.alt 
    FROM product_main_images as pmi
    INNER JOIN images as i ON i.id = pmi.image_id
    WHERE product_id =$id;";
    $stmt = createRequest($conn, $sql);
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    return $image;
}

function insertFeedback($conn, $params)
{
    $sql = "INSERT INTO `feedback` (`name`, `email`, `year`, `gender`, `theme`, `message`, `checked`) VALUES (:name, :email, :year, :gender, :theme, :message, :checked);";
    $stmt = createRequest($conn, $sql, $params);
    $stmt->execute($params);

}