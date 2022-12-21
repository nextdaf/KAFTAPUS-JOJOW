<?php
session_start();
$_SESSION['email'] == null;
$_SESSION['role'] == null;
session_destroy();
header("Location: ../index.php");