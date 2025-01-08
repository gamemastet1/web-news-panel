<?php
include 'header.php';

$news = json_decode(file_get_contents('data/news.json'), true);
$comments = json_decode(file_get_contents('data/comments.json'), true);
?>

<link rel="stylesheet" href="css/index.css">

<section class="hero">
    <h1>به سایت خبری خوش آمدید</h1>
    <p>جدیدترین اخبار و مقالات را در اینجا بخوانید.</p>
</section>
<section class="news-list">
    <h2>اخبار جدید</h2>
    <div class="news-container">
        <?php
        if (count($news) > 0) {
            foreach ($news as $newsItem) {
                echo "<div class='news-item'>";
                echo "<h3>" . htmlspecialchars($newsItem["title"]) . "</h3>";
                echo "<p>" . htmlspecialchars($newsItem["content"]) . "</p>";
                echo "<small>" . htmlspecialchars($newsItem["date"]) . "</small>";
                // نمایش نظرات تایید شده
                echo "<h4>نظرات</h4>";
                foreach ($comments as $comment) {
                    if ($comment['news_id'] == $newsItem['id'] && $comment['approved']) {
                        echo "<div class='comment'>";
                        echo "<p><strong>" . htmlspecialchars($comment["name"]) . ":</strong> " . htmlspecialchars($comment["content"]) . "</p>";
                        echo "<small>" . htmlspecialchars($comment["date"]) . "</small>";
                        echo "</div>";
                    }
                }
                echo "<form action='add-comment.php' method='post'>";
                echo "<input type='hidden' name='news_id' value='" . $newsItem["id"] . "'>";
                echo "<input type='text' name='name' placeholder='نام شما' required>";
                echo "<textarea name='content' placeholder='نظر شما' required></textarea>";
                echo "<button type='submit'>ارسال نظر</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "هیچ خبری یافت نشد.";
        }
        ?>
    </div>
</section>

</main>
<footer>
    <div class="container">
        <p>© 2025 نام سایت. تمامی حقوق محفوظ است.</p>
    </div>
</footer>
</body>
</html>