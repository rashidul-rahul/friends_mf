<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");

$query = "INSERT INTO `accounts` (`customer_id`, `account_no`, `total_money`) VALUES ('".$_POST['customer_id']."', '".$_POST['account_number']."', '".$_POST['deposit_amount']."');";
//echo $query;
$stmt = $db->exec($query);
if($stmt) {
    echo 'ok';
    header("Location: http://localhost/friends_mf/adminPanel/accounts/successful.php?id=".$customerId."");
}else
{
    echo 'something wrong';
}