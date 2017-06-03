<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION == true) {

    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");
    $query = "DELETE FROM `loans` WHERE `loans`.`id` = " . $_GET['id'];
    $stmt = $db->exec($query);
    $query = null;
    $db = null;
    if ($stmt) {
        header('Location: allLoans.php');
    } else {
        echo "Delete Error";
    }
} else{
    header("Location: loginRedirect.php");
}