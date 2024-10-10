<?php
include "./app/data-base.php";
include "./app/post.php";
include "./views/frontends/header.php";
include "./views/frontends/navbar.php";
include "./views/frontends/slider.php";
include "./views/frontends/intro.php";

$db= new DB();
$connection = $db->connect();
$post= new post($connection);
$postData = $post->postlist();
include "./views/frontends/content.php";
?>

<div class="footer">
    <footer class="footer-text">Designed & Developed By Nyein Htwe.</footer>
</div>

<?php
include "./views/frontends/footer.php";