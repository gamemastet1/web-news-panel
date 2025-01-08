<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $news = json_decode(file_get_contents('../data/news.json'), true);
    $newNews = [
        "id" => uniqid(),
        "title" => $_POST["title"],
        "content" => $_POST["content"],
        "date" => date("Y-m-d H:i:s")
    ];
    $news[] = $newNews;
    file_put_contents('../data/news.json', json_encode($news));
    header("Location: manage-news.php");
    exit();
}
?>