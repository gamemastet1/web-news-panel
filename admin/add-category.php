<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categories = json_decode(file_get_contents('../data/categories.json'), true);
    $newCategory = [
        "id" => uniqid(),
        "name" => $_POST["name"]
    ];
    $categories[] = $newCategory;
    file_put_contents('../data/categories.json', json_encode($categories));
    header("Location: manage-categories.php");
    exit();
}
?>