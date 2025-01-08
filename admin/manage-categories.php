<?php
include 'header.php';

// بررسی وجود فایل و خواندن آن
$file_path = '../data/categories.json';
if (file_exists($file_path)) {
    $categories = json_decode(file_get_contents($file_path), true);
} else {
    $categories = [];
    echo "<div class='alert alert-warning'>فایل categories.json یافت نشد. لطفاً فایل را ایجاد کنید.</div>";
}
?>

<h2 class="my-4 text-center">مدیریت دسته‌بندی‌ها</h2>
<section class="add-category mb-4">
    <h3 class="mb-4">افزودن دسته‌بندی جدید</h3>
    <form action="add-category.php" method="post">
        <div class="form-group">
            <label for="name">نام دسته‌بندی</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="نام دسته‌بندی" required>
        </div>
        <button type="submit" class="btn btn-primary">افزودن دسته‌بندی</button>
    </form>
</section>
<section class="categories-list">
    <h3 class="mb-4">لیست دسته‌بندی‌ها</h3>
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
            if (count($categories) > 0) {
                foreach ($categories as $category) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($category["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($category["name"]) . "</td>";
                    echo "<td class='d-flex justify-content-center'>";
                    echo "<form action='edit-category.php' method='get' class='mr-2'>";
                    echo "<input type='hidden' name='id' value='" . $category["id"] . "'>";
                    echo "<button type='submit' class='btn btn-warning'>ویرایش</button>";
                    echo "</form>";
                    echo "<form action='delete-category.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $category["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>حذف</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>هیچ دسته‌بندی یافت نشد.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>