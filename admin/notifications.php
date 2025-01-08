<?php
include 'header.php';

// بررسی وجود فایل و خواندن آن
$file_path = '../data/notifications.json';
if (file_exists($file_path)) {
    $notifications = json_decode(file_get_contents($file_path), true);
} else {
    $notifications = [];
    echo "<div class='alert alert-warning'>فایل notifications.json یافت نشد. لطفاً فایل را ایجاد کنید.</div>";
}
?>

<h2 class="my-4 text-center">سیستم اطلاع‌رسانی</h2>
<section class="add-notification mb-4">
    <h3 class="mb-4">ارسال اطلاع‌رسانی جدید</h3>
    <form action="send-notification.php" method="post">
        <div class="form-group">
            <label for="message">متن اطلاع‌رسانی</label>
            <textarea id="message" name="message" class="form-control" placeholder="متن اطلاع‌رسانی" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">ارسال اطلاع‌رسانی</button>
    </form>
</section>
<section class="notifications-list">
    <h3 class="mb-4">لیست اطلاع‌رسانی‌ها</h3>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">متن</th>
                <th scope="col">تاریخ</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($notifications) > 0) {
                foreach ($notifications as $notification) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($notification["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($notification["message"]) . "</td>";
                    echo "<td>" . htmlspecialchars($notification["date"]) . "</td>";
                    echo "<td class='d-flex justify-content-center'>";
                    echo "<form action='delete-notification.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $notification["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>حذف</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>هیچ اطلاع‌رسانی یافت نشد.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>