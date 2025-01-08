<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categories = json_decode(file_get_contents('../data/categories.json'), true);
    $categories = array_filter($categories, function($category) {
        return $category["id"] !== $_POST["id"];
    });
    file_put_contents('../data/categories.json', json_encode($categories));
    header("Location: manage-categories.php");
    exit();
}
?>