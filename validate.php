<?php
function validateProductsPage($get)
{
    if (count($get) < 1) {
        header('Location: 404.php');
        exit;
    }
    if (!isset($get['cat_id'])) {
        header('Location: 404.php');
        exit;
    }
    $page = 1;
    if (!isset($get['page'])) {
        $page = 1;
    } else {

        if (!is_numeric($get['page']) || $get['page'] < 1) {
            header('Location: 404.php');
            exit;
        }
        $page = $get['page'];
    }
    $offset = ceil(($page - 1) * 12);

    $id = $get['cat_id'];
    if (!is_numeric($id)) {
        header('Location: 404.php');
        exit;
    }

    return array($id, $offset, $page);
}

function validateQueries($q)
{
    if (!$q) {
        header('Location: 404.php');
        exit;
    }
}

function validateProduct($get){
    if (!isset($get['id'])) {
        header('Location: 404.php');
        exit;
    }
    $id = $get['id'];
    if (!is_numeric($id)) {
        header('Location: 404.php');
        exit;
    }
    return $id;
}