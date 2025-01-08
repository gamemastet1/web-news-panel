<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notifications = json_decode(file_get_contents('../data/notifications.json'), true);
    $notifications = array_filter($notifications, function($notification) {
        return $notification["id"] !== $_POST["id"];
    });
    file_put_contents('../data/notifications.json', json_encode($notifications));
    header("Location: notifications.php");
    exit();
}
?>