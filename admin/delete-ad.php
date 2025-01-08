<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ads = json_decode(file_get_contents('../data/ads.json'), true);
    $ads = array_filter($ads, function($ad) {
        return $ad["id"] !== $_POST["id"];
    });
    file_put_contents('../data/ads.json', json_encode($ads));
    header("Location: manage-ads.php");
    exit();
}
?>