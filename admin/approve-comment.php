<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit();
}

$comments = json_decode(file_get_contents('../data/comments.json'), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($comments as &$comment) {
        if ($comment["id"] == $_POST["id"]) {
            $comment["approved"] = true;
            break;
        }
    }

    file_put_contents('../data/comments.json', json_encode($comments));

    header("Location: manage-comments.php");
    exit();
}
?>