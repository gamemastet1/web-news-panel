<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tags = json_decode(file_get_contents('../data/tags.json'), true);
    $newTag = [
        "id" => uniqid(),
        "name" => $_POST["name"]
    ];
    $tags[] = $newTag;
    file_put_contents('../data/tags.json', json_encode($tags));
    header("Location: manage-tags.php");
    exit();
}
?>