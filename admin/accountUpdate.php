<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "UPDATE `accounts` SET `account_no` = '".$_POST['account_no']."', `total_money` = '".$_POST['total_money']."' WHERE `accounts`.`id` = ".$_POST['id'].";";
$stmt = $db->exec($query);
if ($stmt){
    header('Location: allAccounts.php');
}else{
    echo "Update Problem";
}
