<?php

session_start();
?>
Hello, <?php echo $_SESSION['AUTH']['email'] ?>, 
<h2>
	<a href="sigin.html" title="">Đăng xuất</a>
</h2>