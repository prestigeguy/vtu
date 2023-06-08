<?php
session_start();

//session_destroy();

unset($_SESSION['uname']);

header("location: ../login.php");

?>