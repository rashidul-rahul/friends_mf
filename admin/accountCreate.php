<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");

$query = "INSERT INTO `accounts` (`customer_id`, `account_no`, `total_money`) VALUES ('".$_POST['customer_id']."', '".$_POST['account_no']."', '".$_POST['total_money']."');";
$stmt = $db->exec($query);
if ($stmt){
header("Location: successful.php");
}
else "INsert Problem";
