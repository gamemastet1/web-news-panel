<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ads = json_decode(file_get_contents('../data/ads.json'), true);
    
    // مدیریت آپلود فایل
    $target_dir = "../uploads/ads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $newAd = [
        "id" => uniqid(),
        "title" => $_POST["title"],
        "image" => $target_file,
        "link" => $_POST["link"]
    ];
    $ads[] = $newAd;
    file_put_contents('../data/ads.json', json_encode($ads));
    header("Location: manage-ads.php");
    exit();
}
?>