<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION == true) {
    if ($_POST['confirm'] == "ok") {
        $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");
        $query = "DELETE FROM `customers` WHERE `customers`.`id` = " . $_POST['id'] . "";
        echo $query;
        $stmt = $db->exec($query);
        $query = null;
        $db = null;
        if ($stmt) {
            header('Location: allCustomers.php');
        } else {
            echo "Deleting Problem";
        }

    } else if ($_POST['confirm'] == "cancel") {
        header('Location: allCustomers.php');
    }
} else{
    header("Location: loginRedirect.php");
}