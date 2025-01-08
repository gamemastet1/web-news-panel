<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $news = json_decode(file_get_contents('../data/news.json'), true);
    foreach ($news as &$newsItem) {
        if ($newsItem["id"] == $_POST["id"]) {
            $newsItem["title"] = $_POST["title"];
            $newsItem["content"] = $_POST["content"];
            break;
        }
    }
    file_put_contents('../data/news.json', json_encode($news));
    header("Location: manage-news.php");
    exit();
} else {
    $newsId = $_GET["id"];
    $news = json_decode(file_get_contents('../data/news.json'), true);
    $newsItem = null;
    foreach ($news as $item) {
        if ($item["id"] == $newsId) {
            $newsItem = $item;
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
    <title>ویرایش خبر</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">ویرایش خبر</h2>
        <?php if ($newsItem): ?>
        <form action="edit-news.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($newsItem["id"]); ?>">
            <div class="form-group">
                <label for="title">عنوان خبر</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($newsItem["title"]); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">محتوای خبر</label>
                <textarea id="content" name="content" class="form-control" required><?php echo htmlspecialchars($newsItem["content"]); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
        <?php else: ?>
        <div class="alert alert-danger">خبر یافت نشد.</div>
        <?php endif; ?>
    </div>
</body>
</html>