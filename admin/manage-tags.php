<?php
include 'header.php';

// بررسی وجود فایل و خواندن آن
$file_path = '../data/tags.json';
if (file_exists($file_path)) {
    $tags = json_decode(file_get_contents($file_path), true);
} else {
    $tags = [];
    echo "<div class='alert alert-warning'>فایل tags.json یافت نشد. لطفاً فایل را ایجاد کنید.</div>";
}
?>

<h2 class="my-4 text-center">مدیریت تگ‌ها</h2>
<section class="add-tag mb-4">
    <h3 class="mb-4">افزودن تگ جدید</h3>
    <form action="add-tag.php" method="post">
        <div class="form-group">
            <label for="name">نام تگ</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="نام تگ" required>
        </div>
        <button type="submit" class="btn btn-primary">افزودن تگ</button>
    </form>
</section>
<section class="tags-list">
    <h3 class="mb-4">لیست تگ‌ها</h3>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">نام</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($tags) > 0) {
                foreach ($tags as $tag) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($tag["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($tag["name"]) . "</td>";
                    echo "<td class='d-flex justify-content-center'>";
                    echo "<form action='edit-tag.php' method='get' class='mr-2'>";
                    echo "<input type='hidden' name='id' value='" . $tag["id"] . "'>";
                    echo "<button type='submit' class='btn btn-warning'>ویرایش</button>";
                    echo "</form>";
                    echo "<form action='delete-tag.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $tag["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>حذف</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>هیچ تگی یافت نشد.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>