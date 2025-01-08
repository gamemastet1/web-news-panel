<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $news = json_decode(file_get_contents('../data/news.json'), true);
    $news = array_filter($news, function($newsItem) {
        return $newsItem["id"] !== $_POST["id"];
    });
    file_put_contents('../data/news.json', json_encode($news));
    header("Location: manage-news.php");
    exit();
}
?>