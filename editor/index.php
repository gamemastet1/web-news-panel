<?php
include '../header.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'editor') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل ویرایشگر</title>
    <link rel="stylesheet" href="../css/editor.css">
</head>
<body>
    <h1>به پنل ویرایشگر خوش آمدید</h1>
    <p>این بخش مخصوص ویرایشگران است.</p>

    </main>
    <footer>
        <div class="container">
            <p>© 2025 نام سایت. تمامی حقوق محفوظ است.</p>
        </div>
    </footer>
</body>
</html>