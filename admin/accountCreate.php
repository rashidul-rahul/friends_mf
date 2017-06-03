<?php
session_start();


if(isset($_SESSION['login']) && $_SESSION == true){
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");

$query = "INSERT INTO `accounts` (`customer_id`, `account_no`, `total_money`) VALUES ('".$_POST['customer_id']."', '".$_POST['account_no']."', '".$_POST['total_money']."');";
$stmt = $db->exec($query);
    $query = null;
    $db = null;
if ($stmt){
header("Location: successful.php");
}
else "INsert Problem";
}else{
    header("Location: loginRedirect.php");
}
