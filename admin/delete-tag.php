<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tags = json_decode(file_get_contents('../data/tags.json'), true);
    $tags = array_filter($tags, function($tag) {
        return $tag["id"] !== $_POST["id"];
    });
    file_put_contents('../data/tags.json', json_encode($tags));
    header("Location: manage-tags.php");
    exit();
}
?>