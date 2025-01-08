<?php
include 'header.php';

// بررسی وجود فایل و خواندن آن
$file_path = '../data/ads.json';
if (file_exists($file_path)) {
    $ads = json_decode(file_get_contents($file_path), true);
} else {
    $ads = [];
    echo "<div class='alert alert-warning'>فایل ads.json یافت نشد. لطفاً فایل را ایجاد کنید.</div>";
}
?>

<h2 class="my-4 text-center">مدیریت تبلیغات</h2>
<section class="add-ad mb-4">
    <h3 class="mb-4">افزودن تبلیغ جدید</h3>
    <form action="add-ad.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">عنوان تبلیغ</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="عنوان تبلیغ" required>
        </div>
        <div class="form-group">
            <label for="image">تصویر تبلیغ</label>
            <input type="file" id="image" name="image" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="link">لینک تبلیغ</label>
            <input type="url" id="link" name="link" class="form-control" placeholder="لینک تبلیغ" required>
        </div>
        <button type="submit" class="btn btn-primary">افزودن تبلیغ</button>
    </form>
</section>
<section class="ads-list">
    <h3 class="mb-4">لیست تبلیغات</h3>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">عنوان</th>
                <th scope="col">تصویر</th>
                <th scope="col">لینک</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($ads) > 0) {
                foreach ($ads as $ad) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($ad["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($ad["title"]) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($ad["image"]) . "' alt='تبلیغ' height='50'></td>";
                    echo "<td><a href='" . htmlspecialchars($ad["link"]) . "' target='_blank'>مشاهده</a></td>";
                    echo "<td class='d-flex justify-content-center'>";
                    echo "<form action='edit-ad.php' method='get' class='mr-2'>";
                    echo "<input type='hidden' name='id' value='" . $ad["id"] . "'>";
                    echo "<button type='submit' class='btn btn-warning'>ویرایش</button>";
                    echo "</form>";
                    echo "<form action='delete-ad.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $ad["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>حذف</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>هیچ تبلیغی یافت نشد.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>