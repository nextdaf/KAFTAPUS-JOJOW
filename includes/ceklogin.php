<?php
// Load Komponen DB
include "db.php";
session_start();

if(isset($_POST['masuk'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM `users_login` WHERE `email` = '$email' AND `password` = '$pass'";
    $select_login = mysqli_query($connection, $query);
    
    if(!$select_login){
        die("Query Failed" . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_login)){
        $db_id = $row['id_login'];
        $db_email = $row['email'];
        $db_pass = $row['password'];
        $db_role = $row['role'];
    }

    if($email !== $db_email && $pass !== $db_pass){
        header('Location: ../login.php?gagal');
    } elseif($email === $db_email && $pass === $db_pass){
        $_SESSION['id'] = $db_id;
        $_SESSION['email'] = $db_email;
        $_SESSION['role'] = $db_role;
        if($_SESSION['role'] === 'admin'){
            header('Location: ../admin');
        } else {
            header('Location: ../index.php');
        }
    }
}