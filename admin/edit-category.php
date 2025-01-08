<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categories = json_decode(file_get_contents('../data/categories.json'), true);
    foreach ($categories as &$category) {
        if ($category["id"] == $_POST["id"]) {
            $category["name"] = $_POST["name"];
            break;
        }
    }
    file_put_contents('../data/categories.json', json_encode($categories));
    header("Location: manage-categories.php");
    exit();
} else {
    $categoryId = $_GET["id"];
    $categories = json_decode(file_get_contents('../data/categories.json'), true);
    $category = null;
    foreach ($categories as $cat) {
        if ($cat["id"] == $categoryId) {
            $category = $cat;
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
    <title>ویرایش دسته‌بندی</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">ویرایش دسته‌بندی</h2>
        <form action="edit-category.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($category["id"]); ?>">
            <div class="form-group">
                <label for="name">نام دسته‌بندی</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($category["name"]); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>
</body>
</html>