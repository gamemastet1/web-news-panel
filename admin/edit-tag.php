<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tags = json_decode(file_get_contents('../data/tags.json'), true);
    foreach ($tags as &$tag) {
        if ($tag["id"] == $_POST["id"]) {
            $tag["name"] = $_POST["name"];
            break;
        }
    }
    file_put_contents('../data/tags.json', json_encode($tags));
    header("Location: manage-tags.php");
    exit();
} else {
    $tagId = $_GET["id"];
    $tags = json_decode(file_get_contents('../data/tags.json'), true);
    $tag = null;
    foreach ($tags as $t) {
        if ($t["id"] == $tagId) {
            $tag = $t;
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
    <title>ویرایش تگ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">ویرایش تگ</h2>
        <form action="edit-tag.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($tag["id"]); ?>">
            <div class="form-group">
                <label for="name">نام تگ</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($tag["name"]); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>
</body>
</html>