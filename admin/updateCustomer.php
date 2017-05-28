<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query = "UPDATE `customers` SET `first_name` = '".$_POST['first_name']."', `last_name` = '".$_POST['last_name']."', `user_name` = '".$_POST['user_name']."', `father_name` = 'Moinul', `mother_name` = '".$_POST['mother_name']."', `gender` = '".$_POST['gender']."', `date_birth` = '".$_POST['dob']."', `nid` = '".$_POST['nid']."', `address` = '".$_POST['address']."', `contact` = '".$_POST['contact']."', `mail` = '".$_POST['mail']."', `password` = '".$_POST['password']."' WHERE `customers`.`id` = ".$_POST['id'].";";
//echo $query;
$stmt = $db->exec($query);
if($stmt){
header("Location: viewCustomer.php?id=".$_POST['id']);
}else{
echo 'not ok';
}