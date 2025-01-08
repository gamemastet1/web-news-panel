</div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // بررسی وضعیت نوار کناری در Local Storage و اعمال آن
            if (localStorage.getItem('sidebar-toggled') === 'true') {
                $("#wrapper").addClass("toggled");
            }

            // تغییر وضعیت نوار کناری و ذخیره آن در Local Storage
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                localStorage.setItem('sidebar-toggled', $("#wrapper").hasClass("toggled"));
            });
        });
    </script>
</body>
</html>