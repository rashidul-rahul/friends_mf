<?php
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];


$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "SELECT * FROM `customers` WHERE id=".$_GET['id'];
//echo $query;
$stmt = $db->query($query);
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($oldPass == $customer[0]['password']){
//    echo "match";
    $query = "UPDATE `customers` SET `password` = '".$newPass."' WHERE `customers`.`id` = ".$customer[0]['id'].";";
    $stmt = $db->exec($query);
    if($stmt){
        echo "change SuccessFul";
    }
}else{
    echo "Old Password Don't Match";
}