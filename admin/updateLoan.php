<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");
$query= "UPDATE `loans` SET `name` = '".$_POST['name']."', `amount` = '".$_POST['amount']."', `interest` = '".$_POST['interest']."', `duration` = '".$_POST['duration']."', `loan_id` = '".$_POST['loan_id']."', `details` = '".$_POST['details']."' WHERE `loans`.`id` = ".$_POST['id'].";";
echo $query;
$stmt = $db->exec($query);
if($stmt){
    header("Location: allLoans.php");
}else{
    echo 'not ok';
}