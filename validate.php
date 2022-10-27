<?php
function validateProductsPage($get)
{

    if (!isset($get['cat_id'])) {
        header('Location: 404.php');
        exit;
    }

    if (!isset($get['page'])) {
        $page = 1;
    } else {
        $get_page = (int)$get['page'];
        if($get_page < 1){
            header('Location: 404.php');
            exit;
        }
        $page = $get_page;
    }
    $offset = ceil(($page - 1) * 12);

    $id = $get['cat_id'];
    if (!is_numeric($id)) {
        header('Location: 404.php');
        exit;
    }

    return array($id, $offset, $page);
}


function validateProduct($get)
{
    if (!isset($get['id'])) {
        header('Location: 404.php');
        exit;
    }
    $id = (int)$get['id'];
    if (!$get['id'] > 0) {
        header('Location: 404.php');
        exit;
    }
    return $id;
}
