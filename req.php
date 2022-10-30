<?php
require_once('connection.php');
$path = "./assets/img/";
function createRequest($conn, $sql, $params = [])
{
    $stmt = $conn->prepare($sql);
    if ($params) {
        foreach ($params as $key => $value) {
            if (is_int($value)) {
                $type = PDO::PARAM_INT;
            } else {
                $type = PDO::PARAM_STR;
            }
            $stmt->bindValue(':' . $key, $value, $type);
        }
    }
    $stmt->execute();
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
    $sql = "SELECT name,description FROM categories WHERE id = :name;";
    $stmt = createRequest($conn, $sql, ['name' => $id]);
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
        WHERE z.category_id = :id AND p.quantity > 0 LIMIT 12 OFFSET :offset";
        
    $stmt = createRequest($conn, $sql, ['id' => $id, 'offset' => (int)$offset]);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function productCount($conn, $id)
{
    $sql = "SELECT COUNT(*) AS cnt FROM  (SELECT * FROM product_main_categories UNION SELECT * FROM product_categories) as z INNER JOIN products as p ON p.id = z.product_id WHERE category_id = :id AND p.quantity > 0;";
    $stmt = createRequest($conn, $sql, ['id' => $id]);
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $count['cnt'];
    return $count;
}

function getProductCategories($conn, $id)
{
    $sql = "SELECT DISTINCT c.id, c.name
    FROM (SELECT * FROM product_categories UNION SELECT * FROM product_main_categories) as z
    INNER JOIN categories as c ON c.id = z.category_id
    WHERE product_id = :id;";
    $stmt = createRequest($conn, $sql, ['id' => $id]);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
function getProductInfo($conn, $id)
{
    $sql = "SELECT title, price, price_no_discount, price_promo, description
    FROM products
    WHERE id = :id;";
    $stmt = createRequest($conn, $sql, ['id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}

function getMainCategory($conn, $id)
{
    $sql = "SELECT category_id as main_cat_id
    FROM product_main_categories as pmc
    WHERE pmc.product_id = :id;";
    $stmt = createRequest($conn, $sql, ['id' => $id]);
    $main_cat = $stmt->fetch(PDO::FETCH_ASSOC);
    return $main_cat;
}


function getProductImages($conn, $id)
{
    $sql = "SELECT i.ref,i.alt 
    FROM (SELECT * FROM product_images 
    UNION
    SELECT * FROM product_main_images) as z
    INNER JOIN images as i ON i.id = z.image_id
    WHERE product_id = :id;";
    $stmt = createRequest($conn, $sql, ['id' => $id]);
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $images;
}

function getMainImage($conn, $id)
{
    $sql = "SELECT i.ref,i.alt 
    FROM product_main_images as pmi
    INNER JOIN images as i ON i.id = pmi.image_id
    WHERE product_id = :id;";
    $stmt = createRequest($conn, $sql, ['id' => $id]);
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    return $image;
}

function insertFeedback($conn, $params)
{
    $sql = "INSERT INTO `feedback` (`name`, `email`, `year`, `gender`, `theme`, `message`, `checked`) VALUES (:name, :email, :year, :gender, :theme, :message, :checked);";
    $stmt = createRequest($conn, $sql, $params);
}

function getCategoryName($conn, $id)
{
    $sql = "SELECT name FROM categories WHERE id = :id";
    $stmt = createRequest($conn, $sql, ['id' => $id]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    return $category;
}
