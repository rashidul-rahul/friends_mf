<?php
session_start();


if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin'){
    $db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
    $query = "UPDATE `accounts` SET `account_no` = '".$_POST['account_no']."', `total_money` = '".$_POST['total_money']."' WHERE `accounts`.`id` = ".$_POST['id'].";";
    $stmt = $db->exec($query);
    $query = null;
    $db = null;
    if ($stmt){
        header('Location: allAccounts.php');
    }else
        {
            echo "Update Problem";
        }
}else{
    header("Location: loginRedirect.php");
}
