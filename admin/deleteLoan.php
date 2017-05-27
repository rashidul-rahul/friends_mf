<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "DELETE FROM `loans` WHERE `loans`.`id` = ".$_GET['id'];
$stmt = $db->exec($query);
if ($stmt){
    header('Location: allLoans.php');
}else{
    echo "Delete Error";
}