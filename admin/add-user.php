<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $users = json_decode(file_get_contents('../data/users.json'), true);
    $newUser = [
        "id" => uniqid(),
        "username" => $_POST["username"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "role" => $_POST["role"],
        "registered_date" => date("Y-m-d H:i:s")
    ];
    $users[] = $newUser;
    file_put_contents('../data/users.json', json_encode($users));
    header("Location: manage-users.php");
    exit();
}
?>