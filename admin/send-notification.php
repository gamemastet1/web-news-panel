<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notifications = json_decode(file_get_contents('../data/notifications.json'), true);
    $newNotification = [
        "id" => uniqid(),
        "message" => $_POST["message"],
        "date" => date("Y-m-d H:i:s")
    ];
    $notifications[] = $newNotification;
    file_put_contents('../data/notifications.json', json_encode($notifications));
    header("Location: notifications.php");
    exit();
}
?>