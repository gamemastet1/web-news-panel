<?php include 'header.php'; ?>
<h2 class="my-4 text-center">خوش آمدید به پنل مدیریت</h2>

<!-- محتوای صفحه اصلی پنل مدیریت -->
<div class="container">
    <!-- پیام خوش‌آمدگویی -->
    <div class="alert alert-info text-center" role="alert">
        به پنل مدیریت سایت خود خوش آمدید. از منوی کناری برای مدیریت بخش‌های مختلف استفاده کنید.
    </div>

    <!-- آمار و گزارش‌ها -->
    <div class="row my-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">کاربران</div>
                <div class="card-body">
                    <h5 class="card-title">تعداد کاربران</h5>
                    <p class="card-text">1234</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">نظرات</div>
                <div class="card-body">
                    <h5 class="card-title">نظرات در انتظار تایید</h5>
                    <p class="card-text">56</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">پست‌ها</div>
                <div class="card-body">
                    <h5 class="card-title">پست‌های جدید</h5>
                    <p class="card-text">34</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">دسته‌بندی‌ها</div>
                <div class="card-body">
                    <h5 class="card-title">تعداد دسته‌بندی‌ها</h5>
                    <p class="card-text">12</p>
                </div>
            </div>
        </div>
    </div>

    <!-- لینک‌های سریع -->
    <div class="list-group my-4">
        <a href="manage-news.php" class="list-group-item list-group-item-action">مدیریت اخبار</a>
        <a href="manage-comments.php" class="list-group-item list-group-item-action">مدیریت نظرات</a>
        <a href="manage-users.php" class="list-group-item list-group-item-action">مدیریت کاربران</a>
    </div>

    <!-- اخبار و اطلاعیه‌ها -->
    <div class="card my-4">
        <div class="card-header">
            اخبار و اطلاعیه‌ها
        </div>
        <div class="card-body">
            <h5 class="card-title">آخرین اخبار و اطلاعیه‌ها</h5>
            <p class="card-text">هیچ خبری موجود نیست.</p>
        </div>
    </div>

    <!-- وظایف و رویدادها -->
    <div class="card my-4">
        <div class="card-header">
            وظایف و رویدادهای مهم
        </div>
        <div class="card-body">
            <h5 class="card-title">لیست وظایف</h5>
            <p class="card-text">هیچ وظیفه‌ای موجود نیست.</p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>