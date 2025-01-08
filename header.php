<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت خبری</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="path/to/logo.png" alt="لوگو">
                <span>نام سایت</span>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">خانه</a></li>
                    <li><a href="login.php">ورود</a></li>
                    <li><a href="register.php">ثبت‌نام</a></li>
                </ul>
            </nav>
            <div class="search">
                <input type="text" placeholder="جستجوی اخبار...">
                <button>جستجو</button>
            </div>
        </div>
    </header>
    <main>