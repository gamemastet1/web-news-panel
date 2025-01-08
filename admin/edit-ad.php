<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ads = json_decode(file_get_contents('../data/ads.json'), true);
    foreach ($ads as &$ad) {
        if ($ad["id"] == $_POST["id"]) {
            $ad["title"] = $_POST["title"];
            $ad["link"] = $_POST["link"];
            // بررسی تغییر فایل تصویر
            if (!empty($_FILES["image"]["name"])) {
                $target_dir = "../uploads/ads/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $ad["image"] = $target_file;
            }
            break;
        }
    }
    file_put_contents('../data/ads.json', json_encode($ads));
    header("Location: manage-ads.php");
    exit();
} else {
    $adId = $_GET["id"];
    $ads = json_decode(file_get_contents('../data/ads.json'), true);
    $ad = null;
    foreach ($ads as $a) {
        if ($a["id"] == $adId) {
            $ad = $a;
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
    <title>ویرایش تبلیغ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">ویرایش تبلیغ</h2>
        <form action="edit-ad.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($ad["id"]); ?>">
            <div class="form-group">
                <label for="title">عنوان تبلیغ</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($ad["title"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">تصویر تبلیغ</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="<?php echo htmlspecialchars($ad["image"]); ?>" alt="تبلیغ" height="50">
            </div>
            <div class="form-group">
                <label for="link">لینک تبلیغ</label>
                <input type="url" id="link" name="link" class="form-control" value="<?php echo htmlspecialchars($ad["link"]); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>
</body>
</html>