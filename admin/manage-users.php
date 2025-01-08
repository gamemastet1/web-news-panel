<?php
include 'header.php';

// دریافت لیست کاربران از فایل JSON
$users = json_decode(file_get_contents('../data/users.json'), true);
?>

<h2 class="my-4 text-center">مدیریت کاربران</h2>
<section class="add-user mb-4">
    <h3 class="mb-4">افزودن کاربر جدید</h3>
    <form action="add-user.php" method="post">
        <div class="form-group">
            <label for="username">نام کاربری</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="نام کاربری" required>
        </div>
        <div class="form-group">
            <label for="password">گذرواژه</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="گذرواژه" required>
        </div>
        <div class="form-group">
            <label for="role">نقش</label>
            <select id="role" name="role" class="form-control" required>
                <option value="admin">مدیر</option>
                <option value="user">کاربر</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">افزودن کاربر</button>
    </form>
</section>
<section class="users-list">
    <h3 class="mb-4">لیست کاربران</h3>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">نام کاربری</th>
                <th scope="col">نقش</th>
                <th scope="col">تاریخ ثبت‌نام</th>
                <th scope="col">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($users) > 0) {
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($user["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($user["username"]) . "</td>";
                    echo "<td>" . htmlspecialchars($user["role"]) . "</td>";
                    echo "<td>" . htmlspecialchars($user["registered_date"]) . "</td>";
                    echo "<td class='d-flex justify-content-center'>";
                    echo "<form action='edit-user.php' method='get' class='mr-2'>";
                    echo "<input type='hidden' name='id' value='" . $user["id"] . "'>";
                    echo "<button type='submit' class='btn btn-warning'>ویرایش</button>";
                    echo "</form>";
                    echo "<form action='delete-user.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $user["id"] . "'>";
                    echo "<button type='submit' class='btn btn-danger'>حذف</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>هیچ کاربری یافت نشد.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<?php include 'footer.php'; ?>
</body>
</html>