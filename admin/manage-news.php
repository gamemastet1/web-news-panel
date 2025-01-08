<?php
include 'header.php';

// دریافت لیست اخبار از فایل JSON
$news = json_decode(file_get_contents('../data/news.json'), true);
?>

<h2 class="my-4 text-center">مدیریت اخبار</h2>
<section class="add-news mb-4">
    <h3 class="mb-4">افزودن خبر جدید</h3>
    <form action="add-news.php" method="post">
        <div class="form-group">
            <label for="title">عنوان خبر</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="عنوان خبر" required>
        </div>
        <div class="form-group">
            <label for="content">محتوای خبر</label>
            <textarea id="content" name="content" class="form-control" placeholder="محتوای خبر" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">افزودن خبر</button>
    </form>
</section>
<section class="news-list">
    <h3 class="mb-4">لیست اخبار</h3>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">عنوان</th>
                <th scope="col">محتوا</th>
                <th scope="col">تاریخ</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($news) > 0) {
                foreach ($news as $newsItem) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($newsItem["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($newsItem["title"]) . "</td>";
                    echo "<td>" . htmlspecialchars($newsItem["content"]) . "</td>";
                    echo "<td>" . htmlspecialchars($newsItem["date"]) . "</td>";
                    echo "<td class='d-flex justify-content-center'>";
                    echo "<form action='edit-news.php' method='get' class='mr-2'>";
                    echo "<input type='hidden' name='id' value='" . $newsItem["id"] . "'>";
                    echo "<button type='submit' class='btn btn-warning'>ویرایش</button>";
                    echo "</form>";
                    echo "<form action='delete-news.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $newsItem["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>حذف</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>هیچ خبری یافت نشد.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>