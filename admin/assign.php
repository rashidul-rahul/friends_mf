<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION == true) {
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");
    $query = "INSERT INTO `map_account_loans` (`id`, `accounts_id`, `loans_id`) VALUES (NULL, '" . $_POST['account'] . "', '" . $_POST['loan'] . "');";
    $stmt = $db->exec($query);
    $query = null;
    $db = null;

    if ($stmt) {
        header('allCustomers.php');
    } else {
        echo "Not OK";
    }
}else{
    header("Location: loginRedirect.php");
}


