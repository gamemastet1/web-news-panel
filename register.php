<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت اطلاعات کاربران از فایل JSON
    $users = json_decode(file_get_contents('data/users.json'), true);

    // چک کردن اینکه نام کاربری وجود نداشته باشد
    foreach ($users as $user) {
        if ($user["username"] == $_POST["username"]) {
            $_SESSION["error"] = "نام کاربری قبلاً ثبت شده است.";
            header("Location: register.php");
            exit();
        }
    }

    // اضافه کردن کاربر جدید به لیست کاربران
    $newUser = [
        "id" => uniqid(),
        "username" => $_POST["username"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "role" => "user",
        "registered_date" => date("Y-m-d H:i:s")
    ];
    $users[] = $newUser;

    // ذخیره اطلاعات کاربران در فایل JSON
    file_put_contents('data/users.json', json_encode($users));

    // هدایت کاربر به صفحه ورود
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت‌نام</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">ثبت‌نام</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo "<div class='alert alert-danger'>" . $_SESSION["error"] . "</div>";
            unset($_SESSION["error"]);
        }
        ?>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">نام کاربری</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">گذرواژه</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">ثبت‌نام</button>
        </form>
    </div>
</body>
</html>