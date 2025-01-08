<?php
include 'header.php';

// بررسی وجود فایل و خواندن آن
$file_path = '../data/reports.json';
if (file_exists($file_path)) {
    $reports = json_decode(file_get_contents($file_path), true);
} else {
    $reports = [
        "users_count" => 0,
        "news_count" => 0,
        "comments_count" => 0,
        "ads_count" => 0
    ];
    echo "<div class='alert alert-warning'>فایل reports.json یافت نشد. لطفاً فایل را ایجاد کنید.</div>";
}
?>

<h2 class="my-4 text-center">گزارش‌ها و آمار</h2>
<section class="reports-list">
    <h3 class="mb-4">آمار کلی سایت</h3>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">تعداد کاربران</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($reports["users_count"]); ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">تعداد اخبار</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($reports["news_count"]); ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">تعداد نظرات</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($reports["comments_count"]); ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">تعداد تبلیغات</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($reports["ads_count"]); ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
</body>
</html>