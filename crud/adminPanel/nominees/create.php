<?php
$db = new PDO("mysql:hostname=localhost;dbname=friends_mf","root","");

$query = "INSERT INTO `nominees` (`customer_id`, `first_name`, `last_name`, `father_name`, `mothers_name`, `gender`, `date_birth`, `nid`, `relation_customer`, `contact`) VALUES ('".$_POST['customer_id']."', '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['fathers_name']."', '".$_POST['mothers_name']."', '".$_POST['gender']."', '".$_POST['dob']."', '".$_POST['nid']."', '".$_POST['relation']."', '".$_POST['contact_number']."');";
//echo $query;
$customerId = $_POST['customer_id'];
//echo $customerId;
$stmt = $db->exec($query);
if($stmt) {
    echo 'ok';
    header("Location: http://localhost/friends_mf/adminPanel/accounts/addAccounts.php?id=".$customerId."");
}else
{
    echo 'something wrong';
}