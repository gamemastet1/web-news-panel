<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $users = json_decode(file_get_contents('../data/users.json'), true);
    $users = array_filter($users, function($user) {
        return $user["id"] !== $_POST["id"];
    });
    file_put_contents('../data/users.json', json_encode($users));
    header("Location: manage-users.php");
    exit();
}
?>