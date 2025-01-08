<?php
include 'header.php';

$comments = json_decode(file_get_contents('../data/comments.json'), true);
$news = json_decode(file_get_contents('../data/news.json'), true);

// تابع برای گرفتن عنوان خبر بر اساس news_id
function getNewsTitle($news, $news_id) {
    foreach ($news as $newsItem) {
        if ($newsItem['id'] == $news_id) {
            return $newsItem['title'];
        }
    }
    return "خبر نامشخص";
}
?>

<h2 class="my-4 text-center">مدیریت نظرات</h2>
<section class="comments-list">
    <h3 class="mb-4">لیست نظرات</h3>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">نام</th>
                <th scope="col">نظر</th>
                <th scope="col">تاریخ</th>
                <th scope="col">خبر مربوطه</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($comments) > 0) {
                foreach ($comments as $comment) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($comment["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($comment["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($comment["content"]) . "</td>";
                    echo "<td>" . htmlspecialchars($comment["date"]) . "</td>";
                    echo "<td>" . htmlspecialchars(getNewsTitle($news, $comment["news_id"])) . "</td>";
                    echo "<td class='d-flex justify-content-center'>";
                    echo "<form action='approve-comment.php' method='post' class='mr-2'>";
                    echo "<input type='hidden' name='id' value='" . $comment["id"] . "'>";
                    echo "<button type='submit' class='btn btn-success'>تایید</button>";
                    echo "</form>";
                    echo "<form action='delete-comment.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $comment["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>حذف</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>هیچ نظری یافت نشد.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

</main>
<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p>© 2025 نام سایت. تمامی حقوق محفوظ است.</p>
    </div>
</footer>
</body>
</html>