<?php
$comments = json_decode(file_get_contents('data/comments.json'), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newComment = [
        "id" => uniqid(),
        "news_id" => $_POST["news_id"],
        "name" => $_POST["name"],
        "content" => $_POST["content"],
        "date" => date("Y-m-d H:i:s"),
        "approved" => false
    ];

    $comments[] = $newComment;
    file_put_contents('data/comments.json', json_encode($comments));

    header("Location: index.php");
    exit();
}
?>