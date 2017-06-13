<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin') {
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf", "root", "");
    $query = "INSERT INTO `map_account_loans` (`id`, `accounts_id`, `loans_id`) VALUES (NULL, '" . $_GET['account'] . "', '" . $_GET['loan'] . "');";
    $stmt = $db->exec($query);
    $query = null;
    $db = null;

    if ($stmt) {
        header('Location: allCustomers.php');
    } else {
        echo "Not OK";
    }
}else{
    header("Location: loginRedirect.php");
}


