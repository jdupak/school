<?php 
session_start();
session_destroy();
header("Location: http://school/login/index.php?error=Logged Out");
 ?>