<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت اطلاعات کاربران از فایل JSON
    $users = json_decode(file_get_contents('data/users.json'), true);

    // جستجوی کاربر با نام کاربری وارد شده
    foreach ($users as $user) {
        if ($user["username"] == $_POST["username"] && password_verify($_POST["password"], $user["password"])) {
            // تنظیم اطلاعات کاربر در جلسه
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];
            header("Location: admin/index.php");
            exit();
        }
    }

    // اگر کاربر یافت نشد، پیام خطا نمایش داده می‌شود
    $_SESSION["error"] = "نام کاربری یا گذرواژه اشتباه است.";
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">ورود</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo "<div class='alert alert-danger'>" . $_SESSION["error"] . "</div>";
            unset($_SESSION["error"]);
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">نام کاربری</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">گذرواژه</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">ورود</button>
        </form>
    </div>
</body>
</html>