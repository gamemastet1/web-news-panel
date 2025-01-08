<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت اطلاعات کاربران از فایل JSON
    $users = json_decode(file_get_contents('../data/users.json'), true);
    
    // جستجوی کاربر و به‌روزرسانی اطلاعات
    foreach ($users as &$user) {
        if ($user["id"] == $_POST["id"]) {
            $user["username"] = $_POST["username"];
            if (!empty($_POST["password"])) {
                $user["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }
            $user["role"] = $_POST["role"];
            break;
        }
    }
    
    // ذخیره اطلاعات به‌روز شده کاربران در فایل JSON
    file_put_contents('../data/users.json', json_encode($users));
    
    // هدایت کاربر به صفحه مدیریت کاربران
    header("Location: manage-users.php");
    exit();
} else {
    $userId = $_GET["id"];
    $users = json_decode(file_get_contents('../data/users.json'), true);
    $user = null;
    foreach ($users as $u) {
        if ($u["id"] == $userId) {
            $user = $u;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش کاربر</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">ویرایش کاربر</h2>
        <?php if ($user): ?>
        <form action="edit-user.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user["id"]); ?>">
            <div class="form-group">
                <label for="username">نام کاربری</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($user["username"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">گذرواژه جدید</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="گذرواژه جدید">
            </div>
            <div class="form-group">
                <label for="role">نقش</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="admin" <?php if ($user["role"] == "admin") echo "selected"; ?>>مدیر</option>
                    <option value="user" <?php if ($user["role"] == "user") echo "selected"; ?>>کاربر</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
        <?php else: ?>
        <div class="alert alert-danger">کاربر یافت نشد.</div>
        <?php endif; ?>
    </div>
</body>
</html>