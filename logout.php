<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
// redirecting to index on user logut
header("location:index.php?logout=true");

?>
